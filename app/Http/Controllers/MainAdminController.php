<?php

namespace App\Http\Controllers;
use App\Models\categories_info_table;
use App\Models\sections_info_table;
use App\Models\products_info_table;
use App\Models\customers_info_table;
use App\Models\seller_info_table;
use App\Models\delivery_team_application_info_table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\admin_email_verification_table;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\AdminVerificationMail;

use App\Models\employee_application_info_table;
use App\Models\confirmed_employee_application_info_table;
use App\Mail\EmployeeConfirmationMail;
use App\Mail\DeliveryApplicantConfirmationMail;
use App\Mail\EmployeeApplicantCancelConfirmationMail;
use App\Mail\DeliveryApplicantCancelConfirmationMail;
use App\Mail\DemoMail;

use Illuminate\Http\UploadedFile;

use Illuminate\Http\Request;
use App\Models\system_administration_table;

class MainAdminController extends Controller
{

    public function admin_account($admin_id)
    {
        $admin_data = system_administration_table::find($admin_id);
        return view('showing_logged_in_admin_account', compact('admin_data'));
    }

    public function updating_admin_user_record_from_admin_page_form_submission(Request $request, $id){
        $admin_record_to_update = system_administration_table::find($id);

        try {
            $validatedData = $request->validate([
                'admin_name' => 'required|string',
                'admin_email' => 'required|email|unique:system_administration,admin_email,' . $id,
                'admin_phone_no' => 'required|string|unique:system_administration,admin_phone_no,' . $id,
                'admin_address' => 'required|string',
                'username' => 'required|string|unique:system_administration,username,' . $id,
                'secret_password' => 'nullable|string',
                'password' => 'required|string',
                'profile_pic' => 'image|mimes:jpeg,png,jpg',
            ], [
                'name.required' => 'Please enter your name',
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

        $admin_record_to_update->admin_name = $request->input('admin_name');
        $admin_record_to_update->admin_email = $request->input('admin_email');
        $admin_record_to_update->admin_phone_no = $request->input('admin_phone_no');
        $admin_record_to_update->admin_address = $request->input('admin_address');
        $admin_record_to_update->username = $request->input('username');
        
        if ($request->filled('password')) {
            $admin_record_to_update->secret_password = bcrypt($request->input('password'));
            $admin_record_to_update->password = $request->input('password'); 
        }

        if ($request->hasFile('profile_pic')) {
            $fileNameWithExt = $request->file('profile_pic')->getClientOriginalName();
            
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            
            $extension = $request->file('profile_pic')->getClientOriginalExtension();
            
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
    
            $path = $request->file('profile_pic')->storeAs('public/img', $fileNameToStore);
    
            $admin_record_to_update->profile_pic = 'img/'.$fileNameToStore;
        }
    
        $admin_record_to_update->save();

        Session::forget('admin_session');
        Session::put('admin_session', $admin_record_to_update);

        return redirect()->back()->with('admin_record_to_update', 'Account updated successfully !');

    }

    public function sending_email_for_verify_admin_user($admin_id)
    {
        $admin_to_sent_an_email = system_administration_table::find($admin_id);

        $userVerificationCode = admin_email_verification_table::where('admin_id',$admin_to_sent_an_email->id)->latest('varification_code_created_at')->first();

        $now = now();

        if($userVerificationCode && $now->isBefore($userVerificationCode->varification_code_expires_at))
        {
            $verification_code = $userVerificationCode->varification_code;
        }
        else
        {
            $verification_code = Str::random(26);
        }

        $this->sendVerificationCodeEmailToAdmin($admin_to_sent_an_email->admin_email, $verification_code);
        
        admin_email_verification_table::updateOrCreate(['admin_id'=>$admin_to_sent_an_email->id],[
            'admin_id' => $admin_to_sent_an_email->id,
            'varification_code' => $verification_code,
            'varification_code_expires_at' => $now->addMinutes(10)
        ]);

        Session::put('mail_has_been_sent_to_user', true);

        return redirect()->back();
    }

    private function sendVerificationCodeEmailToAdmin($email, $verification_code)
    {
        Mail::to($email)->send(new AdminVerificationMail($verification_code));
    }

    public function verifying_admin_email_verification_code_form_submission($admin_id, Request $request)
    {
        try {
            $validatedData = $request->validate([
                'varification_code' => 'required',
            ],
            [
                'varification_code.required' => 'Please provide the varification code',
            ]);

            $verification_code = admin_email_verification_table::where('admin_id', $admin_id)->where('varification_code', $request->varification_code)->first();

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

            $user = system_administration_table::whereId($admin_id)->first();

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

    public function deleting_admin_account_from_admin($id){
        $admin_to_delete = system_administration_table::find($id);
        $admin_to_delete->delete();
        Session::forget('admin_session');
        return redirect('/');
    }

    public function adding_new_catagory(Request $request){

        if(Session()->has('admin_session'))
        {
            $admin_session = Session::get('admin_session');
            $admin_id = $admin_session->id;
            $data = new categories_info_table;
            $data->catagory_name = $request->catagory_name;
            $data->admin_id = $admin_id;
            $data->save();
            return redirect()->back()->with('message', 'Category Added Successfully...!');
        }else{
            echo "<h1>unauthenticated user... Getout!<h1>";
        }
        
    }

    public function updating_new_catagory(Request $request, $id){
        $category_to_update = categories_info_table::find($id);

        $category_to_update->catagory_name = $request->catagory_name;

        $category_to_update->save();

        return redirect()->back()->with('message', 'Changes Saved Successfully...!');
    }

    public function updating_new_section(Request $request, $id){
        $section_to_update = sections_info_table::find($id);

        $section_to_update->section_name = $request->section_name;

        $section_to_update->save();

        return redirect()->back()->with('message', 'Changes Saved Successfully...!');
    }

    public function main_admin_dashboard_show_categories_page(){
        $all_categories = categories_info_table::all();
        $admin_session = Session::get('admin_session'); 
        return view('main_admin_dashboard_show_categories_page', ['admin_session' => $admin_session], compact('all_categories'));
    }

    public function delete_category($id){
        $category_to_delete = categories_info_table::find($id);
        $category_to_delete->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully...!');
    }

    // public function main_admin_dashboard_update_category_page(){ 
    //     $admin_session = Session::get('admin_session'); 
    //     return view('main_admin_dashboard_update_category_page', ['admin_session' => $admin_session]); 
    // }

    public function main_admin_dashboard_show_categories_page_with_alert(){
        return redirect()->route('main_admin_dashboard_show_categories_page')->with('alert', 'In order to access the update page, please select any item for update operation From the All Categories');
    }

    public function main_admin_dashboard_show_sections_page_with_alert(){
        return redirect()->route('main_admin_dashboard_show_sections_page')->with('alert', 'In order to access the update page, please select any item for update operation From the All Sections');
    }

    public function update_category($id){
        $category_to_update = categories_info_table::find($id);
        return view('main_admin_dashboard_update_category_page', compact('category_to_update'));
    }

    public function adding_new_section(Request $request){

        if(Session()->has('admin_session'))
        {
            $admin_session = Session::get('admin_session');
            $admin_id = $admin_session->id;
            $data = new sections_info_table;
            $data->section_name = $request->section_name;
            $data->admin_id = $admin_id;
            $data->save();
            return redirect()->back()->with('message', 'Section Added Successfully...!');
        }else{
            echo "<h1>unauthenticated user... Getout!<h1>";
        }
        
    }

    public function main_admin_dashboard_show_sections_page(){
        $all_sections = sections_info_table::all();
        $admin_session = Session::get('admin_session'); 
        return view('main_admin_dashboard_show_sections_page', ['admin_session' => $admin_session], compact('all_sections'));
    }

    public function delete_section($id){
        $section_to_delete = sections_info_table::find($id);
        $section_to_delete->delete();
        return redirect()->back()->with('message', 'Section Deleted Successfully...!');
    }

    public function main_admin_dashboard_add_new_section_page(){
        $admin_session = Session::get('admin_session'); 
        return view('main_admin_dashboard_add_new_section_page', ['admin_session' => $admin_session]);
    }

    public function main_admin_dashboard_update_section_page($id){
        $section_to_update = sections_info_table::find($id);
        $admin_session = Session::get('admin_session'); 
        return view('main_admin_dashboard_update_section_page',compact('admin_session', 'section_to_update'));
    }

    public function main_admin_dashboard_show_products_page()
    {
        $all_products = products_info_table::all();
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard_show_products_page', ['admin_session' => $admin_session], compact('all_products'));
    }

    public function delete_product_from_admin($id){
        echo "Hello From delete_product_from_admin dashboard...";
        $product_to_delete = products_info_table::find($id);
        $product_to_delete->delete();
        return redirect()->back()->with('delete_product_route_msg', 'Product Deleted Successfully...!');
    }

    public  function main_admin_dashboard_update_product_page($id){
        $product_to_update = products_info_table::find($id);
        $all_categories = categories_info_table::all();
        $all_sections = sections_info_table::all();
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard_update_product_page', compact('product_to_update', 'admin_session', 'all_categories', 'all_sections'));
    }

    public function show_main_image_to_admin_for_update_product_page($id, $product_id){
        $product_to_show_main_image = products_info_table::find($product_id);
        $admin_session = Session::get('admin_session');
        return view('show_main_image_to_admin_for_update_product_page', compact('admin_session', 'product_to_show_main_image'));
    }

    public function show_other_images_to_admin_for_update_product_page($id, $product_id){
        $product_to_show_other_images = products_info_table::find($product_id);
        $admin_session = Session::get('admin_session');
        return view('show_other_images_to_admin_for_update_product_page', compact('admin_session', 'product_to_show_other_images'));
    }

    public function admin_update_products_form_submission_route(Request $request, $id)
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
                'product_status' => 'required|string',
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
            return redirect()->back()->with('update_product_admin_route_msg', 'Selected category not found.');
        }

        if (!$selectedSection) {
            return redirect()->back()->with('update_product_admin_route_msg', 'Selected section not found.');
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
            'product_status' => $request->product_status,
        ]);

        if($check){
            return redirect()->back()->with('update_product_admin_route_msg', 'Product Updated Successfully...!');
        }else{
            echo "Kuch to problem he bhai...";
        }

    }

    public function main_admin_dashboard_nothing_to_show_in_products_record(){
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard_nothing_to_show_in_products_record', compact('admin_session'));
    }

    public function main_admin_dashboard_nothing_to_show_in_categories_record(){
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard_nothing_to_show_in_categories_record', compact('admin_session'));
    }

    public function main_admin_dashboard_nothing_to_show_in_sections_record(){
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard_nothing_to_show_in_sections_record', compact('admin_session'));
    }

    public function main_admin_dashboard_nothing_to_show_in_customers_record(){
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard_nothing_to_show_in_customers_record', compact('admin_session'));
    }

    public function main_admin_dashboard_show_customers_page(){ 
        $all_customers = customers_info_table::all();
        $admin_session = Session::get('admin_session'); 
        return view('main_admin_dashboard_show_customers_page', compact('admin_session', 'all_customers')); 
    }

    public function main_admin_dashboard_show_sellers_page(){ 
        $all_sellers = seller_info_table::all();
        $admin_session = Session::get('admin_session'); 
        return view('main_admin_dashboard_show_sellers_page', compact('admin_session', 'all_sellers')); 
    }

    public function deleting_seller_record_from_admin($id){
        $seller_to_delete = seller_info_table::find($id);
        $seller_to_delete->delete();
        return redirect()->back()->with('message', 'Seller Record Deleted Successfully...!');
    }

    public function document_viewer($id)
    {
        $SellerBankAccountProof = seller_info_table::find($id); 
        return view('document_viewer', ['SellerBankAccountProof' => $SellerBankAccountProof]);
    }

    public function deleting_customer_record_from_admin($id){
        $customer_to_delete = customers_info_table::find($id);
        $customer_to_delete->delete();
        return redirect()->back()->with('message', 'Customer Record Deleted Successfully...!');
    }

    public function main_admin_dashboard_page_for_updating_customer_record_from_admin($id){
        $customer_record_to_update = customers_info_table::find($id);
        $admin_session = Session::get('admin_session'); 
        return view('main_admin_dashboard_page_for_updating_customer_record_from_admin', compact('customer_record_to_update', 'admin_session'));
    }

    public function updating_customer_user_record_from_admin_page_form_submission(Request $request, $id){
        $customer_record_to_update = customers_info_table::find($id);

        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:customers_info,email,'.$id,
                'phone_no' => 'required|string|unique:customers_info,phone_no,'.$id,
                'address' => 'required|string',
            ], [
                'name.required' => 'Please enter customer name.',
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

        $customer_record_to_update->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_no' => $request->input('phone_no'),
            'address' => $request->input('address'),
        ]);

        return redirect()->back()->with('message', 'Changes Saved Successfully...!');
    }

