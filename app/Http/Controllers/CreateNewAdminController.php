<?php

namespace App\Http\Controllers;
use App\Models\system_administration_table;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class CreateNewAdminController extends Controller
{
    public function createAdmin(){

        $adminData = [
            'admin_id' => 1,
            'admin_name' => 'Anjali Patel',
            'admin_phone_no' => '+917046106554',
            'admin_email' => 'anjalipatel3074@gmail.com',
            'admin_address' => 'pethapur | 382610 | gandhinagar | gujarat',
            'username' => 'Anjali_Patel_Admin',
            'secret_password' => bcrypt('Anjali_Patel_Admin'),
            'password' => 'Anjali_Patel_Admin', 
        ];

        $validator = Validator::make($adminData, [
            'admin_id' => [
                'required',
                'integer',
                Rule::exists('customers_info', 'id')->where(function ($query) {
                    $query->where('user_type', 1);
                }),
                Rule::unique('system_administration', 'admin_id')->where(function ($query) {
                    $query->where('user_type', 1);
                }),
            ],
            'admin_name' => 'required|string',
            'admin_phone_no' => 'required|string|unique:system_administration,admin_phone_no',
            'admin_email' => 'required|email|unique:system_administration,admin_email',
            'admin_address' => 'required|string',
            'username' => 'required|string|unique:system_administration,username',
            'secret_password' => 'required|string',
            'password' => 'required|string',
        ]);   
        
        if ($validator->fails()) {
            $errorMessages = $validator->errors()->all();
            echo '<script>';
            foreach ($errorMessages as $errorMessage) {
                echo 'alert("' . $errorMessage . '");';
            }
            echo '</script>';
            return;
        }

        system_administration_table::create($adminData);

        return "Admin Created Successfully!";
    }
}
