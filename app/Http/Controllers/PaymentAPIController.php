<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class PaymentAPIController extends Controller
{
    public function store(Request $request) {
        $payment = new Payment;
        $payment->paypal_order_id = $request['paypal_order_id'];
        $payment->paypal_custom_id = $request['custom_id'];
        $payment->purchase_id = $request['purchase_id'];
        $payment->save();
        return response()->json(['success'=>true]);
    }
}
