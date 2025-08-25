<?php

namespace App\Http\Controllers;
use App\Models\customers_info_table;
use App\Models\customers_otp_table;
use App\Models\customer_cart_table;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\products_info_table;
use App\Models\seller_info_table;
use App\Models\orders_table;
use App\Models\order_information_table;
use App\Models\customers_address_table;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Models\customers_feedbacks_table;
class CustomerController extends Controller
{

    public function customers_first_window(){
        $allCustomerFeedbacks = customers_feedbacks_table::with('customer')->get();
        return view('customers_first_window', compact('allCustomerFeedbacks'));
    }

    public function customer_registration_page(){
        return view('customer_registration_page');
    }

    public function customer_login_page(){
        return view('customer_login_page');
    }

    public function customer_account($customer_id)
    {
        $customer_data = customers_info_table::find($customer_id);
        $customer_address_data = customers_address_table::where('customer_id', $customer_id)->first();
        return view('showing_logged_in_customer_account', compact('customer_data', 'customer_address_data'));
    }

    public function updating_customer_user_record_from_customer_page_form_submission(Request $request, $id)
    {
        $customer_record_to_update = customers_info_table::find($id);

        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:customers_info,email,'.$id,
                'phone_no' => 'required|string|unique:customers_info,phone_no,'.$id,
                'address' => 'required|string',
                'profile_pic' => 'image|mimes:jpeg,png,jpg',
            ], [
                'name.required' => 'Please enter customer name.',
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

        if ($request->hasFile('profile_pic')) {
            $fileNameWithExt = $request->file('profile_pic')->getClientOriginalName();
            
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            
            $extension = $request->file('profile_pic')->getClientOriginalExtension();
            
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
    
            $path = $request->file('profile_pic')->storeAs('public/img', $fileNameToStore);
    
            $customer_record_to_update->profile_pic = 'img/'.$fileNameToStore;
        }

        $customer_record_to_update->name = $request->input('name');
        $customer_record_to_update->email = $request->input('email');
        $customer_record_to_update->phone_no = $request->input('phone_no');
        $customer_record_to_update->address = $request->input('address');

        $customer_record_to_update->save();

        Session::forget('customer_session');
        Session::put('customer_session', $customer_record_to_update);

        return redirect()->back()->with('customer_account_updated', 'Account updated successfully !');
    }

    public function updating_customer_user_address_record_from_customer_page_form_submission(Request $request, $id)
    {
        $customer_address_record_to_update = customers_address_table::where('customer_id', $id)->first();

        try{
            $validatedData = $request->validate([
                'country' => 'required|string',
                'state' => 'required|string',
                'city' => 'required|string',
                'area_or_village' => 'required|string',
                'pincode' => 'required|numeric',
                'landmark' => 'required|string',
                'full_address' => 'required|string',
            ], 
            [
                'country.required' => 'Please enter country name',
            ]);
        }catch (\Illuminate\Validation\ValidationException $e) {
            $errorMessages = $e->validator->getMessageBag()->all();
        
            echo '<script>';
            foreach ($errorMessages as $errorMessage) {
                echo 'alert("' . $errorMessage . '");';
            }
            echo '</script>';
            return;
        }

        $customer_address_record_to_update->country = $request->input('country');
        $customer_address_record_to_update->state = $request->input('state');
        $customer_address_record_to_update->city = $request->input('city');
        $customer_address_record_to_update->area_or_village = $request->input('area_or_village');
        $customer_address_record_to_update->pincode = $request->input('pincode');
        $customer_address_record_to_update->landmark = $request->input('landmark');
        $customer_address_record_to_update->full_address = $request->input('full_address');

        $customer_address_record_to_update->save();

        return redirect()->back()->with('customer_account_updated', 'Account updated successfully !');
    }

    public function deleting_customer_account_from_customer($id){
        $customer_to_delete = customers_info_table::find($id);
        $customer_to_delete->delete();
        Session::forget('customer_session');
        return redirect('/');
    }

    public function logged_in_customer(){
        $customer_session = Session::get('customer_session');
        return view('main_initial_page', ['customer_session' => $customer_session]);
    }

    public function main_customer_feedback_form(){
        return view('main_customer_feedback_form');
    }