    public function main_admin_dashboard_page_for_updating_seller_record_from_admin($id){
        $seller_record_to_update = seller_info_table::find($id);
        $admin_session = Session::get('admin_session'); 
        return view('main_admin_dashboard_page_for_updating_seller_record_from_admin', compact('seller_record_to_update', 'admin_session'));
    }

    public function updating_seller_user_record_from_admin_page_form_submission(Request $request, $id){
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

        return redirect()->back()->with('update_seller_record_msg', 'Changes Saved Successfully!');

    }

    public function main_admin_dashboard_show_all_employee_application_page(){
        $all_employees = employee_application_info_table::where('is_confirmed', 0)->get();
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard_show_all_employee_application_page', compact('all_employees', 'admin_session'));
    }

    public function employee_photo_viewer($id)
    {
        $employee_to_see_document = employee_application_info_table::find($id); 
        $admin_session = Session::get('admin_session');
        return view('employee_photo_viewer',  compact('employee_to_see_document', 'admin_session'));
    }

    public function employee_addharcard_viewer($id)
    {
        $employee_to_see_document = employee_application_info_table::find($id); 
        return view('employee_addharcard_viewer', ['employee_to_see_document' => $employee_to_see_document]);
    }

    public function employee_proof_of_percentage_of_twelve_viewer($id)
    {
        $employee_to_see_document = employee_application_info_table::find($id); 
        return view('employee_proof_of_percentage_of_twelve_viewer', ['employee_to_see_document' => $employee_to_see_document]);
    }

