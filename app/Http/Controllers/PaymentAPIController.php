<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Purchase;
use App\Mail\PaymentConfirmation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class PaymentAPIController extends Controller
{
    public function store(Request $request) {
        $payment = new Payment;
        $payment->paypal_order_id = $request['paypal_order_id'];
        $payment->paypal_custom_id = $request['custom_id'];
        $payment->purchase_id = $request['purchase_id'];
        $payment->save();
	$purchase = Purchase::find([$payment->purchase_id])->first();
	Mail::to($purchase)->send(new PaymentConfirmation($payment));
        return response()->json(['success'=>true]);
    }
    public function mail() {
        $payment = Payment::find(1);
	$purchase = Purchase::find([$payment->purchase_id])->first();
        Mail::to($purchase)->send(new PaymentConfirmation($payment));
        return (new PaymentConfirmation($payment))->render();
    }
}
