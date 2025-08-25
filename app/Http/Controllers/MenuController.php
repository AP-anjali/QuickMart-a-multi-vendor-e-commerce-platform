<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\products_info_table;
use App\Models\customer_cart_table;
use App\Models\customers_info_table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{

    public function main_initial_page(){
        $produstsPerPage = 15;
        $all_products = products_info_table::with('seller')->limit($produstsPerPage)->get();

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

            return view('main_initial_page', compact('all_products', 'customer_data', 'userCartProducts', 'address_stored'));

        }

        return view('main_initial_page', compact('all_products', 'customer_data', 'userCartProducts'));
    }

    function main_contact_page()
    {
        return view('main_contact_page');
    }

    function main_report_page(){
        return view('main_report_page');
    }

    public function main_about_page(){
        return view('main_about_page');
    }

    function home()
    {
        return view('home');
    }

    function about()
    {
        return view('about');
    }

    function contact()
    {
        return view('contact');
    }

    function account()
    {
        
    }

    function help()
    {
        return view('help');
    }

    function change_info()
    {
        return view('change_info');
    }
}
