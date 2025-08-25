<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customers_table;
use App\Models\sellers_table;
use App\Models\User;
use App\Models\UserOtp;
use App\Models\SellerUnPs;
use App\Models\SellerOtp;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    function customer_reg_log(){
        Session::forget('phone_no');
        return view('customer_reg_log');
    }

    function profile(){
        $user = Auth::user();
        return view('user_profile', ['user' => $user]);
    }

    public function employee_confirmation_mail_inside_link_page(){
        return view('employee_confirmation_mail_inside_link_page');
    }
    
    function Datainsert(Request $request){
        // echo "Hello from datainsert function";
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
                'phone_no' => 'required|unique:customers,phone_no|regex:/^\+(\d{1,3})?\s?\d{10}$/',
                'address' => 'required|string|min:20',
            ],
            [
                'name.required' => 'Please enter your name.',
                'name.alpha' => 'Your name should only contain alphabetical characters.',
                'phone_no.required' => 'Please provide a phone number.',
                'phone_no.unique' => 'This phone number is already in use.',
                'phone_no.regex' => 'Please enter a valid phone number with a country code.',
                'address.required' => 'Please enter your address.',
                'address.string' => 'Your address should be a string.',
                'address.min' => 'Your address should be at least 26 characters long.',
                // Other custom error messages for your form fields.
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errorMessages = $e->validator->getMessageBag()->all();
    
            // Echo the error messages
            echo '<br><h2 style="color: red;">You cannot register due to following errors :</h2><br>';
            foreach ($errorMessages as $errorMessage) {
                echo '<center>' . '<h1>'. $errorMessage . '<br>' . '</h1>' . '</center>';
            }
    
            // Handle other logic or return a response as needed
            return;
        }

        $name = $request->input('name');
        $phone_no = $request->input('phone_no');
        $address = $request->input('address');

        $isinsertsuccessfull = customers_table::insert(['name'=>$name, 'phone_no'=>$phone_no, 'address'=>$address]);

        if($isinsertsuccessfull)
        {
            // echo '<h1>Account created successfully...</h1>';
            // $usertype = Auth::user()->usertype;
            return redirect()->route('customer_dashboard');
        } 
        else
        {
            echo '<h1>Failed to create account</h1>';
        } 

    }

    function datainsertseller(Request $request){
        // echo "hello from datainsertseller";
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
                'phone_no' => 'required|unique:sellers,phone_no|regex:/^\+(\d{1,3})?\s?\d{10}$/',
                'address' => 'required|string|min:20',
            ],
            [
                'name.required' => 'Please enter your name.',
                'name.alpha' => 'Your name should only contain alphabetical characters.',
                'phone_no.required' => 'Please provide a phone number.',
                'phone_no.unique' => 'This phone number is already in use.',
                'phone_no.regex' => 'Please enter a valid phone number with a country code.',
                'address.required' => 'Please enter your address.',
                'address.string' => 'Your address should be a string.',
                'address.min' => 'Your address should be at least 26 characters long.',
                // Other custom error messages for your form fields.
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errorMessages = $e->validator->getMessageBag()->all();
    
            // Echo the error messages
            echo '<br><h2 style="color: red;">You cannot register due to following errors :</h2><br>';
            foreach ($errorMessages as $errorMessage) {
                echo '<center>' . '<h1>'. $errorMessage . '<br>' . '</h1>' . '</center>';
            }
    
            // Handle other logic or return a response as needed
            return;
        }

        $name = $request->input('name');
        $phone_no = $request->input('phone_no');
        $address = $request->input('address');

        $isinsertsuccessfull = sellers_table::insert(['name'=>$name, 'phone_no'=>$phone_no, 'address'=>$address]);

        if($isinsertsuccessfull)
        {
            $sellerId = sellers_table::where('phone_no', $phone_no)->value('id');
            return redirect()->route('seller_un_ps', ['id' => $sellerId]);
        }  
        else
        {
            echo '<h1>Failed to create account</h1>';
        } 
    }

    function seller_un_ps($id){
        return view('seller_un_ps', ['id' => $id]);
    }

    function sellerUnPs(Request $request, $id){
        // echo "Hello from sellerUnPs function";
        try {
            $validatedData = $request->validate([
                'username' => 'required|unique:seller_un_ps,username',
                'password' => 'required|min:8|max:12',
                'confirm_password' => 'required|min:8|max:12|same:password',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errorMessages = $e->validator->getMessageBag()->all();
    
            echo '<br><h2 style="color: red;">You cannot register due to following errors :</h2><br>';
            foreach ($errorMessages as $errorMessage) {
                echo '<center>' . '<h1>'. $errorMessage . '<br>' . '</h1>' . '</center>';
            }
    
            return;
        }

        // $id = $request->input('s_id');
        $username = $request->input('username');
        $password = $request->input('password');
        $confirm_password = $request->input('confirm_password');

        $hashedPassword = Hash::make($request->input('password'));

        $isinsertsuccessfull = SellerUnPs::insert(['s_id' => $id, 'username'=>$username, 'password'=>$hashedPassword, 'confirm_password'=>$confirm_password]);

            if($isinsertsuccessfull)
            {
                // echo '<h1>Username and password created successfully...</h1>';
                return redirect()->route('seller_dashboard');
            } 
            else
            {
                echo '<h1>Failed to create username and password</h1>';
            } 

    }

    function Loginuser(Request $request){
        echo "Hello from Loginuser function";

        try {
            $validatedData = $request->validate([
                'otp' => 'required|digits:6',
            ],
            [
                'otp.required' => 'Please provide the OTP.',
                'otp.digits' => 'The OTP must be a 6-digit number.',
            ]);
        
        

            $userOtp = UserOtp::where('c_id', $request->c_id)->where('otp', $request->otp)->first();

            $now = now();

            if(!$userOtp)
            {
                return "<br><h1>OTP is incorrect...</h1>";
            }
            else if($userOtp && $now->isAfter($userOtp->otp_expires_at))
            {
                return "<br><h1>This OTP has been expired please request new OTP...</h1>";
            }

            $user = customers_table::whereId($request->c_id)->first();

            if($user)
            {
                $userOtp->update([
                    'otp_expires_at' => now()
                ]);
                // Auth::login($user);
                Session::put('old_customer_session', $user);
                Session::forget('phone_no');
                if($user->usertype == '1')
                {
                    return redirect()->route('admin_verify_un_ps');
                }
                else
                {
                    return redirect()->route('customer_dashboard');
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

    function loginuserseller(Request $request){
        echo "Hello from loginuserseller function";

        try {
            $validatedData = $request->validate([
                'otp' => 'required|digits:6',
            ],
            [
                'otp.required' => 'Please provide the OTP.',
                'otp.digits' => 'The OTP must be a 6-digit number.',
            ]);
        
        

            $userOtp = SellerOtp::where('s_id', $request->s_id)->where('otp', $request->otp)->first();

            $now = now();

            if(!$userOtp)
            {
                return "<br><h1>OTP is incorrect...</h1>";
            }
            else if($userOtp && $now->isAfter($userOtp->otp_expires_at))
            {
                return "<br><h1>This OTP has been expired please request new OTP...</h1>";
            }

            $user = sellers_table::whereId($request->s_id)->first();

            if($user)
            {
                $userOtp->update([
                    'otp_expires_at' => now()
                ]);
                // Auth::login($user);
                Session::put('old_seller_session', $user);
                Session::forget('phone_no');
                return redirect()->route('seller_un_ps_verify');
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

    public function generate(Request $request)
    {
        echo "Hello from generate function";

        try {
            $validatedData = $request->validate([
                'phone_no' => 'required|exists:customers,phone_no|regex:/^\+\d{1,3}(\s?\d+)+$/',
            ],
            [
                'phone_no.required' => 'Please provide a phone number.',
                'phone_no.regex' => 'Please enter a valid phone number with a country code.',
                'phone_no.exists' => 'The provided phone number is not registered.',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errorMessages = $e->validator->getMessageBag()->all();
    
            // Echo the error messages
            echo '<br><h2 style="color: red;">You cannot Login due to following errors :</h2><br>';
            foreach ($errorMessages as $errorMessage) {
                echo '<center>' . '<h1>'. $errorMessage . '<br>' . '</h1>' . '</center>';
            }
    
            // Handle other logic or return a response as needed
            return;
        }

        $phone_no = $request->input('phone_no');
        $user = customers_table::where('phone_no', $request->phone_no)->first();
        if($user)
        {
            echo "<br>Mobile no is valid...";
            $userOtp = $this->generateOTP($request, $request->phone_no);
            $userOtp->sendSMS($request->phone_no);
            echo "<br><h1>OTP HAS BEEN SENT GO BACK AND ENTER OTP AND CONTINUE TO LOGIN...</h1>";
            Session::put('phone_no', $phone_no);

            $now = now();
            session()->flash('otp_sent_at', $now);
            session()->put('otp_sent', true);
            return redirect()->route('verification',['c_id'=>$userOtp->c_id])->with('otp_sent', true);

        }else{
            echo "<br>Mobile no is invalid...";
        }

    }

    public function generateS(Request $request)
    {
        echo "Hello from generateS function";

        try {
            $validatedData = $request->validate([
                'phone_no' => 'required|exists:sellers,phone_no|regex:/^\+\d{1,3}(\s?\d+)+$/',
            ],
            [
                'phone_no.required' => 'Please provide a phone number.',
                'phone_no.regex' => 'Please enter a valid phone number with a country code.',
                'phone_no.exists' => 'The provided phone number is not registered.',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errorMessages = $e->validator->getMessageBag()->all();
    
            // Echo the error messages
            echo '<br><h2 style="color: red;">You cannot Login due to following errors :</h2><br>';
            foreach ($errorMessages as $errorMessage) {
                echo '<center>' . '<h1>'. $errorMessage . '<br>' . '</h1>' . '</center>';
            }
    
            // Handle other logic or return a response as needed
            return;
        }

        $phone_no = $request->input('phone_no');
        $user = sellers_table::where('phone_no', $request->phone_no)->first();
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
            return redirect()->route('verificationS',['s_id'=>$userOtp->s_id])->with('otp_sent', true);

        }else{
            echo "<br>Mobile no is invalid...";
        }

    }

    public function generateOTPS(Request $request, $phone_no)
    {
        $user = sellers_table::where('phone_no', $request->phone_no)->first();
        $userOtp = SellerOtp::where('s_id',$user->id)->latest('created_at')->first();

        $now = now();

        if($userOtp && $now->isBefore($userOtp->otp_expires_at))
        {
            return $userOtp;
        }

        return SellerOtp::updateOrCreate(['s_id'=>$user->id],[
            's_id' => $user->id,
            'otp' => rand(100000, 999999),
            'otp_expires_at' => $now->addMinutes(1)
        ]);
    }

    public function generateOTP(Request $request, $phone_no)
    {
        $user = customers_table::where('phone_no', $request->phone_no)->first();
        $userOtp = UserOtp::where('c_id',$user->id)->latest('created_at')->first();

        $now = now();

        if($userOtp && $now->isBefore($userOtp->otp_expires_at))
        {
            return $userOtp;
        }

        return UserOtp::updateOrCreate(['c_id'=>$user->id],[
            'c_id' => $user->id,
            'otp' => rand(100000, 999999),
            'otp_expires_at' => $now->addMinutes(1)
        ]);
    }

    public function verification($c_id)
    {
        return view('customer_reg_log',compact('c_id'));
    }

    public function verificationS($s_id)
    {
        return view('seller_reg_log',compact('s_id'));
    }
    
    public function customer_dashboard()
    {
        // $user = Auth::user();
        $old_customer_session = Session::get('old_customer_session');
        return view('customer_dashboard', ['old_customer_session' => $old_customer_session]);
    }


    public function seller_reg_log()
    {
        return view('seller_reg_log');
    }

    public function seller_un_ps_verify()
    {
        return view('seller_un_ps_verify');
    }

    public function seller_un_ps_verification_method(Request $request)
    {
        echo "hello from seller_un_ps_verification_method";
        $username = $request->input('username');
        $password = $request->input('password');

        $user = SellerUnPs::where('username', $username)->first();
        if ($user) {
            echo "<br>Username is valid...";
    
            if (Hash::check($password, $user->password)){
                echo "<br>Password match...";
                echo "<center><h1>WELCOME TO OUR HOME PAGE</h1></center>";
                return redirect()->route('seller_dashboard');
            } else {
                echo '<h2 style="color: red; margin:0 0 0 50px;">'. "<br><br>Error Occured :" . '</h2>' . '<center>' . '<h1>'. "<br>Incorrect Password" . '<br>' . '</h1>' . '</center>'; 
                // echo "<br>Provided Password: " . $password;
                // echo "<br>Hashed Password from Database: " . $user->password;
            }
        } else {
            echo '<h2 style="color: red; margin:0 0 0 50px;">'. "<br><br>Error Occured :" . '</h2>' . '<center>' . '<h1>'. "<br>Username is invalid..." . '<br>' . '</h1>' . '</center>'; 
        }
    } 

    public function seller_reg_log_info_page()
    {
        return view('seller_reg_log_info_page');
    }

    public function seller_login_page()
    {
        return view('seller_login_page');
    }

    public function seller_registration_page()
    {
        return view('seller_registration_page');
    }

    public function seller_login_username_password_verification_page()
    {
        return view('seller_login_username_password_verification_page');
    }

    public function missing_internet_connection()
    {
        return view('missing_internet_connection');
    }

    public function page_not_found()
    {
        return view('page_not_found');
    }

}
