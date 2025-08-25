<?php

namespace App\Http\Controllers;
use App\Models\admin_table;
use App\Models\system_administration_table;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function admin_login_username_password_verification_page(){
        return view('admin_login_username_password_verification_page');
    }

    public function admin_login_form_un_ps_submission_route(Request $request){
        echo "Hello From admin_login_form_un_ps_submission_route";
        $username = $request->input('username');
        $password = $request->input('password');

        $user = system_administration_table::where('username', $username)->first();
        if ($user) {
            echo "<br>Username is valid...";
    
            if ($password === $user->password){
                echo "<br>Password match...";
                echo "<center><h1>WELCOME TO OUR HOME PAGE</h1></center>";
                Session::put('admin_session', $user);
                Session::pull('customer_session');
                // dd(session('admin_session'));
                // return redirect()->route('main_admin_dashboard');
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

    public function main_admin_dashboard()
    {
        $admin_session = Session::get('admin_session');
        return view('main_admin_dashboard', ['admin_session' => $admin_session]);
    }




    // =================================================================================================


    public function admin_verify_un_ps()
    {
        return view('admin_verify_un_ps');
    }

    public function admin_un_ps_verification_method(Request $request)
    {
        echo "hello from admin_un_ps_verification_method";
        $username = $request->input('username');
        $password = $request->input('password');

        $user = admin_table::where('username', $username)->first();
        if ($user) {
            echo "<br>Username is valid...";
    
            if ($password === $user->password){
                echo "<br>Password match...";
                echo "<center><h1>WELCOME TO OUR HOME PAGE</h1></center>";
                return redirect()->route('admin_dashboard');
            } else {
                echo '<h2 style="color: red; margin:0 0 0 50px;">'. "<br><br>Error Occured :" . '</h2>' . '<center>' . '<h1>'. "<br>Incorrect Password" . '<br>' . '</h1>' . '</center>'; 
                // echo "<br>Provided Password: " . $password;
                // echo "<br>Hashed Password from Database: " . $user->password;
            }
        } else {
            echo '<h2 style="color: red; margin:0 0 0 50px;">'. "<br><br>Error Occured :" . '</h2>' . '<center>' . '<h1>'. "<br>Username is invalid..." . '<br>' . '</h1>' . '</center>'; 
        }
    }

    public function admin_dashboard()
    {
        $admin_session = Session::get('admin_session');
        return view('admin_dashboard', ['admin_session' => $admin_session]);
    }

    public function dummy_dashboard()
    {
        return view('dummy_dashboard');
    }

    public function dummy_dashboard_copy()
    {
        return view('dummy_dashboard_copy');
    }

    public function captcha_verification_page(){
        return view('captcha_verification_page');
    }

    public function captcha_submitted_page(){
        return view('captcha_submitted_page');
    }

    public function admin_logout(){
        if(Session::has('admin_session'))
        {
            Session::pull('admin_session');
            // dd(session('admin_session'));

            if(Session::has('customer_session'))
            {
                Session::pull('customer_session');
            }
            
            return redirect('/');
        }
    }
}
