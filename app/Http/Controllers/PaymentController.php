<?php

namespace App\Http\Controllers;

use App\Models\TopupHistory;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        \Midtrans\Config::$serverKey = env('SERVER_KEY_MIDTRANS');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = env('PRODUCTION');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    }

    public function index(User $user, Request $request)
    {
        //$clientKey = env('CLIENT_KEY_MIDTRANS');

        $date = date('d-m-y-H-i-s');
        $data = str_replace('-','',$date);
        $orderId = $data.$user->id;
        $transaction_details = array(
            'order_id' => $orderId,
            'gross_amount' => $request->amount, // no decimal allowed for creditcard
        );
        
        // Optional
        $customer_details = array(
            'first_name'     => $user->name,
            'email'    => $user->email,
            'phone'    => $user->phone,
            'address'  => $user->address,
        );
        
        // Fill SNAP API parameter
        $params = array(
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
        );

        TopupHistory::create([
            'user_id' => $request->user_id,
            'payment_method_id' => $request->payment_method_id,
            'status' => 3,
            'transaction_id' => $orderId,
            'amount' => $request->amount
        ]);

        try {
            // Get Snap Payment Page URL
            $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;
            // Redirect to Snap Payment Page
            return response($paymentUrl);
        }
        catch (Exception $e) {
            return response($e->getMessage());
        }

        // return view('coba',compact('snapToken','clientKey'));
    }


    public function notification()
    {
        $notif = new \Midtrans\Notification();
        
        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;
        
        if ($transaction == 'capture') {
        // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card'){
                if($fraud == 'challenge'){
                // TODO set payment status in merchant's database to 'Challenge by FDS'
                // TODO merchant should decide whether this transaction is authorized or not in MAP
                echo "Transaction order_id: " . $order_id ." is challenged by FDS";
                }
                else {
                // TODO set payment status in merchant's database to 'Success'
                echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
                }
            }

            TopupHistory::where('transaction_id',$order_id)->update([
                'status' => 1
            ]);
        }
        else if ($transaction == 'settlement'){
            // TODO set payment status in merchant's database to 'Settlement'
            echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
            TopupHistory::where('transaction_id',$order_id)->update([
                'status' => 2
            ]);
        }
        else if($transaction == 'pending'){
            // TODO set payment status in merchant's database to 'Pending'
            echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
            TopupHistory::where('transaction_id',$order_id)->update([
                'status' => 3
            ]);
        }
        else if ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
            TopupHistory::where('transaction_id',$order_id)->update([
                'status' => 4
            ]);
        }
        else if ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
            TopupHistory::where('transaction_id',$order_id)->update([
                'status' => 4
            ]);
        }
        else if ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'Denied'
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
            TopupHistory::where('transaction_id',$order_id)->update([
                'status' => 5
            ]);
        }
    }
}