    public function employee_proof_of_bank_account_ownership_viewer($id)
    {
        $employee_to_see_document = employee_application_info_table::find($id); 
        return view('employee_proof_of_bank_account_ownership_viewer', ['employee_to_see_document' => $employee_to_see_document]);
    }

    public function employee_proof_of_experience_viewer($id)
    {
        $employee_to_see_document = employee_application_info_table::find($id); 
        return view('employee_proof_of_experience_viewer', ['employee_to_see_document' => $employee_to_see_document]);
    }

    public function confirming_employee_application_from_admin($id){
        $employee_to_confirm = employee_application_info_table::find($id);

        $employee_confirmation_code = Str::random(30);

        $this->sendConfirmationCodeEmail($employee_to_confirm->email, $employee_confirmation_code);       

        $employee_to_confirm->is_confirmed = 1;
        $employee_to_confirm->confirmation_code = $employee_confirmation_code;
        $employee_to_confirm->save();

        return redirect()->route('main_admin_dashboard_employee_confirmed_successfully_page');

    }

    private function sendConfirmationCodeEmail($email, $confirmation_code)
    {
        Mail::to($email)->send(new EmployeeConfirmationMail($confirmation_code));
    }


    public function check_mailing(){
        $mailData = [
            'title' => 'Mail From QUICKMART',
            'body' => 'This is the first test email From QUICKMART',
        ];

        Mail::to('anjalipatel3074@gmail.com')->send(new DemoMail($mailData));

        dd("Email Sent Successfully ... !");
    }

