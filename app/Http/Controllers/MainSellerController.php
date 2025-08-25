<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\categories_info_table;
use App\Models\sections_info_table;
use App\Models\products_info_table;
use App\Models\seller_info_table;
use App\Models\seller_email_verification_table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\order_information_table;
use App\Mail\SellerVerificationMail;
use Carbon\Carbon;

class MainSellerController extends Controller
{
    public function seller_account($seller_id)
    {
        $seller_data = seller_info_table::find($seller_id);
        return view('showing_logged_in_seller_account', compact('seller_data'));
    }

    public function sending_email_for_verify_seller_user($seller_id)
    {
        $seller_to_sent_an_email = seller_info_table::find($seller_id);

        $userVerificationCode = seller_email_verification_table::where('seller_id',$seller_to_sent_an_email->id)->latest('varification_code_created_at')->first();

        $now = now();

        if($userVerificationCode && $now->isBefore($userVerificationCode->varification_code_expires_at))
        {
            $verification_code = $userVerificationCode->varification_code;
        }
        else
        {
            $verification_code = Str::random(26);
        }

        $this->sendVerificationCodeEmailToSeller($seller_to_sent_an_email->email, $verification_code);
        
        seller_email_verification_table::updateOrCreate(['seller_id'=>$seller_to_sent_an_email->id],[
            'seller_id' => $seller_to_sent_an_email->id,
            'varification_code' => $verification_code,
            'varification_code_expires_at' => $now->addMinutes(10)
        ]);

        Session::put('mail_has_been_sent_to_user', true);

        return redirect()->back();
    }

    private function sendVerificationCodeEmailToSeller($email, $verification_code)
    {
        Mail::to($email)->send(new SellerVerificationMail($verification_code));
    }

    public function verifying_seller_email_verification_code_form_submission($seller_id, Request $request)
    {
        try {
            $validatedData = $request->validate([
                'varification_code' => 'required',
            ],
            [
                'varification_code.required' => 'Please provide the varification code',
            ]);

            $verification_code = seller_email_verification_table::where('seller_id', $seller_id)->where('varification_code', $request->varification_code)->first();

            $now = now();

            if(!$verification_code)
            {
                // echo "<br><h1>Verification Code is incorrect...</h1>";
                Session::forget('mail_has_been_sent_to_user');
                return redirect()->back()->with('verification_code_incorrect', 'Verification Code Not Match !');
            }
            else if($verification_code && $now->isAfter($verification_code->varification_code_expires_at))
            {
                // echo "<br><h1>This Verification Code has been expired please request new Verification Code...</h1>";
                Session::forget('mail_has_been_sent_to_user');
                return redirect()->back()->with('verification_code_expires', 'Verification code has been expired, please request new one !');
            }

            $user = seller_info_table::whereId($seller_id)->first();

            if($user)
            {
                $verification_code->update([
                    'varification_code_expires_at' => now()
                ]);
                // echo "<br><h1>Verification Code is CORRECT...</h1>";
                Session::forget('mail_has_been_sent_to_user');
                return redirect()->back()->with('verification_code_correct', 'user verified');
            }  
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errorMessages = $e->validator->getMessageBag()->all();

            echo '<br><h2 style="color: red;">You cannot Login due to following errors :</h2><br>';
            foreach ($errorMessages as $errorMessage) {
                echo '<center>' . '<h1>'. $errorMessage . '<br>' . '</h1>' . '</center>';
            }

            return;
        }
    }

    public function showing_proof_of_bank_account_ownership_to_seller_for_account($seller_id)
    {
        $seller_to_show_document = seller_info_table::find($seller_id);
        return view('showing_proof_of_bank_account_ownership_to_seller_for_account', compact('seller_to_show_document'));
    }

