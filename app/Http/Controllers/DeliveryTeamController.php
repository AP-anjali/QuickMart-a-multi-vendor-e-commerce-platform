<?php

namespace App\Http\Controllers;
use App\Models\delivery_team_application_info_table;
use App\Models\delivery_team_member_otp_table;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\delivery_team_members_feedbacks_table;

class DeliveryTeamController extends Controller
{
    public function delivery_team_info_page(){
        $allDeliveryTeamMembersFeedbacks = delivery_team_members_feedbacks_table::with('delivery_team_member')->get();
        return view('delivery_team_info_page', compact('allDeliveryTeamMembersFeedbacks'));
    }

    public function delivery_team_first_window(){
        $allDeliveryTeamMembersFeedbacks = delivery_team_members_feedbacks_table::with('delivery_team_member')->get();
        return view('delivery_team_first_window', compact('allDeliveryTeamMembersFeedbacks'));
    }

    public function delivery_team_application_page(){
        return view('delivery_team_application_page');
    }

    public function delivery_team_application_form_submission_route(Request $request)
    {
        $data['tc'] = $request->has('tc');

        $request->merge($data);


        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:delivery_team_application_info,email',
                'phone_no' => 'required|string|max:20|unique:delivery_team_application_info,phone_no',
                'address' => 'required|string|max:255',
                'gender' => 'required|string|in:Male,Female',
                'date_of_birth' => 'required|date',
                'photo' => 'required|file|mimes:jpeg,png,jpg',
                'Aadharcard' => 'required|file|mimes:pdf',

                'vehicle_rc_book' => 'required|file|mimes:pdf',
                'vehicle_puc' => 'required|file|mimes:pdf',
                'vehicle_licence' => 'required|file|mimes:pdf',
                'vehicle_insurance' => 'required|file|mimes:pdf',


                'bank_name' => 'required|string|max:255',
                'bank_branch' => 'required|string|max:255',
                'bank_ifsc_code' => 'required|string|max:20',
                'bank_micr_code' => 'required|string|max:20',
                'account_holder_name' => 'required|string|max:255',
                'account_number' => 'required|string|max:50|unique:delivery_team_application_info,account_number',
                'account_type' => 'required|string|in:Savings Account,Checking Account,Certificate of Deposit Account,Money Market Account',
                'proof_of_bank_account_ownership' => 'required|file|mimes:pdf',

                'experience_job' => 'nullable|string|max:255',
                'experience_job_workplace' => 'nullable|string|max:255',
                'experience_job_duration' => 'nullable|string|max:255',
                'proof_of_experience' => 'nullable|file|mimes:pdf',
                'experience_description' => 'nullable|string',
                'tc' => 'required|boolean',
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

        $photoPath = $request->file('photo')->store('delivery_team_application_photos', 'public'); 
        $aadharcardPath = $request->file('Aadharcard')->store('delivery_team_aadharcards', 'public'); 

        $vehicle_rc_book_Path = $request->file('vehicle_rc_book')->store('delivery_team_application_vehicle_rc_book_document', 'public'); 
        $vehicle_puc_Path = $request->file('vehicle_puc')->store('delivery_team_application_vehicle_puc_document', 'public'); 
        $vehicle_licence_Path = $request->file('vehicle_licence')->store('delivery_team_application_vehicle_licence_document', 'public'); 
        $vehicle_insurance_Path = $request->file('vehicle_insurance')->store('delivery_team_application_vehicle_insurance_document', 'public'); 


        $proofBankPath = $request->file('proof_of_bank_account_ownership')->store('delivery_team_application_proof_of_bank_account_ownership', 'public'); 

        $proofExperiencePath = null;
        if ($request->hasFile('proof_of_experience')) {
            $proofExperiencePath = $request->file('proof_of_experience')->store('delivery_team_application_proof_of_experience', 'public');
        }

        $application = delivery_team_application_info_table::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone_no' => $validatedData['phone_no'],
            'address' => $validatedData['address'],
            'gender' => $validatedData['gender'],
            'date_of_birth' => $validatedData['date_of_birth'],
            'Aadharcard' => $aadharcardPath,
            
            'vehicle_rc_book' => $vehicle_rc_book_Path,
            'vehicle_puc' => $vehicle_puc_Path,
            'vehicle_licence' => $vehicle_licence_Path,
            'vehicle_insurance' => $vehicle_insurance_Path,

            'bank_name' => $validatedData['bank_name'],
            'bank_branch' => $validatedData['bank_branch'],
            'bank_ifsc_code' => $validatedData['bank_ifsc_code'],
            'bank_micr_code' => $validatedData['bank_micr_code'],
            'account_holder_name' => $validatedData['account_holder_name'],
            'account_number' => $validatedData['account_number'],
            'account_type' => $validatedData['account_type'],
            'experience_job' => $validatedData['experience_job'],
            'experience_job_workplace' => $validatedData['experience_job_workplace'],
            'experience_job_duration' => $validatedData['experience_job_duration'],
            'experience_description' => $validatedData['experience_description'],
            'tc' => $validatedData['tc'] ? true : false,
            'photo' => $photoPath,
            'proof_of_bank_account_ownership' => $proofBankPath,
            'proof_of_experience' => $proofExperiencePath,
        ]);

        if ($application) {
            // echo "data inserted successfully.....!";
            return redirect()->route('delivery_team_application_submitted_page');
        } else {
            echo "Error occured in data insertion";
        }

    }

    public function delivery_team_application_submitted_page()
    {
        return view('delivery_team_application_submitted_page');
    }

    public function confirmed_delivery_applicant_account_creation_first_page(){
        return view('confirmed_delivery_applicant_account_creation_first_page');
    }

    public function delivery_applicant_account_creation_first_step_submission_route(Request $request){
        try {
            $request->validate([
                'phone_no' => 'required',
                'email' => 'required|email',
                'account_number' => 'required',
                'confirmation_code' => 'required',
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

        $deliveryApplicantRecord = delivery_team_application_info_table::where([
            'phone_no' => $request->input('phone_no'),
            'email' => $request->input('email'),
            'account_number' => $request->input('account_number'),
        ])->first();

        if ($deliveryApplicantRecord) {
            if ($deliveryApplicantRecord->confirmation_code === $request->input('confirmation_code')) {
                $delivery_applicant_id = $deliveryApplicantRecord->id;
                return redirect()->route('confirmed_delivery_applicant_account_creation_second_page', ['delivery_applicant_id' => $delivery_applicant_id]);
            } else {
                echo '<script>alert("Confirmation Code is Incorrect, Please Try Again...");</script>';
            }
        } else {
            echo '<script>alert("Delivery Applicant Application Not Found With Provided Information...\n Please Try Again ...");</script>';
        }

    }

    public function confirmed_delivery_applicant_account_creation_second_page($delivery_applicant_id){
        return view('confirmed_delivery_applicant_account_creation_second_page', compact('delivery_applicant_id'));
    }

    public function delivery_applicant_account_creation_second_step_submission_route(Request $request, $delivery_applicant_id){
        try {
            $request->validate([
                'username' => 'required|unique:delivery_team_application_info,username',
                'password' => 'required|min:6',
                'confirm_password' => 'required|same:password',
            ]);

            $deliveryApplicantRecord = delivery_team_application_info_table::find($delivery_applicant_id);

            if ($deliveryApplicantRecord) {
                if ($deliveryApplicantRecord->is_joined == 0 &&
                    is_null($deliveryApplicantRecord->username) &&
                    is_null($deliveryApplicantRecord->password) &&
                    is_null($deliveryApplicantRecord->confirm_password)) {
    
                    $deliveryApplicantRecord->is_joined = 1;
                    $deliveryApplicantRecord->username = $request->input('username');
                    $deliveryApplicantRecord->password = bcrypt($request->input('password'));
                    $deliveryApplicantRecord->confirm_password = $request->input('confirm_password');
    
                    $deliveryApplicantRecord->save();
    
                    // echo "username and password created successfully...!";
                    return redirect()->route('delivery_applicant_username_password_created_successfully_page');
                }else {
                    // echo "Username and password created before this instance, Do not try again on same account !";
                    echo '<script>alert("Username and password created before this instance, Do not try again on same account !");</script>';
                }
            } else {
                // echo "Somthing is wrong, Delivery Applicant Application not found on current information";
                echo '<script>alert("Somthing is wrong, Delivery Applicant Application not found on current information");</script>';
            }
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errorMessages = $e->validator->getMessageBag()->all();
    
            echo '<script>';
            foreach ($errorMessages as $errorMessage) {
                echo 'alert("' . $errorMessage . '");';
            }
            echo '</script>';

            
            return;
        }
    }

    public function delivery_applicant_username_password_created_successfully_page(){
        return view('delivery_applicant_username_password_created_successfully_page');
    }

    public function delivery_team_member_login_page_first_step(){
        return view('delivery_team_member_login_page_first_step');
    }

    public function delivery_team_member_login_form_phone_no_submission_route(Request $request){
        // echo "Hello from delivery_team_member_login_form_phone_no_submission_route function";

        try {
            $validatedData = $request->validate([
                'phone_no' => 'required|exists:delivery_team_application_info,phone_no|regex:/^\+\d{1,3}(\s?\d+)+$/',
            ],
            [
                'phone_no.required' => 'Please provide a phone number.',
                'phone_no.regex' => 'Please enter a valid phone number with a country code.',
                'phone_no.exists' => 'The provided phone number is not registered, or Unauthenticated User',
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
        $user = delivery_team_application_info_table::where('phone_no', $request->phone_no)->first();
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
            return redirect()->route('delivery_team_member_otp_verification',['d_id'=>$userOtp->d_id])->with('otp_sent', true);
        }else{
            echo "<br>Mobile no is invalid...";
        }
    }

    public function generateOTPS(Request $request, $phone_no)
    {
        $user = delivery_team_application_info_table::where('phone_no', $request->phone_no)->first();
        $userOtp = delivery_team_member_otp_table::where('d_id',$user->id)->latest('created_at')->first();

        $now = now();

        if($userOtp && $now->isBefore($userOtp->otp_expires_at))
        {
            return $userOtp;
        }

        return delivery_team_member_otp_table::updateOrCreate(['d_id'=>$user->id],[
            'd_id' => $user->id,
            'otp' => rand(100000, 999999),
            'otp_expires_at' => $now->addMinutes(5)
        ]);
    }

    public function delivery_team_member_otp_verification($d_id)
    {
        return view('delivery_team_member_login_page_first_step',compact('d_id'));
    }

    public function delivery_team_member_login_otp_verification_route(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'otp' => 'required|digits:6',
            ],
            [
                'otp.required' => 'Please provide the OTP.',
                'otp.digits' => 'The OTP must be a 6-digit number.',
            ]);

            $userOtp = delivery_team_member_otp_table::where('d_id', $request->d_id)->where('otp', $request->otp)->first();

            $now = now();

            if(!$userOtp)
            {
                return "<br><h1>OTP is incorrect...</h1>";
            }
            else if($userOtp && $now->isAfter($userOtp->otp_expires_at))
            {
                return "<br><h1>This OTP has been expired please request new OTP...</h1>";
            }

            $user = delivery_team_application_info_table::whereId($request->d_id)->first();

            if($user)
            {
                $userOtp->update([
                    'otp_expires_at' => now()
                ]);
                echo "<br><h1>OTP CORRECT...</h1>";
                Session::forget('phone_no');
                return redirect()->route('delivery_team_member_login_page_second_step', ['id' => $user->id]);
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

    public function delivery_team_member_login_page_second_step($id){
        $delivery_team_member = delivery_team_application_info_table::find($id);
        return view('delivery_team_member_login_page_second_step', ['delivery_team_member' => $delivery_team_member]);
    }

    public function delivery_team_member_login_form_un_ps_submission_route(Request $request, $id){

        try {
            // Validate the form data
            $validatedData = $request->validate([
                'username' => 'required',
                'password' => 'required',
            ], [
                'username.required' => 'Please provide your username.',
                'password.required' => 'Please provide your password.',
            ]);
    
            $delivery_team_member = delivery_team_application_info_table::find($id);
    
            if (!$delivery_team_member) {
                return "<br><h1>Delivery Team Member not found...</h1>";
            }

            if ($request->username == $delivery_team_member->username) {
                if (Hash::check($request->password, $delivery_team_member->password)) {
                    // echo "Username and password match.";
                    Session::put('delivery_team_member_session', $delivery_team_member);
                    return redirect('/');
                } else {
                    // echo "Incorrect password.";
                    echo '<h2 style="color: red; margin:0 0 0 50px;">'. "<br><br>Error Occured :" . '</h2>' . '<center>' . '<h1>'. "<br>Incorrect password" . '<br>' . '</h1>' . '</center>'; 
                }
            } else {
                echo '<h2 style="color: red; margin:0 0 0 50px;">'. "<br><br>Error Occured :" . '</h2>' . '<center>' . '<h1>'. "<br>Invalid username" . '<br>' . '</h1>' . '</center>'; 
                // echo "Invalid username.";
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errorMessages = $e->validator->getMessageBag()->all();
            echo '<br><h2 style="color: red;">Login failed due to the following errors :</h2><br>';
            foreach ($errorMessages as $errorMessage) {
                echo '<center>' . '<h1>'. $errorMessage . '<br>' . '</h1>' . '</center>';
            }
            return;
        }
    }

    public function delivery_team_member_logout(){
        if(Session::has('delivery_team_member_session')){
            Session::pull('delivery_team_member_session');
            // dd(session('delivery_team_member_session'));
            return redirect('/');
        }
    }

    //delivery team member feedbacks
    public function delivery_team_member_feedback_page(){
        $delivery_team_member_session = Session::get('delivery_team_member_session');
        return view('delivery_team_member_feedback_page', compact('delivery_team_member_session'));
    }

    public function delivery_team_member_feedback_form_submission(Request $request, $delivery_team_member_id)
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'feedback' => 'required|string|max:255',
        ]);

        $feedback = delivery_team_members_feedbacks_table::create([
            'd_id' => $delivery_team_member_id,
            'rating' => $request->rating,
            'feedback' => $request->feedback,
        ]);

        return view('delivery_team_member_feedback_submitted_page');

    }
}
