<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Illuminate\Support\Facades\Log;
use App\Models\orders_table;
use App\Models\order_information_table;
use App\Models\customers_address_table;
use App\Models\seller_info_table;
use App\Models\customers_info_table;
use App\Models\customer_cart_table;
use Exception;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPaymentSuccessfulMail;
use Carbon\Carbon;
  
class RazorpayPaymentController extends Controller
{
    public function test_for_razorpay_payment()
    {
        return view('test_for_razorpay_payment');
    }

    public function test_for_razorpay_payment_form_submission(Request $request)
    {
        $input = $request->all();
        $api = new Api(env('RAZORPAY_API_KEY'), env('RAZORPAY_API_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if (count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture([
                    'amount' => $payment['amount']
                ]);
            } catch (Exception $e) {
                Log::info($e->getMessage());
                return back()->withError($e->getMessage());
            }
        }
        return back()->withSuccess('Payment done');
    }

    public function payment_of_products_by_customer(Request $request)
    {
        $input = $request->all();

        $api = new Api(env('RAZORPAY_API_KEY'), env('RAZORPAY_API_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if (count($input) && !empty($input['razorpay_payment_id'])) 
        {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture([
                    'amount' => $payment['amount']
                ]);

                $order = new orders_table;

                $customer_session = Session::get('customer_session');
                $customer_id = $customer_session->id;

                $order->customer_id = $customer_id;
                $actual_amount = $payment['amount'];
                $order->total_amount = $actual_amount;
                $order->transaction_id = $payment->id;
                $order->payment_id = $payment->id;
                $order->payment_status = $payment->status;
                $order->payment_info = json_encode($payment->toArray());

                $order->save();

                // -----------------------------

                $customer = customers_info_table::find($customer_id);
                $customer_address = $customer->addresses->first();
                $customer_address_id = $customer_address->id;

                $product_id = $request->input('product_id');
                $seller_id = $request->input('seller_id');

                $currentDateTime = Carbon::now();
                $currentDateTime->setTimezone('Asia/Kolkata'); 
                $formattedDateTime = $currentDateTime->format('d/m/y h:i:s A');

                $orderInfo = new order_information_table;
                $orderInfo->order_id = $order->id; 
                $orderInfo->customer_id = $customer_id;
                $customer_address_id = $customer_address_id;
                $orderInfo->customer_address_id = $customer_address_id;
                $orderInfo->product_id = $product_id;
                $orderInfo->seller_id = $seller_id;
                $orderInfo->product_quantity = 1; 
                $orderInfo->product_price = $actual_amount; 

                $orderInfo->is_order_placed = 1; 
                $orderInfo->order_placed_date = $formattedDateTime;

                $orderInfo->save();

            } catch (Exception $e) {
                Log::info($e->getMessage());
                return back()->withError($e->getMessage());
            }
        }
        return redirect()->back()->with('payment_done', 'Payment Done, And Order Placed Successfully !');
    }

    public function payment_of_single_item_products_by_customer_from_cart(Request $request, $id)
    {
        $input = $request->all();

        $api = new Api(env('RAZORPAY_API_KEY'), env('RAZORPAY_API_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if (count($input) && !empty($input['razorpay_payment_id'])) 
        {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture([
                    'amount' => $payment['amount']
                ]);

                $order = new orders_table;

                $customer_session = Session::get('customer_session');
                $customer_id = $customer_session->id;

                $order->customer_id = $customer_id;
                $actual_amount = $payment['amount'];
                $order->total_amount = $actual_amount;
                $order->transaction_id = $payment->id;
                $order->payment_id = $payment->id;
                $order->payment_status = $payment->status;
                $order->payment_info = json_encode($payment->toArray());

                $order->save();

                // -----------------------------

                $customer = customers_info_table::find($customer_id);
                $customer_address = $customer->addresses->first();
                $customer_address_id = $customer_address->id;

                $product_id = $request->input('product_id');
                $seller_id = $request->input('seller_id');
                $product_quantity = $request->input('product_quantity');

                $currentDateTime = Carbon::now();
                $currentDateTime->setTimezone('Asia/Kolkata'); 
                $formattedDateTime = $currentDateTime->format('d/m/y h:i:s A');

                $orderInfo = new order_information_table;
                $orderInfo->order_id = $order->id; 
                $orderInfo->customer_id = $customer_id;
                $customer_address_id = $customer_address_id;
                $orderInfo->customer_address_id = $customer_address_id;
                $orderInfo->product_id = $product_id;
                $orderInfo->seller_id = $seller_id;
                $orderInfo->product_quantity = $product_quantity;
                $orderInfo->product_price = $actual_amount; 

                $orderInfo->is_order_placed = 1; 
                $orderInfo->order_placed_date = $formattedDateTime;

                $orderInfo->save();

                // --------------------------
                $product_to_remove_from_cart = customer_cart_table::find($id);
                $product_to_remove_from_cart->delete();

                $this->sendOrderPaymentDoneMail($customer->email);

                $seller = seller_info_table::find($seller_id);

                $this->payment_of_single_product_to_seller($seller, $actual_amount);

            } catch (Exception $e) {
                Log::info($e->getMessage());
                return back()->withError($e->getMessage());
            }
        }
        return redirect()->back()->with('payment_done', 'Payment Done, And Order Placed Successfully !');
    }

    public function payment_of_single_product_to_seller($seller, $actual_amount)
    {
        $commission_rate = 10;
        $commission = ($commission_rate / 100) * $actual_amount;
        $amount_to_transfer = $actual_amount - $commission;
        $account_number = $seller->account_number;
        $api_for_seller_payment = new Api(env('RAZORPAY_API_KEY'), env('RAZORPAY_API_SECRET'));
    
        try {

            $transfer = $api_for_seller_payment->transfer->create([
                'amount' => $amount_to_transfer * 100,
                'currency' => 'INR',
                'beneficiary_account' => $account_number,
                'beneficiary_name' => $seller->name,
                'beneficiary_ifsc' => $seller->bank_ifsc_code,
                'purpose' => 'seller_payment',
                'queue_if_low_balance' => true,
            ]);
    
            Log::info('Payment to seller successful');
        } catch (\Razorpay\Api\Errors\BadRequestError $e) 
        {
            Log::error('Bad request error occurred during payment to seller: ' . $e->getMessage());
        } catch (\Razorpay\Api\Errors\InternalServerError $e) 
        {
            Log::error('Internal server error occurred during payment to seller: ' . $e->getMessage());
        } catch (\Exception $e) 
        {
            Log::error('Error occurred during payment to seller: ' . $e->getMessage());
        }
    }

    private function sendOrderPaymentDoneMail($email)
    {
        Mail::to($email)->send(new OrderPaymentSuccessfulMail($email));
    }

    public function payment_of_multiple_item_products_by_customer_from_cart(Request $request)
    {
        $input = $request->all();

        $api = new Api(env('RAZORPAY_API_KEY'), env('RAZORPAY_API_SECRET'));

        if (count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $payment = $api->payment->fetch($input['razorpay_payment_id']);

                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture([
                    'amount' => $payment['amount']
                ]);

                $order = new orders_table;

                $customer_session = Session::get('customer_session');
                $customer_id = $customer_session->id;

                $order->customer_id = $customer_id;
                $actual_amount = $payment['amount'];
                $order->total_amount = $actual_amount;
                $order->transaction_id = $payment->id;
                $order->payment_id = $payment->id;
                $order->payment_status = $payment->status;
                $order->payment_info = json_encode($payment->toArray());

                $order->save();

                $customer = customers_info_table::find($customer_id);
                $customer_address = $customer->addresses->first();
                $customer_address_id = $customer_address->id;

                $products = $request->input('products');

                foreach ($products as $product_id => $product_info) {
                    $currentDateTime = Carbon::now();
                    $currentDateTime->setTimezone('Asia/Kolkata');
                    $formattedDateTime = $currentDateTime->format('d/m/y h:i:s A');

                    $orderInfo = new order_information_table;
                    $orderInfo->order_id = $order->id;
                    $orderInfo->customer_id = $customer_id;
                    $customer_address_id = $customer_address_id;
                    $orderInfo->customer_address_id = $customer_address_id;
                    $orderInfo->product_id = $product_info['product_id'];
                    $orderInfo->seller_id = $product_info['seller_id'];
                    $orderInfo->product_quantity = $product_info['product_quantity'];
                    $orderInfo->product_price = $product_info['product_price'];

                    $orderInfo->is_order_placed = 1;
                    $orderInfo->order_placed_date = $formattedDateTime;

                    $orderInfo->save();

                    $product_to_remove_from_cart = customer_cart_table::where('product_id', $product_info['product_id'])->where('customer_id', $customer_id)->delete();
                }

                $this->sendOrderPaymentDoneMail($customer->email);

            } catch (Exception $e) {
                Log::info($e->getMessage());
                return back()->withError($e->getMessage());
            }
        }
        return redirect()->back()->with('payment_done_dana_done_done', 'Payment Done, And Orders Placed Successfully!');
    }


    public function for_apply_middleware_on_payment_button()
    {
        return view('for_apply_middleware_on_payment_button');
    }

    // ------------------------------------------------------------------------
    // ------------------------------------------------------------------------

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {        
        return view('razorpayView');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $input = $request->all();
  
        $api = new Api("rzp_test_heqXNY739GLOMr", "HGeOYNVLMsnlncG6gpdj0m9i");
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
  
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
          
        Session::put('success', 'Payment successful');
        return redirect()->back();
    }

    public function razorpay_payment_testing_page()
    {
        return view('razorpay_payment_testing_page');
    }

}


   

    // public function payment_of_single_product_to_seller($seller, $actual_amount)
    // {
    //     $commission_rate = 10;
    //     $commission = ($commission_rate / 100) * $actual_amount;

    //     $amount_to_transfer = $actual_amount - $commission;
    //     $account_number = (string) $seller->account_number;

    //     $api_for_seller_payment = new Api(env('RAZORPAY_API_KEY'), env('RAZORPAY_API_SECRET'));

    //     try 
    //     {

    //         $transfer = $api_for_seller_payment->transfer->create([
    //             'amount' => $amount_to_transfer * 100,
    //             'currency' => 'INR',
    //             'beneficiary_account' => $account_number,
    //             'beneficiary_name' => $seller->name,
    //             'beneficiary_ifsc' => $seller->bank_ifsc_code, 
    //             'purpose' => 'seller_payment',
    //             'queue_if_low_balance' => true,
    //         ]);   

    //         Log::info('DONE');

    //     } 
    //     catch (Exception $e) 
    //     {
    //         Log::error('Error occurred : ' . $e->getMessage());
    //     }
    // }