    public function updating_seller_user_record_from_seller_page_form_submission(Request $request, $id){
        $seller_record_to_update = seller_info_table::find($id);

        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:sellers_info,email,' . $id,
                'phone_no' => 'required|string|unique:sellers_info,phone_no,' . $id,
                'address' => 'required|string',
                'username' => 'required|string|unique:sellers_info,username,' . $id,
                'password' => 'nullable|string',
                'confirm_password' => 'required|string',
                'profile_pic' => 'image|mimes:jpeg,png,jpg',
                'business_name' => 'required|string',
                'business_type' => 'required|string',
                'business_strength' => 'required|string',
                'product_category' => 'required|string',
                'gst_number' => 'required|string',
                'business_description' => 'required|string',
                'bank_name' => 'required|string',
                'bank_branch' => 'required|string',
                'bank_ifsc_code' => 'required|string',
                'bank_micr_code' => 'required|numeric',
                'account_holder_name' => 'required|string',
                'account_number' => 'required|string',
                'account_type' => 'required|string',
                'proof_of_bank_account_ownership' => 'nullable|file|mimes:pdf,doc,docx',
            ], [
                'name.required' => 'Please enter your name.',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errorMessages = $e->validator->getMessageBag()->all();
    
            // Display error messages using JavaScript alerts
            echo '<script>';
            foreach ($errorMessages as $errorMessage) {
                echo 'alert("' . $errorMessage . '");';
            }
            echo '</script>';
            return;
        }

        $seller_record_to_update->name = $request->input('name');
        $seller_record_to_update->email = $request->input('email');
        $seller_record_to_update->phone_no = $request->input('phone_no');
        $seller_record_to_update->address = $request->input('address');
        $seller_record_to_update->username = $request->input('username');
        
        if ($request->filled('confirm_password')) {
            $seller_record_to_update->password = bcrypt($request->input('confirm_password'));
            $seller_record_to_update->confirm_password = $request->input('confirm_password'); 
        }

        if ($request->hasFile('profile_pic')) {
            $fileNameWithExt = $request->file('profile_pic')->getClientOriginalName();
            
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            
            $extension = $request->file('profile_pic')->getClientOriginalExtension();
            
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
    
            $path = $request->file('profile_pic')->storeAs('public/img', $fileNameToStore);
    
            $seller_record_to_update->profile_pic = 'img/'.$fileNameToStore;
        }

        $seller_record_to_update->business_name = $request->input('business_name');
        $seller_record_to_update->business_type = $request->input('business_type');
        $seller_record_to_update->business_strength = $request->input('business_strength');
        $seller_record_to_update->product_category = $request->input('product_category');
        $seller_record_to_update->gst_number = $request->input('gst_number');
        $seller_record_to_update->business_description = $request->input('business_description');
        $seller_record_to_update->bank_name = $request->input('bank_name');
        $seller_record_to_update->bank_branch = $request->input('bank_branch');
        $seller_record_to_update->bank_ifsc_code = $request->input('bank_ifsc_code');
        $seller_record_to_update->bank_micr_code = $request->input('bank_micr_code');
        $seller_record_to_update->account_holder_name = $request->input('account_holder_name');
        $seller_record_to_update->account_number = $request->input('account_number');
        $seller_record_to_update->account_type = $request->input('account_type');

        if ($request->hasFile('proof_of_bank_account_ownership')) {
            Storage::delete($seller_record_to_update->proof_of_bank_account_ownership_file_path);
    
            $proofOfOwnership = $request->file('proof_of_bank_account_ownership');
            $proofPath = $proofOfOwnership->store('proof_of_bank_account_ownership', 'public');
            $seller_record_to_update->proof_of_bank_account_ownership_file_name = $proofOfOwnership->getClientOriginalName();
            $seller_record_to_update->proof_of_bank_account_ownership_file_path = $proofPath;
        }
    
        $seller_record_to_update->save();

        Session::forget('seller_session');
        Session::put('seller_session', $seller_record_to_update);