    public function main_admin_dashboard_show_all_confirmed_employee_application_page(){
        $all_confirmed_employees = employee_application_info_table::where('is_confirmed', 1)->where('is_joined', 0)->get();
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard_show_all_confirmed_employee_application_page', compact('all_confirmed_employees', 'admin_session'));
    }

    public function confirmed_employee_photo_viewer($id)
    {
        $confirmed_employee_to_see_document = confirmed_employee_application_info_table::find($id); 
        return view('confirmed_employee_photo_viewer', ['confirmed_employee_to_see_document' => $confirmed_employee_to_see_document]);
    }

    public function main_admin_dashboard_employee_confirmed_successfully_page(){
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard_employee_confirmed_successfully_page', compact('admin_session'));
    }

    public function main_admin_dashboard_show_all_joined_employees_page(){
        $all_joined_employees = employee_application_info_table::where('is_confirmed', 1)->where('is_joined', 1)->get();
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard_show_all_joined_employees_page', compact('all_joined_employees', 'admin_session'));
    }
    
    public function main_admin_dashboard_show_all_initial_delivery_team_applications_page(){
        $all_delivery_team_initial_applications = delivery_team_application_info_table::where('is_confirmed_from_employee_first', 0)->where('is_confirmed_from_admin_first', 0)->where('is_confirmed_from_employee_second', 0)->where('is_confirmed_from_admin_second', 0)->get();
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard_show_all_initial_delivery_team_applications_page', compact('all_delivery_team_initial_applications', 'admin_session'));
    }

    public function main_admin_dashboard_nothing_to_show_in_initial_delivery_team_applications(){
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard_nothing_to_show_in_initial_delivery_team_applications', compact('admin_session'));
    }

