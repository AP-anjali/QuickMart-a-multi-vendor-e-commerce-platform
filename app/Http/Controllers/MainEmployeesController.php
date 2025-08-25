<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\delivery_team_application_info_table;
use App\Models\employee_application_info_table;
use App\Models\employee_email_verification_table;
use App\Mail\EmployeeVerificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class MainEmployeesController extends Controller
{
    public function main_employee_dashboard()
    {
        $employee_session = Session::get('employee_session');
        return view('main_employee_dashboard', ['employee_session' => $employee_session]);
    }

    public function employee_account($employee_id)
    {
        $employee_data = employee_application_info_table::find($employee_id);
        return view('showing_logged_in_employee_account', compact('employee_data'));
    }

    public function sending_email_for_verify_employee_user($employee_id)
    {
        $employee_to_sent_an_email = employee_application_info_table::find($employee_id);

        $userVerificationCode = employee_email_verification_table::where('employee_id',$employee_to_sent_an_email->id)->latest('varification_code_created_at')->first();

        $now = now();

        if($userVerificationCode && $now->isBefore($userVerificationCode->varification_code_expires_at))
        {
            $verification_code = $userVerificationCode->varification_code;
        }
        else
        {
            $verification_code = Str::random(26);
        }

        $this->sendVerificationCodeEmailToEmployee($employee_to_sent_an_email->email, $verification_code);
        
        employee_email_verification_table::updateOrCreate(['employee_id'=>$employee_to_sent_an_email->id],[
            'employee_id' => $employee_to_sent_an_email->id,
            'varification_code' => $verification_code,
            'varification_code_expires_at' => $now->addMinutes(10)
        ]);

        Session::put('mail_has_been_sent_to_user', true);

        return redirect()->back();
    }

    private function sendVerificationCodeEmailToEmployee($email, $verification_code)
    {
        Mail::to($email)->send(new EmployeeVerificationMail($verification_code));
    }

    public function verifying_employee_email_verification_code_form_submission($employee_id, Request $request)
    {
        try {
            $validatedData = $request->validate([
                'varification_code' => 'required',
            ],
            [
                'varification_code.required' => 'Please provide the varification code',
            ]);

            $verification_code = employee_email_verification_table::where('employee_id', $employee_id)->where('varification_code', $request->varification_code)->first();

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

            $user = employee_application_info_table::whereId($employee_id)->first();

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

            echo '<br><h2 style="color: red;">You cannot Go Further due to following errors :</h2><br>';
            foreach ($errorMessages as $errorMessage) {
                echo '<center>' . '<h1>'. $errorMessage . '<br>' . '</h1>' . '</center>';
            }

            return;
        }
    }

    public function showing_photo_to_employee_for_account($employee_id)
    {
        $employee_to_show_document = employee_application_info_table::find($employee_id);
        return view('showing_photo_to_employee_for_account', compact('employee_to_show_document'));
    }

    public function showing_aadharcard_to_employee_for_account($employee_id)
    {
        $employee_to_show_document = employee_application_info_table::find($employee_id);
        return view('showing_aadharcard_to_employee_for_account', compact('employee_to_show_document'));
    }

    public function showing_proof_of_bank_account_ownership_to_employee_for_account($employee_id)
    {
        $employee_to_show_document = employee_application_info_table::find($employee_id);
        return view('showing_proof_of_bank_account_ownership_to_employee_for_account', compact('employee_to_show_document'));
    }

    public function deleting_employee_account_from_employee($id){
        $employee_to_delete = employee_application_info_table::find($id);
        $employee_to_delete->delete();
        Session::forget('employee_session');
        return redirect('/');
    }

    public function updating_employee_user_record_from_employee_page_form_submission(Request $request, $id){
        $employee_record_to_update = employee_application_info_table::find($id);

        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:employee_application_info,email,' . $id,
                'phone_no' => 'required|string|unique:employee_application_info,phone_no,' . $id,
                'address' => 'required|string',
                'gender' => 'required|string',
                'date_of_birth' => 'required|date',

                'photo' => 'nullable|file|mimes:jpeg,png,jpg',
                'Aadharcard' => 'nullable|file|mimes:pdf',

                'employee_username' => 'required|string|unique:employee_application_info,employee_username,' . $id,
                'employee_password' => 'nullable|string',
                'employee_confirm_password' => 'required|string',
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

        $employee_record_to_update->name = $request->input('name');
        $employee_record_to_update->email = $request->input('email');
        $employee_record_to_update->phone_no = $request->input('phone_no');
        $employee_record_to_update->address = $request->input('address');
        $employee_record_to_update->gender = $request->input('gender');
        $employee_record_to_update->date_of_birth = $request->input('date_of_birth');
        $employee_record_to_update->employee_username = $request->input('employee_username');
        
        if ($request->filled('employee_confirm_password')) {
            $employee_record_to_update->employee_password = bcrypt($request->input('employee_confirm_password'));
            $employee_record_to_update->employee_confirm_password = $request->input('employee_confirm_password'); 
        }

        if ($request->hasFile('profile_pic')) {
            $fileNameWithExt = $request->file('profile_pic')->getClientOriginalName();
            
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            
            $extension = $request->file('profile_pic')->getClientOriginalExtension();
            
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
    
            $path = $request->file('profile_pic')->storeAs('public/img', $fileNameToStore);
    
            $employee_record_to_update->profile_pic = 'img/'.$fileNameToStore;
        }

        $employee_record_to_update->bank_name = $request->input('bank_name');
        $employee_record_to_update->bank_branch = $request->input('bank_branch');
        $employee_record_to_update->bank_ifsc_code = $request->input('bank_ifsc_code');
        $employee_record_to_update->bank_micr_code = $request->input('bank_micr_code');
        $employee_record_to_update->account_holder_name = $request->input('account_holder_name');
        $employee_record_to_update->account_number = $request->input('account_number');
        $employee_record_to_update->account_type = $request->input('account_type');

        if ($request->hasFile('proof_of_bank_account_ownership')) {
            Storage::delete($employee_record_to_update->proof_of_bank_account_ownership);
    
            $proofOfOwnership = $request->file('proof_of_bank_account_ownership');
            $proofPath = $proofOfOwnership->store('employee_application_proof_of_bank_account_ownership', 'public');
            $employee_record_to_update->proof_of_bank_account_ownership = $proofPath;
        }

        if ($request->hasFile('photo')) {
            Storage::delete($employee_record_to_update->photo);
    
            $photo = $request->file('photo');
            $photoPath = $photo->store('employee_application_photos', 'public');
            $employee_record_to_update->photo = $photoPath;
        }

        if ($request->hasFile('Aadharcard')) {
            Storage::delete($employee_record_to_update->Aadharcard);
    
            $Aadharcard = $request->file('Aadharcard');
            $AadharcardPath = $Aadharcard->store('employee_application_aadharcards', 'public');
            $employee_record_to_update->Aadharcard = $AadharcardPath;
        }

        $employee_record_to_update->save();

        Session::forget('employee_session');
        Session::put('employee_session', $employee_record_to_update);

        return redirect()->back()->with('employee_record_to_update', 'Account updated successfully !');

    }

    // ----------------------------------------------------------------------------------

    public function main_employee_dashboard_show_all_initial_applications_of_delivery_team_page(){
        $all_delivery_team_initial_applications = delivery_team_application_info_table::where('is_confirmed_from_employee_first', 0)->where('is_confirmed_from_admin_first', 0)->where('is_confirmed_from_employee_second', 0)->where('is_confirmed_from_admin_second', 0)->get();
        $employee_session = Session::get('employee_session');
        return view('main_employee_dashboard_show_all_initial_applications_of_delivery_team_page', compact('all_delivery_team_initial_applications', 'employee_session'));
    }

    public function delivery_team_application_photo_viewer($id)
    {
        $application_to_see_document = delivery_team_application_info_table::find($id); 
        $employee_session = Session::get('employee_session');
        return view('delivery_team_application_photo_viewer', compact('application_to_see_document', 'employee_session'));
    }

    public function delivery_team_application_addharcard_viewer($id)
    {
        $application_to_see_document = delivery_team_application_info_table::find($id); 
        return view('delivery_team_application_addharcard_viewer', ['application_to_see_document' => $application_to_see_document]);
    }

    public function delivery_team_application_vehicle_RC_book_viewer($id)
    {
        $application_to_see_document = delivery_team_application_info_table::find($id); 
        return view('delivery_team_application_vehicle_RC_book_viewer', ['application_to_see_document' => $application_to_see_document]);
    }

    public function delivery_team_application_vehicle_PUC_viewer($id)
    {
        $application_to_see_document = delivery_team_application_info_table::find($id); 
        return view('delivery_team_application_vehicle_PUC_viewer', ['application_to_see_document' => $application_to_see_document]);
    }

    public function delivery_team_application_vehicle_Licence_viewer($id)
    {
        $application_to_see_document = delivery_team_application_info_table::find($id); 
        return view('delivery_team_application_vehicle_Licence_viewer', ['application_to_see_document' => $application_to_see_document]);
    }

    public function delivery_team_application_vehicle_Insurance_viewer($id)
    {
        $application_to_see_document = delivery_team_application_info_table::find($id); 
        return view('delivery_team_application_vehicle_Insurance_viewer', ['application_to_see_document' => $application_to_see_document]);
    }

    public function delivery_team_application_proof_of_bank_account_ownership_viewer($id)
    {
        $application_to_see_document = delivery_team_application_info_table::find($id); 
        return view('delivery_team_application_proof_of_bank_account_ownership_viewer', ['application_to_see_document' => $application_to_see_document]);
    }

    public function delivery_team_application_proof_of_experience_viewer($id)
    {
        $application_to_see_document = delivery_team_application_info_table::find($id); 
        return view('delivery_team_application_proof_of_experience_viewer', ['application_to_see_document' => $application_to_see_document]);
    }

    public function delivery_team_application_proof_of_test_document_viewer($id)
    {
        $application_to_see_document = delivery_team_application_info_table::find($id); 
        return view('delivery_team_application_proof_of_test_document_viewer', ['application_to_see_document' => $application_to_see_document]);
    }

    public function main_employee_dashboard_nothing_to_show_in_initial_delivery_team_applications()
    {
        $employee_session = Session::get('employee_session');
        return view('main_employee_dashboard_nothing_to_show_in_initial_delivery_team_applications', ['employee_session' => $employee_session]);
    }

    public function confirming_delivery_team_application_from_employee_first_step($id){
        $delivery_team_applicant_to_confirm = delivery_team_application_info_table::find($id);   
        
        $employee_session = Session::get('employee_session');
        $employee_id = $employee_session->id;

        $delivery_team_applicant_to_confirm->is_confirmed_from_employee_first = 1;
        $delivery_team_applicant_to_confirm->employee_id_first = $employee_id;
        $delivery_team_applicant_to_confirm->save();

        return redirect()->route('main_employee_dashboard_delivery_team_application_first_confirmed_successfully_page');

    }

    public function unconfirming_delivery_team_application_from_employee_first_step($id){
        $delivery_team_applicant_to_confirm = delivery_team_application_info_table::find($id);   

        $delivery_team_applicant_to_confirm->is_confirmed_from_employee_first = 0;
        $delivery_team_applicant_to_confirm->employee_id_first = null;
        $delivery_team_applicant_to_confirm->save();

        return redirect()->route('main_employee_dashboard_delivery_team_application_first_unconfirmed_successfully_page');

    }

    public function main_employee_dashboard_delivery_team_application_first_confirmed_successfully_page()
    {
        return view('main_employee_dashboard_delivery_team_application_first_confirmed_successfully_page');
    }

    public function main_employee_dashboard_delivery_team_application_first_unconfirmed_successfully_page()
    {
        return view('main_employee_dashboard_delivery_team_application_first_unconfirmed_successfully_page');
    }

    public function main_employee_dashboard_show_all_delivery_team_applications_confirmed_by_emp_page()
    {
        $all_delivery_team_applications_confirmed_by_emp = delivery_team_application_info_table::where('is_confirmed_from_employee_first', 1)->where('is_confirmed_from_admin_first', 0)->where('is_confirmed_from_employee_second', 0)->where('is_confirmed_from_admin_second', 0)->get();
        $employee_session = Session::get('employee_session');
        return view('main_employee_dashboard_show_all_delivery_team_applications_confirmed_by_emp_page', compact('all_delivery_team_applications_confirmed_by_emp', 'employee_session'));
    }

    public function main_employee_dashboard_nothing_to_show_in_delivery_team_applications_confirmed_by_emp_page()
    {
        $employee_session = Session::get('employee_session');
        return view('main_employee_dashboard_nothing_to_show_in_delivery_team_applications_confirmed_by_emp_page', ['employee_session' => $employee_session]);
    }

    public function main_employee_dashboard_show_all_delivery_team_applications_confirmed_by_admin_page()
    {
        $all_delivery_team_applications_confirmed_by_admin = delivery_team_application_info_table::where('is_confirmed_from_employee_first', 1)->where('is_confirmed_from_admin_first', 1)->where('is_confirmed_from_employee_second', 0)->where('is_confirmed_from_admin_second', 0)->get();
        $employee_session = Session::get('employee_session');
        return view('main_employee_dashboard_show_all_delivery_team_applications_confirmed_by_admin_page', compact('all_delivery_team_applications_confirmed_by_admin', 'employee_session'));
    }

    public function main_employee_dashboard_nothing_to_show_in_delivery_team_applications_confirmed_by_admin_page()
    {
        $employee_session = Session::get('employee_session');
        return view('main_employee_dashboard_nothing_to_show_in_delivery_team_applications_confirmed_by_admin_page', ['employee_session' => $employee_session]);
    }

    public function contacting_to_the_delivery_team_applicant_from_emp($id){
        $application_to_contact = delivery_team_application_info_table::find($id); 
        $employee_session = Session::get('employee_session');
        return view('contacting_to_the_delivery_team_applicant_from_emp', compact('application_to_contact', 'employee_session'));
    }

    public function main_employee_dashboard_mail_sent_successfully_to_the_delivery_boy_for_contact($id){
        $contected_delivery_team_applicant = delivery_team_application_info_table::find($id);   
        
        $employee_session = Session::get('employee_session');
        $employee_id = $employee_session->id;

        $contected_delivery_team_applicant->is_contacted = 1;
        $contected_delivery_team_applicant->employee_id_who_contacted = $employee_id;
        $contected_delivery_team_applicant->save();

        return view('main_employee_dashboard_mail_sent_successfully_to_the_delivery_boy_for_contact');
    }

    public function confirming_delivery_team_application_from_employee_second_step(Request $request, $id){
        $delivery_team_applicant_to_confirm = delivery_team_application_info_table::find($id);   
        
        $employee_session = Session::get('employee_session');
        $employee_id = $employee_session->id;

        try {
            $validatedData = $request->validate([
                'proof_of_test_document' => 'required|file|mimes:pdf',
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

        $proof_of_test_document_path = $request->file('proof_of_test_document')->store('delivery_team_proof_of_test_documents', 'public'); 


        $delivery_team_applicant_to_confirm->proof_of_test_document = $proof_of_test_document_path;
        $delivery_team_applicant_to_confirm->employee_id_who_upload_proof_of_test_document = $employee_id;

        $delivery_team_applicant_to_confirm->is_confirmed_from_employee_second = 1;
        $delivery_team_applicant_to_confirm->employee_id_second = $employee_id;
        $delivery_team_applicant_to_confirm->save();

        return redirect()->route('main_employee_dashboard_delivery_team_application_second_confirmed_successfully_page');

    }

    public function main_employee_dashboard_delivery_team_application_second_confirmed_successfully_page(){
        return view('main_employee_dashboard_delivery_team_application_second_confirmed_successfully_page');
    }

    public function main_employee_dashboard_show_all_delivery_team_applications_eligible_by_employee_page()
    {
        $all_delivery_team_applications_confirmed_by_admin = delivery_team_application_info_table::where('is_confirmed_from_employee_first', 1)->where('is_confirmed_from_admin_first', 1)->where('is_confirmed_from_employee_second', 1)->where('is_confirmed_from_admin_second', 0)->get();
        $employee_session = Session::get('employee_session');
        return view('main_employee_dashboard_show_all_delivery_team_applications_eligible_by_employee_page', compact('all_delivery_team_applications_confirmed_by_admin', 'employee_session'));
    }

    public function unconfirming_delivery_team_application_from_employee_second_step($id){
        $delivery_team_applicant_to_confirm = delivery_team_application_info_table::find($id);   
       
        $delivery_team_applicant_to_confirm->is_confirmed_from_employee_second = 0;
        $delivery_team_applicant_to_confirm->employee_id_second = null;
        $delivery_team_applicant_to_confirm->save();

        return redirect()->route('main_employee_dashboard_delivery_team_application_second_unconfirmed_successfully_page');

    }

    public function main_employee_dashboard_delivery_team_application_second_unconfirmed_successfully_page(){
        return view('main_employee_dashboard_delivery_team_application_second_unconfirmed_successfully_page');
    }

    public function main_employee_dashboard_nothing_to_show_in_delivery_team_applications_eligible_by_employee_page()
    {
        $employee_session = Session::get('employee_session');
        return view('main_employee_dashboard_nothing_to_show_in_delivery_team_applications_eligible_by_employee_page', ['employee_session' => $employee_session]);
    }
    
}
