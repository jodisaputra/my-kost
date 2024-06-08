<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function notificationHandler(Request $request)
    {
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        $notif = new Notification();

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $orderId = $notif->order_id;
        $fraud = $notif->fraud_status;
        $transaction = Transaction::findOrFail($orderId);

        if ($transaction == 'capture') {

            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {

                if($fraud == 'challenge') {
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    // $transaction->addUpdate("Transaction order_id: " . $orderId ." is challenged by FDS");
                    $transaction->setPending();
                } else {
                    // TODO set payment status in merchant's database to 'Success'
                    // $transaction->addUpdate("Transaction order_id: " . $orderId ." successfully captured using " . $type);
                    $transaction->setSuccess();
                }

            }

        } elseif ($transaction == 'settlement') {

            // TODO set payment status in merchant's database to 'Settlement'
            // $transaction->addUpdate("Transaction order_id: " . $orderId ." successfully transfered using " . $type);
            $transaction->setSuccess();

        } elseif($transaction == 'pending'){

            // TODO set payment status in merchant's database to 'Pending'
            // $transaction->addUpdate("Waiting customer to finish transaction order_id: " . $orderId . " using " . $type);
            $transaction->setPending();

        } elseif ($transaction == 'deny') {

            // TODO set payment status in merchant's database to 'Failed'
            // $transaction->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is Failed.");
            $transaction->setFailed();

        } elseif ($transaction == 'expire') {

            // TODO set payment status in merchant's database to 'expire'
            // $transaction->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is expired.");
            $transaction->setExpired();

        } elseif ($transaction == 'cancel') {

            // TODO set payment status in merchant's database to 'Failed'
            // $transaction->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is canceled.");
            $transaction->setFailed();

        }

        return response()->json(['status' => 'ok']);
    }
}
