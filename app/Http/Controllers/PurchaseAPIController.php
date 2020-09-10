<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Ticket;
use App\Http\Requests\PurchaseFormRequest;
use Illuminate\Http\Request;

class PurchaseAPIController extends Controller
{
    public function store(PurchaseFormRequest $request) {
        $purchase = new Purchase;
        $purchase->name = $request['contact_data']['customer_name'];
        $purchase->email = $request['contact_data']['customer_email'];
        $purchase->phone = $request['contact_data']['customer_phone'];
        $purchase->contact_method = $request['contact_data']['contact_method'];
        $purchase->paypal_custom_id = $request['custom_id'];
        $purchase->raffle_id = $request['raffle_id'];
        $purchase->save();
	foreach($request['itemized_tickets'] as $ticket_req) {
            $ticket = new Ticket;
	    $ticket->quantity = $ticket_req['quantity'];
	    $ticket->purchase_id = $purchase->id;
	    $ticket->raffle_item_id = $ticket_req['sku'];
	    $ticket->save();
	}
        return response()->json(['success'=>true,'purchase_id'=>$purchase->id]);
    }
}
