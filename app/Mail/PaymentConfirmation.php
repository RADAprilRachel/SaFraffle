<?php

namespace App\Mail;

use App\Payment;
use App\Purchase;
use App\Ticket;
use App\Raffle;
use App\RaffleItem;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $payment;
    public $purchase;
    public $tickets;
    public $raffle;
    public $raffle_items;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
	$this->purchase = Purchase::find([$payment->purchase_id])->first();
	$this->tickets = Ticket::where('purchase_id', $payment->purchase_id)->get();
	$this->raffle = Raffle::find([$this->purchase->raffle_id])->first();
	$this->raffle_items = RaffleItem::where('raffle_id', $this->purchase->raffle_id)->get();
	$this->subject('Thank you for your donation');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.payment_confirmation');
    }
}