    public function main_admin_dashboard_show_all_delivery_team_applications_confirmed_by_emp_page(){
        $all_delivery_team_applications_confirmed_by_emp = delivery_team_application_info_table::where('is_confirmed_from_employee_first', 1)->where('is_confirmed_from_admin_first', 0)->where('is_confirmed_from_employee_second', 0)->where('is_confirmed_from_admin_second', 0)->get();
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard_show_all_delivery_team_applications_confirmed_by_emp_page', compact('all_delivery_team_applications_confirmed_by_emp', 'admin_session'));
    }

    public function main_admin_dashboard_nothing_to_show_in_delivery_team_applications_confirmed_by_emp_page(){
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard_nothing_to_show_in_delivery_team_applications_confirmed_by_emp_page', compact('admin_session'));
    }

    public function delivery_team_application_photo_viewer_ADMIN($id)
    {
        $application_to_see_document = delivery_team_application_info_table::find($id); 
        $admin_session = Session::get('admin_session');
        return view('delivery_team_application_photo_viewer_ADMIN', compact('application_to_see_document', 'admin_session'));
    }

    public function confirming_delivery_team_application_from_admin_first_step($id){
        $delivery_team_applicant_to_confirm = delivery_team_application_info_table::find($id);   
        
        $admin_session = Session::get('admin_session');
        $admin_id = $admin_session->id;

        $delivery_team_applicant_to_confirm->is_confirmed_from_admin_first = 1;
        $delivery_team_applicant_to_confirm->admin_id_first = $admin_id;
        $delivery_team_applicant_to_confirm->save();

        return view('main_admin_dashboard_delivery_team_application_first_confirmed_successfully_page');

    }

    public function unconfirming_delivery_team_application_from_admin_first_step($id){
        $delivery_team_applicant_to_unconfirm = delivery_team_application_info_table::find($id);   
       
        $delivery_team_applicant_to_unconfirm->is_confirmed_from_admin_first = 0;
        $delivery_team_applicant_to_unconfirm->admin_id_first = null;
        $delivery_team_applicant_to_unconfirm->save();

        return view('main_admin_dashboard_delivery_team_application_first_unconfirmed_successfully_page');

    }

    public function main_admin_dashboard_show_all_delivery_team_applications_confirmed_by_admin_page(){
        $all_delivery_team_applications_confirmed_by_admin = delivery_team_application_info_table::where('is_confirmed_from_employee_first', 1)->where('is_confirmed_from_admin_first', 1)->where('is_confirmed_from_employee_second', 0)->where('is_confirmed_from_admin_second', 0)->get();
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard_show_all_delivery_team_applications_confirmed_by_admin_page', compact('all_delivery_team_applications_confirmed_by_admin', 'admin_session'));
    }

    public function main_admin_dashboard_nothing_to_show_in_delivery_team_applications_confirmed_by_admin_page(){
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard_nothing_to_show_in_delivery_team_applications_confirmed_by_admin_page', compact('admin_session'));
    }

    public function main_admin_dashboard_show_all_delivery_team_applications_eligible_by_employee_page()
    {
        $all_delivery_team_applications_eligible_by_employee = delivery_team_application_info_table::where('is_confirmed_from_employee_first', 1)->where('is_confirmed_from_admin_first', 1)->where('is_confirmed_from_employee_second', 1)->where('is_confirmed_from_admin_second', 0)->get();
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard_show_all_delivery_team_applications_eligible_by_employee_page', compact('all_delivery_team_applications_eligible_by_employee', 'admin_session'));
    }

    public function main_admin_dashboard_nothing_to_show_in_delivery_team_applications_eligible_by_employee_page(){
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard_nothing_to_show_in_delivery_team_applications_eligible_by_employee_page', compact('admin_session'));
    }

    public function confirming_delivery_team_application_from_admin_second_step($id){
        $delivery_team_applicant_to_confirm = delivery_team_application_info_table::find($id);   
        
        $admin_session = Session::get('admin_session');
        $admin_id = $admin_session->id;

        $delivery_applicant_confirmation_code = Str::random(30);

        $this->sendConfirmationCodeEmailToDeliveryApplicant($delivery_team_applicant_to_confirm->email, $delivery_applicant_confirmation_code);    

        $delivery_team_applicant_to_confirm->is_confirmed_from_admin_second = 1;
        $delivery_team_applicant_to_confirm->admin_id_second = $admin_id;
        $delivery_team_applicant_to_confirm->confirmation_code = $delivery_applicant_confirmation_code;
        $delivery_team_applicant_to_confirm->save();

        return view('main_admin_dashboard_delivery_team_application_second_confirmed_successfully_page');

    }