    public function customer_registration_form_submission_route(Request $request){
        echo "Hello From customer_registration_form_submission_route";

        try{
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:customers_info',
                'phone_no' => 'required|string|unique:customers_info',
                'address' => 'required|string',
            ], 
            [
                'name.required' => 'Please enter your name.',
            ]);
        }catch (\Illuminate\Validation\ValidationException $e) {
            $errorMessages = $e->validator->getMessageBag()->all();
        
            // Display error messages using JavaScript alerts
            echo '<script>';
            foreach ($errorMessages as $errorMessage) {
                echo 'alert("' . $errorMessage . '");';
            }
            echo '</script>';
            return;
        }

        $customer = customers_info_table::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_no' => $request->input('phone_no'),
            'address' => $request->input('address'),
        ]);

        if ($customer) {
            // echo "data inserted successfully.....!";
            $usertype = ($request->input('user_type') == '1') ? '1' : '0';
            return redirect()->route('customer_login_page');
        } else {
            echo "Error occured in data insertion";
        }
    }

    public function customer_login_form_phone_no_submission_route(Request $request){
        echo "Hello From customer_login_form_phone_no_submission_route";

        try {
            $validatedData = $request->validate([
                'phone_no' => 'required|exists:customers_info,phone_no|regex:/^\+\d{1,3}(\s?\d+)+$/',
            ],
            [
                'phone_no.required' => 'Please provide a phone number.',
                'phone_no.regex' => 'Please enter a valid phone number with a country code.',
                'phone_no.exists' => 'The provided phone number is not registered.',
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

        $phone_no = $request->input('phone_no');
        $user = customers_info_table::where('phone_no', $request->phone_no)->first();
        if($user)
        {
            echo "<br>Mobile no is valid...";
            $userOtp = $this->generateOTPC($request, $request->phone_no);
            $userOtp->sendSMS($request->phone_no);
            echo "<br><h1>OTP HAS BEEN SENT GO BACK AND ENTER OTP AND CONTINUE TO LOGIN...</h1>";
            Session::put('phone_no', $phone_no);

            $now = now();
            session()->flash('otp_sent_at', $now);
            session()->put('otp_sent', true);
            
            Session::put('phone_no', $phone_no);
            session()->flash('otp_sent', true);
            return redirect()->route('customer_otp_verification',['c_id'=>$userOtp->c_id])->with('otp_sent', true);
        }else{
            echo "<br>Mobile no is invalid...";
        }
    }

    public function generateOTPC(Request $request, $phone_no)
    {
        $user = customers_info_table::where('phone_no', $request->phone_no)->first();
        $userOtp = customers_otp_table::where('c_id',$user->id)->latest('created_at')->first();

        $now = now();

        if($userOtp && $now->isBefore($userOtp->otp_expires_at))
        {
            return $userOtp;
        }

        return customers_otp_table::updateOrCreate(['c_id'=>$user->id],[
            'c_id' => $user->id,
            'otp' => rand(100000, 999999),
            'otp_expires_at' => $now->addMinutes(5)
        ]);
    }

    public function customer_otp_verification($c_id)
    {
        return view('customer_login_page',compact('c_id'));
    }

    public function customer_login_otp_verification_route(Request $request){
        echo "Hello From customer_login_otp_verification_route";

        try {
            $validatedData = $request->validate([
                'otp' => 'required|digits:6',
            ],
            [
                'otp.required' => 'Please provide the OTP.',
                'otp.digits' => 'The OTP must be a 6-digit number.',
            ]);

            $userOtp = customers_otp_table::where('c_id', $request->c_id)->where('otp', $request->otp)->first();

            $now = now();

            if(!$userOtp)
            {
                return "<br><h1>OTP is incorrect...</h1>";
            }
            else if($userOtp && $now->isAfter($userOtp->otp_expires_at))
            {
                return "<br><h1>This OTP has been expired please request new OTP...</h1>";
            }

            $user = customers_info_table::whereId($request->c_id)->first();

            if($user)
            {
                $userOtp->update([
                    'otp_expires_at' => now()
                ]);
                echo "<br><h1>OTP CORRECT...</h1>";
                Session::put('customer_session', $user);
                Session::forget('phone_no');

                // dd(session('customer_session'));

                if($user->user_type == '1')
                {
                    return redirect()->route('admin_login_username_password_verification_page');
                }
                else
                {
                    // return redirect()->route('logged_in_customer');
                    return redirect('/');
                }
                // echo "<br><h1>OTP CORRECT...</h1>";
            }  
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errorMessages = $e->validator->getMessageBag()->all();

            // Echo the error messages
            echo '<br><h2 style="color: red;">You cannot Login due to following errors :</h2><br>';
            foreach ($errorMessages as $errorMessage) {
                echo '<center>' . '<h1>'. $errorMessage . '<br>' . '</h1>' . '</center>';
            }

            return;
        }
    }

    public function customer_cart_page()
    {
        $customer_data = Session::get('customer_session');
        $logged_in_user_id = $customer_data->id;
        $all_cart_data_of_logged_in_user = customer_cart_table::with('product', 'customer', 'seller')->where('customer_id', $logged_in_user_id)->get();

        $customer_to_get_address = customers_info_table::find($logged_in_user_id);
        
        if ($customer_to_get_address->addresses->isNotEmpty()) 
        {
            $address_stored = true;
        }
        else
        {
            $address_stored = false;
        }

        $prodect_added_in_cart_for_buy_now = session()->has('prodect_added_in_cart_for_buy_now') ? session('prodect_added_in_cart_for_buy_now') : null;
        $added_product_id = session()->has('added_product_id') ? session('added_product_id') : null;

        return view('customer_cart_page', compact('all_cart_data_of_logged_in_user', 'customer_data', 'address_stored', 'prodect_added_in_cart_for_buy_now', 'added_product_id'));
    }

    public function customer_orders_page()
    {
        $customer_data = Session::get('customer_session');
        $logged_in_user_id = $customer_data->id;
        $all_order_data_of_logged_in_user = order_information_table::with('order', 'customer', 'customer_address', 'product', 'seller')->where('customer_id', $logged_in_user_id)->get();

        return view('customer_orders_page', compact('all_order_data_of_logged_in_user', 'customer_data'));
    }

    public function customer_feedback_page(){
        $customer_session = Session::get('customer_session');
        return view('customer_feedback_page', compact('customer_session'));
    }

    public function customer_feedback_form_submission(Request $request, $customer_id)
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'feedback' => 'required|string|max:255',
        ]);

        $feedback = customers_feedbacks_table::create([
            'customer_id' => $customer_id,
            'rating' => $request->rating,
            'feedback' => $request->feedback,
        ]);

        return view('customer_feedback_submitted_page');

    }

    public function customer_feedback_submitted_page()
    {
        return view('customer_feedback_submitted_page');
    }


    public function Logout_Error(){
        return view('Logout_Error');
    }

    public function customer_logout(){
        if(Session::has('customer_session')){
            Session::pull('customer_session');
            // dd(session('customer_session'));
            return redirect('/');
        }
    }

    public function adding_product_to_cart_from_customer(Request $request, $id)
    {
        $customer_data = Session::get('customer_session');
        $product_data = products_info_table::find($id);
        $seller_data = seller_info_table::find($product_data->seller_id);
        
        $cart_data = new customer_cart_table;

        $cart_data->customer_id = $customer_data->id;
        $cart_data->seller_id = $seller_data->id;
        $cart_data->product_id = $product_data->id;
        
        $cart_data->product_quantity_ordered_by_customer = $request->product_quantity_ordered_by_customer;
        $cart_data->total_price_of_product_with_all_quantities_without_discount = $product_data->discount_price * $request->product_quantity_ordered_by_customer;
        $cart_data->total_price_of_product_with_all_quantities_with_discount = $product_data->product_price * $request->product_quantity_ordered_by_customer;

        $cart_data->save();

        return redirect()->back()->with('prodect_added_in_cart', 'Product Added In Cart Successfully !');
    }

    public function adding_product_to_cart_from_customer_for_buy_now(Request $request, $id)
    {
        $customer_data = Session::get('customer_session');
        $product_data = products_info_table::find($id);
        $seller_data = seller_info_table::find($product_data->seller_id);
        
        $cart_data = new customer_cart_table;

        $cart_data->customer_id = $customer_data->id;
        $cart_data->seller_id = $seller_data->id;
        $cart_data->product_id = $product_data->id;
        
        $cart_data->product_quantity_ordered_by_customer = $request->product_quantity_ordered_by_customer;
        $cart_data->total_price_of_product_with_all_quantities_without_discount = $product_data->discount_price * $request->product_quantity_ordered_by_customer;
        $cart_data->total_price_of_product_with_all_quantities_with_discount = $product_data->product_price * $request->product_quantity_ordered_by_customer;

        $cart_data->save();
        
        $added_product_id = $cart_data->id;

        return redirect()->route('customer_cart_page')->with([
            'prodect_added_in_cart_for_buy_now' => 'Please click On The "Buy Now" Button to process further !',
            'added_product_id' => $added_product_id,
        ]);
    }

    public function product($id)
    {
        $product_to_display = products_info_table::find($id);
        $other_products = products_info_table::where('id', '!=', $id)->get();
        $customer_data = Session::get('customer_session');


        $userCartProducts = [];

        if($customer_data)
        {
            $userCartProducts = customer_cart_table::where('customer_id', $customer_data->id)->pluck('product_id')->toArray();

            $customer_to_get_address = customers_info_table::find($customer_data->id);
        
            if ($customer_to_get_address->addresses->isNotEmpty()) 
            {
                $address_stored = true;
            }
            else
            {
                $address_stored = false;
            }

            return view('showing_single_product_page', compact('product_to_display', 'other_products', 'customer_data', 'userCartProducts', 'address_stored'));

        }


        return view('showing_single_product_page', compact('product_to_display', 'other_products', 'userCartProducts', 'customer_data'));
    }

    public function removing_product_from_cart_by_customer($id)
    {
        $product_to_remove_from_cart = customer_cart_table::find($id);
        $product_to_remove_from_cart->delete();
        return redirect()->back()->with('message', 'Product Removed From Cart !');
    }

    public function cancel_order_from_customer($id)
    {
        $order_to_cancel = order_information_table::find($id);

        $currentDateTime = Carbon::now();
        $currentDateTime->setTimezone('Asia/Kolkata');
        $formattedDateTime = $currentDateTime->format('d/m/y h:i:s A');


        $order_to_cancel->is_order_cancelled = 1;
        $order_to_cancel->order_cancelled_date = $formattedDateTime;

        $order_to_cancel->save();

        return redirect()->back()->with('order_cancelled_from_customer', 'Order Cancelled !');
    }

    public function product_details_for_order($id)
    {
        $product_to_show_details = products_info_table::find($id);
        return view('showing_single_product_details_for_placing_order', compact('product_to_show_details'));
    }

    public function customer_address($id)
    {
        $customer_to_store_address = customers_info_table::find($id);
        Session::put('previous_url', url()->previous());
        return view('storing_customer_address', compact('customer_to_store_address'));
    }

    public function storing_customer_address_form_submission($id, Request $request)
    {
        $customer_to_store_address = customers_info_table::find($id);

        try{
            $validatedData = $request->validate([
                'country' => 'required|string',
                'state' => 'required|string',
                'city' => 'required|string',
                'area_or_village' => 'required|string',
                'pincode' => 'required|numeric',
                'landmark' => 'required|string',
                'full_address' => 'required|string',
            ], 
            [
                'country.required' => 'Please enter country name',
            ]);
        }catch (\Illuminate\Validation\ValidationException $e) {
            $errorMessages = $e->validator->getMessageBag()->all();
        
            echo '<script>';
            foreach ($errorMessages as $errorMessage) {
                echo 'alert("' . $errorMessage . '");';
            }
            echo '</script>';
            return;
        }

        $customer_address = customers_address_table::create([
            'customer_id' => $customer_to_store_address->id,
            'country' => $request->input('country'),
            'state' => $request->input('state'),
            'city' => $request->input('city'),
            'area_or_village' => $request->input('area_or_village'),
            'pincode' => $request->input('pincode'),
            'landmark' => $request->input('landmark'),
            'full_address' => $request->input('full_address'),
        ]);

        return redirect()->to(Session::get('previous_url'))->with('address_stored', 'Your Address Has Been Stored Successfully, THANK YOU & Continue with your shopping !');
        // return redirect()->route('customer_cart_page')->with('address_stored', 'Your Address Has Been Stored Successfully, THANK YOU & Continue with your shopping !');

    }

    public function go_to_store_customer_address_page($id)
    {
        $customer_to_store_address = customers_info_table::find($id);
        
        return redirect()->route('customer_address', $customer_to_store_address->id);
    }

    public function order_payment($id)
    {
        $customer_that_make_payment = customers_info_table::find($id);
        return view('main_payment_page_of_product_by_customer', compact('customer_that_make_payment'));
    }

}