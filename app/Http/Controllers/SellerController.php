<?php

namespace App\Http\Controllers;
use App\Models\seller_info_table;
use App\Models\seller_otp_table;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\sellers_feedbacks_table;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function sellers_first_window(){
        $allSellerFeedbacks = sellers_feedbacks_table::with('seller')->get();
        return view('sellers_first_window', compact('allSellerFeedbacks'));
    }

    public function seller_registration_form_submission_route(Request $request)
    {
        try{
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:sellers_info',
                'phone_no' => 'required|string|unique:sellers_info',
                'address' => 'required|string',
                'username' => 'required|string|unique:sellers_info',
                'password' => 'required|string',
                'confirm_password' => 'required|string|same:password',
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
                'proof_of_bank_account_ownership' => 'required|file|mimes:pdf,doc,docx',
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

        $proofOfOwnership = $request->file('proof_of_bank_account_ownership');
        $proofPath = $proofOfOwnership->store('proof_of_bank_account_ownership', 'public');

        $seller = seller_info_table::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_no' => $request->input('phone_no'),
            'address' => $request->input('address'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'confirm_password' => $request->input('confirm_password'),
            'business_name' => $request->input('business_name'),
            'business_type' => $request->input('business_type'),
            'business_strength' => $request->input('business_strength'),
            'product_category' => $request->input('product_category'),
            'gst_number' => $request->input('gst_number'),
            'business_description' => $request->input('business_description'),
            'bank_name' => $request->input('bank_name'),
            'bank_branch' => $request->input('bank_branch'),
            'bank_ifsc_code' => $request->input('bank_ifsc_code'),
            'bank_micr_code' => $request->input('bank_micr_code'),
            'account_holder_name' => $request->input('account_holder_name'),
            'account_number' => $request->input('account_number'),
            'account_type' => $request->input('account_type'),
            'proof_of_bank_account_ownership_file_name' => $proofOfOwnership->getClientOriginalName(),
            'proof_of_bank_account_ownership_file_path' => $proofPath,
        ]);

        if ($seller) {
            // echo "data inserted successfully.....!";
            return redirect()->route('seller_login_page');
        } else {
            echo "Error occured in data insertion";
        }
    }

    public function seller_login_form_phone_no_submission_route(Request $request){
        echo "Hello from seller_login_form_phone_no_submission_route function";

        try {
            $validatedData = $request->validate([
                'phone_no' => 'required|exists:sellers_info,phone_no|regex:/^\+\d{1,3}(\s?\d+)+$/',
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
        $user = seller_info_table::where('phone_no', $request->phone_no)->first();
        if($user)
        {
            echo "<br>Mobile no is valid...";
            $userOtp = $this->generateOTPS($request, $request->phone_no);
            $userOtp->sendSMS($request->phone_no);
            echo "<br><h1>OTP HAS BEEN SENT GO BACK AND ENTER OTP AND CONTINUE TO LOGIN...</h1>";
            Session::put('phone_no', $phone_no);

            $now = now();
            session()->flash('otp_sent_at', $now);
            session()->put('otp_sent', true);
            
            Session::put('phone_no', $phone_no);
            session()->flash('otp_sent', true);
            return redirect()->route('seller_otp_verification',['s_id'=>$userOtp->s_id])->with('otp_sent', true);
        }else{
            echo "<br>Mobile no is invalid...";
        }
    }

    public function generateOTPS(Request $request, $phone_no)
    {
        $user = seller_info_table::where('phone_no', $request->phone_no)->first();
        $userOtp = seller_otp_table::where('s_id',$user->id)->latest('created_at')->first();

        $now = now();

        if($userOtp && $now->isBefore($userOtp->otp_expires_at))
        {
            return $userOtp;
        }

        return seller_otp_table::updateOrCreate(['s_id'=>$user->id],[
            's_id' => $user->id,
            'otp' => rand(100000, 999999),
            'otp_expires_at' => $now->addMinutes(5)
        ]);
    }

    public function seller_otp_verification($s_id)
    {
        return view('seller_login_page',compact('s_id'));
    }

    public function seller_login_otp_verification_route(Request $request){
        echo "Hello from loginuserseller function";

        try {
            $validatedData = $request->validate([
                'otp' => 'required|digits:6',
            ],
            [
                'otp.required' => 'Please provide the OTP.',
                'otp.digits' => 'The OTP must be a 6-digit number.',
            ]);

            $userOtp = seller_otp_table::where('s_id', $request->s_id)->where('otp', $request->otp)->first();

            $now = now();

            if(!$userOtp)
            {
                return "<br><h1>OTP is incorrect...</h1>";
            }
            else if($userOtp && $now->isAfter($userOtp->otp_expires_at))
            {
                return "<br><h1>This OTP has been expired please request new OTP...</h1>";
            }

            $user = seller_info_table::whereId($request->s_id)->first();

            if($user)
            {
                $userOtp->update([
                    'otp_expires_at' => now()
                ]);
                echo "<br><h1>OTP CORRECT...</h1>";
                Session::forget('phone_no');
                return redirect()->route('seller_login_username_password_verification_page');
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

    public function seller_login_form_un_ps_submission_route(Request $request){
        echo "hello from seller_login_form_un_ps_submission_route";

        $username = $request->input('username');
        $password = $request->input('password');

        $user = seller_info_table::where('username', $username)->first();
        if ($user) {
            echo "<br>Username is valid...";
    
            if (Hash::check($password, $user->password)){
                echo "<br>Password match...";
                echo "<center><h1>WELCOME TO OUR HOME PAGE</h1></center>";
                Session::put('seller_session', $user);
                // dd(session('seller_session'));
                // return redirect()->route('seller_dashboard');
                return redirect('/');
            } else {
                echo '<h2 style="color: red; margin:0 0 0 50px;">'. "<br><br>Error Occured :" . '</h2>' . '<center>' . '<h1>'. "<br>Incorrect Password" . '<br>' . '</h1>' . '</center>'; 
                // echo "<br>Provided Password: " . $password;
                // echo "<br>Hashed Password from Database: " . $user->password;
            }
        } else {
            echo '<h2 style="color: red; margin:0 0 0 50px;">'. "<br><br>Error Occured :" . '</h2>' . '<center>' . '<h1>'. "<br>Username is invalid..." . '<br>' . '</h1>' . '</center>'; 
        }
    }

    public function seller_dashboard(){
        $seller_session = Session::get('seller_session');
        return view('seller_dashboard', ['seller_session' => $seller_session]);
    }

    public function seller_logout(){
        if(Session::has('seller_session')){
            Session::pull('seller_session');
            // dd(session('seller_session'));
            return redirect('/');
        }
    }

    //seller feedback
    public function sellers_feedback_page(){
        $seller_session = Session::get('seller_session');
        return view('sellers_feedback_page', compact('seller_session'));
    }

    public function sellers_feedback_form_submission(Request $request, $seller_id)
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'feedback' => 'required|string|max:255',
        ]);

        $feedback = sellers_feedbacks_table::create([
            'seller_id' => $seller_id,
            'rating' => $request->rating,
            'feedback' => $request->feedback,
        ]);

        return view('sellers_feedback_submitted_page');

    }
}