    private function sendConfirmationCodeEmailToDeliveryApplicant($email, $confirmation_code)
    {
        Mail::to($email)->send(new DeliveryApplicantConfirmationMail($confirmation_code));
    }

    public function main_admin_dashboard_show_all_delivery_team_applications_eligible_by_admin_page()
    {
        $all_delivery_team_applications_eligible_by_admin = delivery_team_application_info_table::where('is_confirmed_from_employee_first', 1)->where('is_confirmed_from_admin_first', 1)->where('is_confirmed_from_employee_second', 1)->where('is_confirmed_from_admin_second', 1)->where('is_joined', 0)->get();
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard_show_all_delivery_team_applications_eligible_by_admin_page', compact('all_delivery_team_applications_eligible_by_admin', 'admin_session'));
    }

    public function main_admin_dashboard_nothing_to_show_in_delivery_team_applications_eligible_by_admin_page(){
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard_nothing_to_show_in_delivery_team_applications_eligible_by_admin_page', compact('admin_session'));
    }

    public function main_admin_dashboard_nothing_to_show_in_delivery_team_page_admin_page(){
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard_nothing_to_show_in_delivery_team_page_admin_page', compact('admin_session'));
    }

    public function unconfirming_delivery_team_application_from_admin_second_step($id){
        $delivery_team_applicant_to_unconfirm = delivery_team_application_info_table::find($id);   
        
        $admin_session = Session::get('admin_session');
        $admin_id = $admin_session->id;

        $this->sendUnConfirmationCodeEmailToDeliveryApplicant($delivery_team_applicant_to_unconfirm->email);    

        $delivery_team_applicant_to_unconfirm->is_confirmed_from_admin_second = 0;
        $delivery_team_applicant_to_unconfirm->admin_id_second = null;
        $delivery_team_applicant_to_unconfirm->confirmation_code = null;
        $delivery_team_applicant_to_unconfirm->save();

        return view('main_admin_dashboard_delivery_team_application_second_unconfirmed_successfully_page');

    }

    private function sendUnConfirmationCodeEmailToDeliveryApplicant($email)
    {
        Mail::to($email)->send(new DeliveryApplicantCancelConfirmationMail());
    }

    public function unconfirming_employee_application_from_admin($id){
        $employee_to_unconfirm = employee_application_info_table::find($id);   
        
        $admin_session = Session::get('admin_session');
        $admin_id = $admin_session->id;

        $this->sendUnConfirmationCodeEmailToEmployee($employee_to_unconfirm->email);    

        $employee_to_unconfirm->is_confirmed = 0;
        $employee_to_unconfirm->confirmation_code = null;
        $employee_to_unconfirm->save();

        return view('main_admin_dashboard_employee_application_unconfirmed_successfully_page');

    }

    private function sendUnConfirmationCodeEmailToEmployee($email)
    {
        Mail::to($email)->send(new EmployeeApplicantCancelConfirmationMail());
    }

    public function main_admin_dashboard_show_current_delivery_team_page()
    {
        $all_members_of_current_delivery_team = delivery_team_application_info_table::where('is_confirmed_from_employee_first', 1)->where('is_confirmed_from_admin_first', 1)->where('is_confirmed_from_employee_second', 1)->where('is_confirmed_from_admin_second', 1)->where('is_joined', 1)->get();
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard_show_current_delivery_team_page', compact('all_members_of_current_delivery_team', 'admin_session'));
    }

    public function main_admin_dashboard_show_delivery_team_page()
    {
        $all_members_of_current_delivery_team = delivery_team_application_info_table::where('is_confirmed_from_employee_first', 1)->where('is_confirmed_from_admin_first', 1)->where('is_confirmed_from_employee_second', 1)->where('is_confirmed_from_admin_second', 1)->where('is_joined', 1)->get();
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard_show_delivery_team_page', compact('all_members_of_current_delivery_team', 'admin_session'));
    }

    public function main_admin_dashboard_nothing_to_show_in_current_delivery_team_page(){
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard_nothing_to_show_in_current_delivery_team_page', compact('admin_session'));
    }

    public function deleting_delivery_team_member_record_from_admin($id){
        echo "Hello From deleting_delivery_team_member_record_from_admin dashboard...";
        $delivery_team_member_to_delete = delivery_team_application_info_table::find($id);
        $delivery_team_member_to_delete->delete();
        return view('main_admin_dashboard_delivery_team_member_record_deleted_successfully_page');
    }
}
