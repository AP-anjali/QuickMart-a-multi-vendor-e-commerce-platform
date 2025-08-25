<?php

namespace App\Http\Controllers;
use App\Models\employee_application_info_table;
use App\Models\employee_otp_table;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\employees_feedbacks_table;

use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function employees_first_window(){
        $allEmployeeFeedbacks = employees_feedbacks_table::with('employee')->get();
        return view('employees_first_window', compact('allEmployeeFeedbacks'));
    }

    public function employee_application_page(){
        return view('employee_application_page');
    }

    public function employee_confirm_account_page(){
        return view('employee_confirm_account_page');
    }

    public function employee_login_page_first_step(){
        return view('employee_login_page_first_step');
    }

    public function employee_application_form_submission_route(Request $request)
    {
        $data['confirmation_of_computer_knowlege'] = $request->has('confirmation_of_computer_knowlege');
        $data['tc'] = $request->has('tc');

        $request->merge($data);


        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:employee_application_info,email',
                'phone_no' => 'required|string|max:20|unique:employee_application_info,phone_no',
                'address' => 'required|string|max:255',
                'gender' => 'required|string|in:Male,Female',
                'date_of_birth' => 'required|date',
                'photo' => 'required|file|mimes:jpeg,png,jpg',
                'Aadharcard' => 'required|file|mimes:pdf',
                'percentage_of_twelve' => 'required|numeric|min:0|max:100',
                'proof_of_percentage_of_twelve' => 'required|file|mimes:pdf',
                'other_educational_details' => 'nullable|string',
                'confirmation_of_computer_knowlege' => 'required|boolean',
                'bank_name' => 'required|string|max:255',
                'bank_branch' => 'required|string|max:255',
                'bank_ifsc_code' => 'required|string|max:20',
                'bank_micr_code' => 'required|string|max:20',
                'account_holder_name' => 'required|string|max:255',
                'account_number' => 'required|string|max:50|unique:employee_application_info,account_number',
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

        $photoPath = $request->file('photo')->store('employee_application_photos', 'public'); 
        $aadharcardPath = $request->file('Aadharcard')->store('employee_application_aadharcards', 'public'); 
        $proofPercentagePath = $request->file('proof_of_percentage_of_twelve')->store('employee_application_marksheet_proof', 'public'); 
        $proofBankPath = $request->file('proof_of_bank_account_ownership')->store('employee_application_proof_of_bank_account_ownership', 'public'); 

        $proofExperiencePath = null;
        if ($request->hasFile('proof_of_experience')) {
            $proofExperiencePath = $request->file('proof_of_experience')->store('employee_application_proof_of_experience', 'public');
        }

        $application = employee_application_info_table::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone_no' => $validatedData['phone_no'],
            'address' => $validatedData['address'],
            'gender' => $validatedData['gender'],
            'date_of_birth' => $validatedData['date_of_birth'],
            'Aadharcard' => $aadharcardPath,
            'percentage_of_twelve' => $validatedData['percentage_of_twelve'],
            'other_educational_details' => $validatedData['other_educational_details'],
            'confirmation_of_computer_knowlege' => $validatedData['confirmation_of_computer_knowlege'] ? true : false,
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
            'proof_of_percentage_of_twelve' => $proofPercentagePath,
            'proof_of_bank_account_ownership' => $proofBankPath,
            'proof_of_experience' => $proofExperiencePath,
        ]);

        if ($application) {
            // echo "data inserted successfully.....!";
            return redirect()->route('employee_application_submitted_page');
        } else {
            echo "Error occured in data insertion";
        }

    }

    public function employee_application_submitted_page(){
        return view('employee_application_submitted_page');
    }

    public function confirmed_employee_account_creation_first_page(){
        return view('confirmed_employee_account_creation_first_page');
    }

    public function employee_account_creation_first_step_submission_route(Request $request){
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

        $employeeRecord = employee_application_info_table::where([
            'phone_no' => $request->input('phone_no'),
            'email' => $request->input('email'),
            'account_number' => $request->input('account_number'),
        ])->first();

        if ($employeeRecord) {
            if ($employeeRecord->confirmation_code === $request->input('confirmation_code')) {
                $emp_id = $employeeRecord->id;
                return redirect()->route('confirmed_employee_account_creation_second_page', ['emp_id' => $emp_id]);
            } else {
                echo '<script>alert("Confirmation Code is Incorrect, Please Try Again...");</script>';
            }
        } else {
            echo '<script>alert("Employee Application Not Found With Provided Information...\n Please Try Again ...");</script>';
        }

    }

    public function confirmed_employee_account_creation_second_page($emp_id){
        return view('confirmed_employee_account_creation_second_page', compact('emp_id'));
    }

    public function employee_account_creation_second_step_submission_route(Request $request, $emp_id){
        try {
            $request->validate([
                'employee_username' => 'required|unique:employee_application_info,employee_username',
                'employee_password' => 'required|min:6',
                'employee_confirm_password' => 'required|same:employee_password',
            ]);

            $employeeRecord = employee_application_info_table::find($emp_id);

            if ($employeeRecord) {
                if ($employeeRecord->is_joined == 0 &&
                    is_null($employeeRecord->employee_username) &&
                    is_null($employeeRecord->employee_password) &&
                    is_null($employeeRecord->employee_confirm_password)) {
    
                    $employeeRecord->is_joined = 1;
                    $employeeRecord->employee_username = $request->input('employee_username');
                    $employeeRecord->employee_password = bcrypt($request->input('employee_password'));
                    $employeeRecord->employee_confirm_password = $request->input('employee_confirm_password');
    
                    $employeeRecord->save();
    
                    // echo "username and password created successfully...!";
                    return redirect()->route('employee_username_password_created_successfully_page');
                }else {
                    // echo "Username and password created before this instance, Do not try again on same account !";
                    echo '<script>alert("Username and password created before this instance, Do not try again on same account !");</script>';
                }
            } else {
                // echo "Somthing is wrong, Employee Application not found on current information";
                echo '<script>alert("Somthing is wrong, Employee Application not found on current information");</script>';
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

    public function employee_username_password_created_successfully_page(){
        return view('employee_username_password_created_successfully_page');
    }

    public function employee_login_form_phone_no_submission_route(Request $request){
        echo "Hello from employee_login_form_phone_no_submission_route function";

        try {
            $validatedData = $request->validate([
                'phone_no' => 'required|exists:employee_application_info,phone_no|regex:/^\+\d{1,3}(\s?\d+)+$/',
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
        $user = employee_application_info_table::where('phone_no', $request->phone_no)->first();
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
            return redirect()->route('employee_otp_verification',['e_id'=>$userOtp->e_id])->with('otp_sent', true);
        }else{
            echo "<br>Mobile no is invalid...";
        }
    }

    public function generateOTPS(Request $request, $phone_no)
    {
        $user = employee_application_info_table::where('phone_no', $request->phone_no)->first();
        $userOtp = employee_otp_table::where('e_id',$user->id)->latest('created_at')->first();

        $now = now();

        if($userOtp && $now->isBefore($userOtp->otp_expires_at))
        {
            return $userOtp;
        }

        return employee_otp_table::updateOrCreate(['e_id'=>$user->id],[
            'e_id' => $user->id,
            'otp' => rand(100000, 999999),
            'otp_expires_at' => $now->addMinutes(5)
        ]);
    }

    public function employee_otp_verification($e_id)
    {
        return view('employee_login_page_first_step',compact('e_id'));
    }

    public function employee_login_otp_verification_route(Request $request){

        try {
            $validatedData = $request->validate([
                'otp' => 'required|digits:6',
            ],
            [
                'otp.required' => 'Please provide the OTP.',
                'otp.digits' => 'The OTP must be a 6-digit number.',
            ]);

            $userOtp = employee_otp_table::where('e_id', $request->e_id)->where('otp', $request->otp)->first();

            $now = now();

            if(!$userOtp)
            {
                return "<br><h1>OTP is incorrect...</h1>";
            }
            else if($userOtp && $now->isAfter($userOtp->otp_expires_at))
            {
                return "<br><h1>This OTP has been expired please request new OTP...</h1>";
            }

            $user = employee_otp_table::whereId($request->e_id)->first();

            if($user)
            {
                $userOtp->update([
                    'otp_expires_at' => now()
                ]);
                echo "<br><h1>OTP CORRECT...</h1>";
                Session::forget('phone_no');
                return redirect()->route('employee_login_page_second_step', ['id' => $user->id]);
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

    public function employee_login_page_second_step($id){
        $employee = employee_application_info_table::find($id);
        return view('employee_login_page_second_step', ['employee' => $employee]);
    }

    public function employee_login_form_un_ps_submission_route(Request $request, $id){

        try {
            // Validate the form data
            $validatedData = $request->validate([
                'employee_username' => 'required',
                'employee_password' => 'required',
            ], [
                'employee_username.required' => 'Please provide your username.',
                'employee_password.required' => 'Please provide your password.',
            ]);
    
            $employee = employee_application_info_table::find($id);
    
            if (!$employee) {
                return "<br><h1>Employee not found...</h1>";
            }

            if ($request->employee_username == $employee->employee_username) {
                if (Hash::check($request->employee_password, $employee->employee_password)) {
                    // echo "Username and password match.";
                    Session::put('employee_session', $employee);
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

    public function employee_logout(){
        if(Session::has('employee_session')){
            Session::pull('employee_session');
            // dd(session('employee_session'));
            return redirect('/');
        }
    }

    //employee feedbacks
    public function employee_feedback_page(){
        $employee_session = Session::get('employee_session');
        return view('employee_feedback_page', compact('employee_session'));
    }

    public function employee_feedback_form_submission(Request $request, $employee_id)
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'feedback' => 'required|string|max:255',
        ]);

        $feedback = employees_feedbacks_table::create([
            'employee_id' => $employee_id,
            'rating' => $request->rating,
            'feedback' => $request->feedback,
        ]);

        return view('employee_feedback_submitted_page');

    }
}