        return redirect()->back()->with('seller_record_to_update', 'Account updated successfully !');

    }

    public function deleting_seller_account_from_seller($id){
        $seller_to_delete = seller_info_table::find($id);
        $seller_to_delete->delete();
        Session::forget('seller_session');
        return redirect('/');
    }

    public function main_seller_dashboard()
    {
        $seller_session = Session::get('seller_session');
        return view('main_seller_dashboard', ['seller_session' => $seller_session]);
    }

    public function main_seller_dashboard_show_all_products_page()
    {
        $seller_session = Session::get('seller_session');
        $sellerId = $seller_session['id'];
        $particular_seller_all_products = products_info_table::where('seller_id', $sellerId)->get();
        return view('main_seller_dashboard_show_all_products_page', ['seller_session' => $seller_session, 'particular_seller_all_products' => $particular_seller_all_products]);
    }

    public function main_seller_dashboard_add_new_product_page()
    {
        $all_categories = categories_info_table::all();
        $all_sections = sections_info_table::all();
        $seller_session = Session::get('seller_session');
        return view('main_seller_dashboard_add_new_product_page', compact('seller_session', 'all_categories', 'all_sections'));
    }

    public function main_seller_dashboard_update_product_page($id)
    {
        $product_to_update = products_info_table::find($id);
        $all_categories = categories_info_table::all();
        $all_sections = sections_info_table::all();
        $seller_session = Session::get('seller_session');
        return view('main_seller_dashboard_update_product_page', compact('product_to_update', 'seller_session', 'all_categories', 'all_sections'));
    }

    public function main_seller_dashboard_show_all_products_page_with_alert()
    {
        return redirect()->route('main_seller_dashboard_show_all_products_page')->with('alert', 'In order to access the update page, please select any item for update operation From the All Products');
    }

    public function show_main_image_for_update_product_page($id, $product_id){
        $product_to_show_main_image = products_info_table::find($product_id);
        $seller_session = Session::get('seller_session');
        return view('show_main_image_for_update_product_page', compact('seller_session', 'product_to_show_main_image'));
    }

    public function show_other_images_for_update_product_page($id, $product_id){
        $product_to_show_other_images = products_info_table::find($product_id);
        $seller_session = Session::get('seller_session');
        return view('show_other_images_for_update_product_page', compact('seller_session', 'product_to_show_other_images'));
    }

    public function main_seller_dashboard_show_new_orders_page()
    {
        $seller_session = Session::get('seller_session');

        $logged_in_user_id = $seller_session->id;
        $all_order_data_of_logged_in_user = order_information_table::with('order', 'customer', 'customer_address', 'product', 'seller')->where('seller_id', $logged_in_user_id)->where('is_order_accepted', null)->where('is_order_cancelled', null)->get();

        return view('main_seller_dashboard_show_new_orders_page', compact('all_order_data_of_logged_in_user', 'seller_session'));
    }

    public function main_seller_dashboard_show_pending_orders_page()
    {
        $seller_session = Session::get('seller_session');

        $logged_in_user_id = $seller_session->id;
        $all_order_data_of_logged_in_user = order_information_table::with('order', 'customer', 'customer_address', 'product', 'seller')->where('seller_id', $logged_in_user_id)->where('is_order_accepted', 1)->where('is_order_packed', null)->get();

        return view('main_seller_dashboard_show_pending_orders_page', compact('all_order_data_of_logged_in_user', 'seller_session'));
    }

    public function main_seller_dashboard_show_marked_as_ready_orders_page()
    {
        $seller_session = Session::get('seller_session');

        $logged_in_user_id = $seller_session->id;
        $all_order_data_of_logged_in_user = order_information_table::with('order', 'customer', 'customer_address', 'product', 'seller')->where('seller_id', $logged_in_user_id)->where('is_order_packed', 1)->where('is_order_shipped', null)->get();

        return view('main_seller_dashboard_show_marked_as_ready_orders_page', compact('all_order_data_of_logged_in_user', 'seller_session'));
    }

    public function main_seller_dashboard_show_shipped_orders_page()
    {
        $seller_session = Session::get('seller_session');

        $logged_in_user_id = $seller_session->id;
        $all_order_data_of_logged_in_user = order_information_table::with('order', 'customer', 'customer_address', 'product', 'seller')->where('seller_id', $logged_in_user_id)->where('is_order_shipped', 1)->where('is_order_delivered', null)->get();

        return view('main_seller_dashboard_show_shipped_orders_page', compact('all_order_data_of_logged_in_user', 'seller_session'));
    }

    public function main_seller_dashboard_show_completed_orders_page()
    {
        $seller_session = Session::get('seller_session');

        $logged_in_user_id = $seller_session->id;
        $all_order_data_of_logged_in_user = order_information_table::with('order', 'customer', 'customer_address', 'product', 'seller')->where('seller_id', $logged_in_user_id)->where('is_order_delivered', 1)->get();

        return view('main_seller_dashboard_show_completed_orders_page', compact('all_order_data_of_logged_in_user', 'seller_session'));
    }

    public function main_seller_dashboard_show_cancelled_orders_page()
    {
        $seller_session = Session::get('seller_session');

        $logged_in_user_id = $seller_session->id;
        $all_order_data_of_logged_in_user = order_information_table::with('order', 'customer', 'customer_address', 'product', 'seller')->where('seller_id', $logged_in_user_id)->where('is_order_accepted', -1)->get();

        return view('main_seller_dashboard_show_cancelled_orders_page', compact('all_order_data_of_logged_in_user', 'seller_session'));
    }

    public function accept_order_from_seller($id)
    {
        $order_to_accept = order_information_table::find($id);

        $currentDateTime = Carbon::now();
        $currentDateTime->setTimezone('Asia/Kolkata');
        $formattedDateTime = $currentDateTime->format('d/m/y h:i:s A');


        $order_to_accept->is_order_accepted = 1;
        $order_to_accept->order_accepted_date = $formattedDateTime;

        $order_to_accept->save();

        return redirect()->back()->with('order_accepted', 'Order Accepted !');

    }

    public function mark_order_as_ready_from_seller($id)
    {
        $order_to_mark_as_ready = order_information_table::find($id);

        $currentDateTime = Carbon::now();
        $currentDateTime->setTimezone('Asia/Kolkata');
        $formattedDateTime = $currentDateTime->format('d/m/y h:i:s A');


        $order_to_mark_as_ready->is_order_packed = 1;
        $order_to_mark_as_ready->order_packed_date = $formattedDateTime;

        $order_to_mark_as_ready->save();

        return redirect()->back()->with('order_marked_as_ready', 'Order Marked As Ready !');

    }

    public function mark_order_as_pending_from_seller($id)
    {
        $order_to_mark_as_Pending = order_information_table::find($id);

        $order_to_mark_as_Pending->is_order_packed = null;
        $order_to_mark_as_Pending->order_packed_date = null;

        $order_to_mark_as_Pending->save();

        return redirect()->back()->with('order_marked_as_Pending', 'Order Marked As Pending !');

    }

    public function cancel_order_from_seller($id)
    {
        $order_to_cancel = order_information_table::find($id);

        $currentDateTime = Carbon::now();
        $currentDateTime->setTimezone('Asia/Kolkata');
        $formattedDateTime = $currentDateTime->format('d/m/y h:i:s A');


        $order_to_cancel->is_order_accepted = -1;
        $order_to_cancel->order_accepted_date = $formattedDateTime;

        $order_to_cancel->save();

        return redirect()->back()->with('order_cancelled', 'Order Cancelled !');

    }

    public function get_order_in_order_list_from_cancelled_orders_from_seller($id)
    {
        $order_to_get_back_in_order_list = order_information_table::find($id);

        $order_to_get_back_in_order_list->is_order_accepted = null;
        $order_to_get_back_in_order_list->order_accepted_date = null;

        $order_to_get_back_in_order_list->save();

        return redirect()->back()->with('order_gatted', 'Order gatted in "new orders list" !');

    }

    public function Cancel_order_Acceptance_from_seller($id)
    {
        $order_to_cancel_acceptance = order_information_table::find($id);

        $order_to_cancel_acceptance->is_order_accepted = null;
        $order_to_cancel_acceptance->order_accepted_date = null;

        $order_to_cancel_acceptance->save();

        return redirect()->back()->with('order_acceptance_cancelled', 'Order Acceptance Cancelled !');

    }

    public function main_seller_dashboard_show_total_stock_page()
    {
        $seller_session = Session::get('seller_session');
        return view('main_seller_dashboard_show_total_stock_page', ['seller_session' => $seller_session]);
    }

    public function main_seller_dashboard_update_stock_page()
    {
        $seller_session = Session::get('seller_session');
        return view('main_seller_dashboard_update_stock_page', ['seller_session' => $seller_session]);
    }

    public function main_seller_dashboard_show_payment_notifications_page()
    {
        $seller_session = Session::get('seller_session');
        return view('main_seller_dashboard_show_payment_notifications_page', ['seller_session' => $seller_session]);
    }

    public function main_seller_dashboard_show_income_page()
    {
        $seller_session = Session::get('seller_session');
        return view('main_seller_dashboard_show_income_page', ['seller_session' => $seller_session]);
    }

    public function main_seller_dashboard_show_new_exchange_request_page()
    {
        $seller_session = Session::get('seller_session');
        return view('main_seller_dashboard_show_new_exchange_request_page', ['seller_session' => $seller_session]);
    }

    public function main_seller_dashboard_show_new_return_request_page()
    {
        $seller_session = Session::get('seller_session');
        return view('main_seller_dashboard_show_new_return_request_page', ['seller_session' => $seller_session]);
    }

    public function main_seller_dashboard_show_exchanged_orders_page()
    {
        $seller_session = Session::get('seller_session');
        return view('main_seller_dashboard_show_exchanged_orders_page', ['seller_session' => $seller_session]);
    }

    public function main_seller_dashboard_show_returned_orders_page()
    {
        $seller_session = Session::get('seller_session');
        return view('main_seller_dashboard_show_returned_orders_page', ['seller_session' => $seller_session]);
    }

    public function main_seller_dashboard_show_order_notification_page()
    {
        $seller_session = Session::get('seller_session');
        return view('main_seller_dashboard_show_order_notification_page', ['seller_session' => $seller_session]);
    }

    public function main_seller_dashboard_show_other_notification_page()
    {
        $seller_session = Session::get('seller_session');
        return view('main_seller_dashboard_show_other_notification_page', ['seller_session' => $seller_session]);
    }

    public function main_seller_dashboard_show_customers_feedback_page()
    {
        $seller_session = Session::get('seller_session');
        return view('main_seller_dashboard_show_customers_feedback_page', ['seller_session' => $seller_session]);
    }

    public function main_seller_dashboard_customer_communication_by_mail_page()
    {
        $seller_session = Session::get('seller_session');
        return view('main_seller_dashboard_customer_communication_by_mail_page', ['seller_session' => $seller_session]);
    }

    public function main_seller_dashboard_admin_communication_by_mail_page()
    {
        $seller_session = Session::get('seller_session');
        return view('main_seller_dashboard_admin_communication_by_mail_page', ['seller_session' => $seller_session]);
    }

    public function main_seller_dashboard_settings_page()
    {
        $seller_session = Session::get('seller_session');
        return view('main_seller_dashboard_settings_page', ['seller_session' => $seller_session]);
    }

    public function main_seller_dashboard_help_page()
    {
        $seller_session = Session::get('seller_session');
        return view('main_seller_dashboard_help_page', ['seller_session' => $seller_session]);
    }

    public function main_seller_dashboard_about_us_page()
    {
        $seller_session = Session::get('seller_session');
        return view('main_seller_dashboard_about_us_page', ['seller_session' => $seller_session]);
    }

    public function main_seller_dashboard_contact_us_page()
    {
        $seller_session = Session::get('seller_session');
        return view('main_seller_dashboard_contact_us_page', ['seller_session' => $seller_session]);
    }

    public function main_seller_dashboard_documentation_page()
    {
        $seller_session = Session::get('seller_session');
        return view('main_seller_dashboard_documentation_page', ['seller_session' => $seller_session]);
    }

    public function main_seller_dashboard_profile_page()
    {
        $seller_session = Session::get('seller_session');
        return view('main_seller_dashboard_profile_page', ['seller_session' => $seller_session]);
    }

    public function main_seller_dashboard_customization_page()
    {
        $seller_session = Session::get('seller_session');
        return view('main_seller_dashboard_customization_page', ['seller_session' => $seller_session]);
    }

    public function seller_add_new_products_form_submission_route(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'product_name' => 'required|string',
                'product_brand' => 'required|string',
                'product_title' => 'required|string',
                'product_description' => 'required|string',
                'product_price' => 'required|numeric',
                'discount_price' => 'required|numeric',
                'product_quantity' => 'required|integer',
                'selected_category_name' => 'required|string|exists:categories_info,catagory_name',
                'product_keywords' => 'required|string',
                'product_color' => 'nullable|string',
                'product_size' => 'nullable|string',
                'product_weight' => 'nullable|string',
                'selected_section_name' => 'required|string|exists:sections_info,section_name',
                'product_main_image' => 'required|image|mimes:jpeg,png,jpg,gif',
                'product_other_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            ], [
                'product_name.required' => 'Please enter Product name.',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errorMessages = $e->validator->getMessageBag()->all();

            // Display error messages using JavaScript alerts
            echo '<script>';
            foreach ($errorMessages as $errorMessage) {
                echo 'alert("' . $errorMessage . '");';
            }
            echo '</script>';
            return;
        }

        $selectedCategory = categories_info_table::where('catagory_name', $validatedData['selected_category_name'])->first();
        $selectedSection = sections_info_table::where('section_name', $validatedData['selected_section_name'])->first();

        if (!$selectedCategory) {
            return redirect()->back()->with('add_product_route_msg', 'Selected category not found.');
        }

        if (!$selectedSection) {
            return redirect()->back()->with('add_product_route_msg', 'Selected section not found.');
        }

        $productMainImage = $request->file('product_main_image')->store('product_main_images', 'public');
        $productOtherImages = [];

        if ($request->hasFile('product_other_images')) {
            foreach ($request->file('product_other_images') as $otherImage) {
                $productOtherImages[] = $otherImage->store('product_other_images', 'public');
            }
        }

        $seller_session = Session::get('seller_session');
        $seller_id = $seller_session->id;

        $productDone = products_info_table::create([
            'seller_id' => $seller_id,
            'product_name' => $request->input('product_name'),
            'product_brand' => $request->input('product_brand'),
            'product_title' => $request->input('product_title'),
            'product_description' => $request->input('product_description'),
            'product_price' => $request->input('product_price'),
            'discount_price' => $request->input('discount_price'),
            'product_quantity' => $request->input('product_quantity'),
            'selected_category_name' => $request->input('selected_category_name'),
            'product_keywords' => $request->input('product_keywords'),
            'product_color' => $request->input('product_color'),
            'product_size' => $request->input('product_size'),
            'product_weight' => $request->input('product_weight'),
            'selected_section_name' => $request->input('selected_section_name'),
            'selected_category_id' => $selectedCategory->id,
            'product_status' => 'active', 
            'selected_section_id' => $selectedSection->id,
            'product_main_image' => $productMainImage,
            'product_other_images' => $productOtherImages,
            'tc' => true,
        ]);

        if ($productDone) {
            return redirect()->back()->with('add_product_route_msg', 'Product Added Successfully...!');
        } else {
            echo "Error occurred in data insertion";
        }
    }

    public function delete_product_from_seller($id){
        echo "Hello From delete_product_from_seller dashboard...";
        $product_to_delete = products_info_table::find($id);
        $product_to_delete->delete();
        return redirect()->back()->with('delete_product_route_msg', 'Product Deleted Successfully...!');
    }

    public function seller_update_products_form_submission_route(Request $request, $id)
    {

        $product_to_update_data = products_info_table::find($id);

        $is_selected_category_modified = $request->input('selected_category_name') !== $product_to_update_data->selected_category_name;
        $is_selected_section_modified = $request->input('selected_section_name') !== $product_to_update_data->selected_section_name;
        $is_main_image_modified = $request->hasFile('product_main_image');

        try {
            $validatedData = $request->validate([
                'product_name' => 'required|string',
                'product_brand' => 'required|string',
                'product_title' => 'required|string',
                'product_description' => 'required|string',
                'product_price' => 'required|numeric',
                'discount_price' => 'required|numeric',
                'product_quantity' => 'required|integer',
                'selected_category_name' => 'sometimes|required_if:is_selected_category_modified,true|exists:categories_info,catagory_name',
                'product_keywords' => 'required|string',
                'product_color' => 'nullable|string',
                'product_size' => 'nullable|string',
                'product_weight' => 'nullable|string',
                'selected_section_name' => 'sometimes|required_if:is_selected_section_modified,true|exists:sections_info,section_name',
                'product_main_image' => 'sometimes|required_if:is_main_image_modified,true|image|mimes:jpeg,png,jpg,gif',
                'product_other_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            ], [
                'product_name.required' => 'Please enter Product name.',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errorMessages = $e->validator->getMessageBag()->all();

            echo '<script>';
            foreach ($errorMessages as $errorMessage) {
                echo 'alert("' . $errorMessage . '");';
            }
            echo '</script>';
            return;
        }

        $selectedCategoryName = $request->input('selected_category_name');
        if (isset($validatedData['selected_category_name'])) {
            $selectedCategoryName = $validatedData['selected_category_name'];
        }

        $selectedSectionName = $request->input('selected_section_name');
        if (isset($validatedData['selected_section_name'])) {
            $selectedSectionName = $validatedData['selected_section_name'];
        }

        $selectedCategory = categories_info_table::where('catagory_name', $selectedCategoryName)->first();
        $selectedSection = sections_info_table::where('section_name', $selectedSectionName)->first();

        if (!$selectedCategory) {
            return redirect()->back()->with('update_product_route_msg', 'Selected category not found.');
        }

        if (!$selectedSection) {
            return redirect()->back()->with('update_product_route_msg', 'Selected section not found.');
        }

        $productOtherImages = [];

        if ($request->hasFile('product_main_image')) {
            $productMainImage = $request->hasFile('product_main_image') ? $request->file('product_main_image')->store('product_main_images', 'public') : $product_to_update_data->product_main_image;
        } else {
            $productMainImage = $product_to_update_data->product_main_image;
        }

        if ($request->hasFile('product_other_images')) {
            foreach ($request->file('product_other_images') as $otherImage) {
                $productOtherImages[] = $otherImage->store('product_other_images', 'public');
            }
        } else {
            $productOtherImages = $product_to_update_data->product_other_images;
        }

        $check = $product_to_update_data->update([
            'product_name' => $request->product_name,
            'product_brand' => $request->product_brand,
            'product_title' => $request->product_title,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'discount_price' => $request->discount_price,
            'product_quantity' => $request->product_quantity,
            'selected_category_name' => $selectedCategoryName,
            'product_keywords' => $request->product_keywords,
            'product_color' => $request->product_color,
            'product_size' => $request->product_size,
            'product_weight' => $request->product_weight,
            'selected_section_name' => $selectedSectionName,
            'selected_category_id' => $selectedCategory->id,
            'product_status' => 'active',
            'selected_section_id' => $selectedSection->id,
            'product_main_image' => $productMainImage,
            'product_other_images' => $productOtherImages,
            'tc' => true,
        ]);

        if($check){
            return redirect()->back()->with('update_product_route_msg', 'Product Updated Successfully...!');
        }else{
            echo "Kuch to problem he bhai...";
        }

    }

    public function main_seller_dashboard_nothing_to_show_in_products_record(){
        $seller_session = Session::get('seller_session');
        return view('main_seller_dashboard_nothing_to_show_in_products_record', compact('seller_session'));
    }

}
