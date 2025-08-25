<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\delivery_team_application_info_table;
use App\Models\order_information_table;
use App\Models\customers_info_table;
use App\Models\customers_otp_for_delivery_verification_table;
use App\Models\delivery_team_member_email_verification_table;
use App\Mail\DeliveryTeamMemberVerificationMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class MainDeliveryTeamController extends Controller
{
    public function main_delivery_team_member_dashboard()
    {
        $delivery_team_member_session = Session::get('delivery_team_member_session');
        return view('main_delivery_team_member_dashboard', ['delivery_team_member_session' => $delivery_team_member_session]);
    }

    public function delivery_team_member_account($delivery_team_member_id)
    {
        $delivery_team_member_data = delivery_team_application_info_table::find($delivery_team_member_id);
        return view('showing_logged_in_delivery_team_member_account', compact('delivery_team_member_data'));
    }

    public function showing_proof_of_bank_account_ownership_to_delivery_team_member_for_account($delivery_team_member_id)
    {
        $delivery_team_member_to_show_document = delivery_team_application_info_table::find($delivery_team_member_id);
        return view('showing_proof_of_bank_account_ownership_to_delivery_team_member_for_account', compact('delivery_team_member_to_show_document'));
    }

    public function showing_photo_to_delivery_team_member_for_account($delivery_team_member_id)
    {
        $delivery_team_member_to_show_document = delivery_team_application_info_table::find($delivery_team_member_id);
        return view('showing_photo_to_delivery_team_member_for_account', compact('delivery_team_member_to_show_document'));
    }

    public function showing_aadharcard_to_delivery_team_member_for_account($delivery_team_member_id)
    {
        $delivery_team_member_to_show_document = delivery_team_application_info_table::find($delivery_team_member_id);
        return view('showing_aadharcard_to_delivery_team_member_for_account', compact('delivery_team_member_to_show_document'));
    }

    public function showing_rc_book_to_delivery_team_member_for_account($delivery_team_member_id)
    {
        $delivery_team_member_to_show_document = delivery_team_application_info_table::find($delivery_team_member_id);
        return view('showing_rc_book_to_delivery_team_member_for_account', compact('delivery_team_member_to_show_document'));
    }

    public function showing_puc_to_delivery_team_member_for_account($delivery_team_member_id)
    {
        $delivery_team_member_to_show_document = delivery_team_application_info_table::find($delivery_team_member_id);
        return view('showing_puc_to_delivery_team_member_for_account', compact('delivery_team_member_to_show_document'));
    }

    public function showing_licence_to_delivery_team_member_for_account($delivery_team_member_id)
    {
        $delivery_team_member_to_show_document = delivery_team_application_info_table::find($delivery_team_member_id);
        return view('showing_licence_to_delivery_team_member_for_account', compact('delivery_team_member_to_show_document'));
    }

    public function showing_INSURANCE_to_delivery_team_member_for_account($delivery_team_member_id)
    {
        $delivery_team_member_to_show_document = delivery_team_application_info_table::find($delivery_team_member_id);
        return view('showing_INSURANCE_to_delivery_team_member_for_account', compact('delivery_team_member_to_show_document'));
    }

    public function sending_email_for_verify_delivery_team_member_user($delivery_team_member_id)
    {
        $delivery_team_member_to_sent_an_email = delivery_team_application_info_table::find($delivery_team_member_id);

        $userVerificationCode = delivery_team_member_email_verification_table::where('d_id',$delivery_team_member_to_sent_an_email->id)->latest('varification_code_created_at')->first();

        $now = now();

        if($userVerificationCode && $now->isBefore($userVerificationCode->varification_code_expires_at))
        {
            $verification_code = $userVerificationCode->varification_code;
        }
        else
        {
            $verification_code = Str::random(26);
        }

        $this->sendVerificationCodeEmailToDeliveryTeamMember($delivery_team_member_to_sent_an_email->email, $verification_code);
        
        delivery_team_member_email_verification_table::updateOrCreate(['d_id'=>$delivery_team_member_to_sent_an_email->id],[
            'd_id' => $delivery_team_member_to_sent_an_email->id,
            'varification_code' => $verification_code,
            'varification_code_expires_at' => $now->addMinutes(10)
        ]);

        Session::put('mail_has_been_sent_to_user', true);

        return redirect()->back();
    }

    private function sendVerificationCodeEmailToDeliveryTeamMember($email, $verification_code)
    {
        Mail::to($email)->send(new DeliveryTeamMemberVerificationMail($verification_code));
    }

    public function verifying_delivery_team_member_email_verification_code_form_submission($delivery_team_member_id, Request $request)
    {
        try {
            $validatedData = $request->validate([
                'varification_code' => 'required',
            ],
            [
                'varification_code.required' => 'Please provide the varification code',
            ]);

            $verification_code = delivery_team_member_email_verification_table::where('d_id', $delivery_team_member_id)->where('varification_code', $request->varification_code)->first();

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

            $user = delivery_team_application_info_table::whereId($delivery_team_member_id)->first();

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

    public function deleting_delivery_team_member_account_from_delivery_team_member($id){
        $delivery_team_member_to_delete = delivery_team_application_info_table::find($id);
        $delivery_team_member_to_delete->delete();
        Session::forget('delivery_team_member_session');
        return redirect('/');
    }

    public function updating_delivery_team_member_user_record_from_delivery_team_member_page_form_submission(Request $request, $id){
        $delivery_team_member_record_to_update = delivery_team_application_info_table::find($id);

        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:delivery_team_application_info,email,' . $id,
                'phone_no' => 'required|string|unique:delivery_team_application_info,phone_no,' . $id,
                'address' => 'required|string',
                'gender' => 'required|string',
                'date_of_birth' => 'required|date',

                'photo' => 'nullable|file|mimes:jpeg,png,jpg',
                'Aadharcard' => 'nullable|file|mimes:pdf',
                'vehicle_rc_book' => 'nullable|file|mimes:pdf',
                'vehicle_puc' => 'nullable|file|mimes:pdf',
                'vehicle_licence' => 'nullable|file|mimes:pdf',
                'vehicle_insurance' => 'nullable|file|mimes:pdf',

                'username' => 'required|string|unique:delivery_team_application_info,username,' . $id,
                'password' => 'nullable|string',
                'confirm_password' => 'required|string',
                'profile_pic' => 'image|mimes:jpeg,png,jpg',
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

        $delivery_team_member_record_to_update->name = $request->input('name');
        $delivery_team_member_record_to_update->email = $request->input('email');
        $delivery_team_member_record_to_update->phone_no = $request->input('phone_no');
        $delivery_team_member_record_to_update->address = $request->input('address');
        $delivery_team_member_record_to_update->gender = $request->input('gender');
        $delivery_team_member_record_to_update->date_of_birth = $request->input('date_of_birth');
        $delivery_team_member_record_to_update->username = $request->input('username');
        
        if ($request->filled('confirm_password')) {
            $delivery_team_member_record_to_update->password = bcrypt($request->input('confirm_password'));
            $delivery_team_member_record_to_update->confirm_password = $request->input('confirm_password'); 
        }

        if ($request->hasFile('profile_pic')) {
            $fileNameWithExt = $request->file('profile_pic')->getClientOriginalName();
            
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            
            $extension = $request->file('profile_pic')->getClientOriginalExtension();
            
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
    
            $path = $request->file('profile_pic')->storeAs('public/img', $fileNameToStore);
    
            $delivery_team_member_record_to_update->profile_pic = 'img/'.$fileNameToStore;
        }

        $delivery_team_member_record_to_update->bank_name = $request->input('bank_name');
        $delivery_team_member_record_to_update->bank_branch = $request->input('bank_branch');
        $delivery_team_member_record_to_update->bank_ifsc_code = $request->input('bank_ifsc_code');
        $delivery_team_member_record_to_update->bank_micr_code = $request->input('bank_micr_code');
        $delivery_team_member_record_to_update->account_holder_name = $request->input('account_holder_name');
        $delivery_team_member_record_to_update->account_number = $request->input('account_number');
        $delivery_team_member_record_to_update->account_type = $request->input('account_type');

        if ($request->hasFile('proof_of_bank_account_ownership')) {
            Storage::delete($delivery_team_member_record_to_update->proof_of_bank_account_ownership);
    
            $proofOfOwnership = $request->file('proof_of_bank_account_ownership');
            $proofPath = $proofOfOwnership->store('delivery_team_application_proof_of_bank_account_ownership', 'public');
            $delivery_team_member_record_to_update->proof_of_bank_account_ownership = $proofPath;
        }

        if ($request->hasFile('photo')) {
            Storage::delete($delivery_team_member_record_to_update->photo);
    
            $photo = $request->file('photo');
            $photoPath = $photo->store('delivery_team_application_photos', 'public');
            $delivery_team_member_record_to_update->photo = $photoPath;
        }

        if ($request->hasFile('Aadharcard')) {
            Storage::delete($delivery_team_member_record_to_update->Aadharcard);
    
            $Aadharcard = $request->file('Aadharcard');
            $AadharcardPath = $Aadharcard->store('delivery_team_aadharcards', 'public');
            $delivery_team_member_record_to_update->Aadharcard = $AadharcardPath;
        }

        if ($request->hasFile('vehicle_rc_book')) {
            Storage::delete($delivery_team_member_record_to_update->vehicle_rc_book);
    
            $vehicle_rc_book = $request->file('vehicle_rc_book');
            $vehicle_rc_bookPath = $vehicle_rc_book->store('delivery_team_application_vehicle_rc_book_document', 'public');
            $delivery_team_member_record_to_update->vehicle_rc_book = $vehicle_rc_bookPath;
        }

        if ($request->hasFile('vehicle_puc')) {
            Storage::delete($delivery_team_member_record_to_update->vehicle_puc);
    
            $vehicle_puc = $request->file('vehicle_puc');
            $vehicle_pucPath = $vehicle_puc->store('delivery_team_application_vehicle_puc_document', 'public');
            $delivery_team_member_record_to_update->vehicle_puc = $vehicle_pucPath;
        }

        if ($request->hasFile('vehicle_licence')) {
            Storage::delete($delivery_team_member_record_to_update->vehicle_licence);
    
            $vehicle_licence = $request->file('vehicle_licence');
            $vehicle_licencePath = $vehicle_licence->store('delivery_team_application_vehicle_licence_document', 'public');
            $delivery_team_member_record_to_update->vehicle_licence = $vehicle_licencePath;
        }

        if ($request->hasFile('vehicle_insurance')) {
            Storage::delete($delivery_team_member_record_to_update->vehicle_insurance);
    
            $vehicle_insurance = $request->file('vehicle_insurance');
            $vehicle_insurancePath = $vehicle_insurance->store('delivery_team_application_vehicle_insurance_document', 'public');
            $delivery_team_member_record_to_update->vehicle_insurance = $vehicle_insurancePath;
        }

        $delivery_team_member_record_to_update->save();

        Session::forget('delivery_team_member_session');
        Session::put('delivery_team_member_session', $delivery_team_member_record_to_update);

        return redirect()->back()->with('delivery_team_member_record_to_update', 'Account updated successfully !');

    }

    public function main_delivery_team_member_dashboard_show_new_orders_page()
    {
        $delivery_team_member_session = Session::get('delivery_team_member_session');
        $all_new_orders = order_information_table::with('order', 'customer', 'customer_address', 'product', 'seller')->where('is_delivery_allocated', null)->get();

        return view('main_delivery_team_member_dashboard_show_new_orders_page', compact('delivery_team_member_session', 'all_new_orders'));
    }

    public function claim_delivery_from_delivery_team_member($id)
    {
        $order_to_claim_for_delivery = order_information_table::find($id);

        $delivery_team_member_session = Session::get('delivery_team_member_session');
        $delivery_team_member_id = $delivery_team_member_session->id;

        $currentDateTime = Carbon::now();
        $currentDateTime->setTimezone('Asia/Kolkata');
        $formattedDateTime = $currentDateTime->format('d/m/y h:i:s A');

        $order_to_claim_for_delivery->is_delivery_allocated = 1;
        $order_to_claim_for_delivery->id_of_delivery_team_member = $delivery_team_member_id;
        $order_to_claim_for_delivery->delivery_allocated_date = $formattedDateTime;

        $order_to_claim_for_delivery->save();

        return redirect()->back()->with('delivery_claimed', 'Delivery Claimed !');

    }

    public function cancel_delivery_from_delivery_team_member($id)
    {
        $order_to_cancel_delivery = order_information_table::find($id);

        $delivery_team_member_session = Session::get('delivery_team_member_session');

        $order_to_cancel_delivery->is_delivery_allocated = null;
        $order_to_cancel_delivery->id_of_delivery_team_member = null;
        $order_to_cancel_delivery->delivery_allocated_date = null;

        $order_to_cancel_delivery->save();

        return redirect()->back()->with('delivery_acceptance_cancelled', 'Delivery Acceptance Cancelled !');

    }

    public function main_delivery_team_member_dashboard_show_pending_orders_page()
    {
        $delivery_team_member_session = Session::get('delivery_team_member_session');
        $all_accepted_orders = order_information_table::with('order', 'customer', 'customer_address', 'product', 'seller')->where('id_of_delivery_team_member', $delivery_team_member_session->id)->where('is_order_shipped', null)->get();

        return view('main_delivery_team_member_dashboard_show_pending_orders_page', compact('delivery_team_member_session', 'all_accepted_orders'));
    }

    public function order_mark_as_shipped_from_delivery_team_member($id)
    {
        $order_to_mark_as_shipped = order_information_table::find($id);

        $currentDateTime = Carbon::now();
        $currentDateTime->setTimezone('Asia/Kolkata');
        $formattedDateTime = $currentDateTime->format('d/m/y h:i:s A');

        $order_to_mark_as_shipped->is_order_shipped = 1;
        $order_to_mark_as_shipped->order_shipped_date = $formattedDateTime;

        $order_to_mark_as_shipped->save();

        return redirect()->back()->with('marked_as_shipped', 'Marked As Shipped !');

    }

    public function main_delivery_team_member_dashboard_show_shipped_orders_page()
    {
        $delivery_team_member_session = Session::get('delivery_team_member_session');
        $all_shipped_orders = order_information_table::with('order', 'customer', 'customer_address', 'product', 'seller')->where('id_of_delivery_team_member', $delivery_team_member_session->id)->where('is_order_shipped', 1)->where('is_order_delivered', null)->get();

        return view('main_delivery_team_member_dashboard_show_shipped_orders_page', compact('delivery_team_member_session', 'all_shipped_orders'));
    }

    public function send_otp_to_customer_for_verification($id)
    {
        $customer_order = order_information_table::find($id);

        $customer_phone_number = $customer_order->customer->phone_no;

        $customerOtp = $this->generateOTP($customer_phone_number);
        $customerOtp->sendSMS($customer_phone_number);

        return redirect()->back()->with('verification_otp_sent', true);

    }

    public function generateOTP($customer_phone_number)
    {
        $customer = customers_info_table::where('phone_no', $customer_phone_number)->first();
        $customerOtp = customers_otp_for_delivery_verification_table::where('customer_id',$customer->id)->latest('created_at')->first();

        $now = now();

        if($customerOtp && $now->isBefore($customerOtp->otp_expires_at))
        {
            return $customerOtp;
        }

        return customers_otp_for_delivery_verification_table::updateOrCreate(['customer_id'=>$customer->id],[
            'customer_id' => $customer->id,
            'otp' => rand(100000, 999999),
            'otp_expires_at' => $now->addMinutes(10)
        ]);
    }

    public function verifying_customer_otp_for_delivery_form_submission(Request $request, $customer_id, $order_id)
    {
        try {
            $validatedData = $request->validate([
                'otp' => 'required|digits:6',
            ],
            [
                'otp.required' => 'Please provide the OTP.',
                'otp.digits' => 'The OTP must be a 6-digit number.',
            ]);

            $customerOtp = customers_otp_for_delivery_verification_table::where('customer_id', $customer_id)->where('otp', $request->otp)->first();

            $now = now();

            if(!$customerOtp)
            {
                // echo "<br><h1>OTP is incorrect...</h1>";
                Session::forget('verification_otp_sent');
                return redirect()->back()->with('verification_otp_incorrect', 'Verification OTP Not Match !');
            }
            else if($customerOtp && $now->isAfter($customerOtp->otp_expires_at))
            {
                // echo "<br><h1>This OTP has been expired please request new OTP...</h1>";
                Session::forget('verification_otp_sent');
                return redirect()->back()->with('verification_otp_expires', 'Verification otp has been expired, please request new one !');
            }

            $customer = customers_info_table::whereId($customer_id)->first();

            if($customer)
            {
                $customerOtp->update([
                    'otp_expires_at' => now()
                ]);
                // echo "<br><h1>OTP CORRECT...</h1>";
                Session::forget('verification_otp_sent');

                $delivered_order = order_information_table::find($order_id);

                $currentDateTime = Carbon::now();
                $currentDateTime->setTimezone('Asia/Kolkata');
                $formattedDateTime = $currentDateTime->format('d/m/y h:i:s A');

                $delivered_order->is_order_delivered = 1;
                $delivered_order->order_delivered_date = $formattedDateTime;
                $delivered_order->save();

                return redirect()->back()->with('verification_otp_correct_and_order_marked_as_delivered', 'Marked As Delivered !');
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

    public function main_delivery_team_member_dashboard_show_completed_orders_page()
    {
        $delivery_team_member_session = Session::get('delivery_team_member_session');
        $all_completed_orders = order_information_table::with('order', 'customer', 'customer_address', 'product', 'seller')->where('id_of_delivery_team_member', $delivery_team_member_session->id)->where('is_order_shipped', 1)->where('is_order_delivered', 1)->get();

        return view('main_delivery_team_member_dashboard_show_completed_orders_page', compact('delivery_team_member_session', 'all_completed_orders'));
    }
}
