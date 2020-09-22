<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function raffleItem() {
        Return $this->belongsTo(RaffleItem::class);
    }
    public function purchase() {
        Return $this->belongsTo(Purchase::class);
    }
}
