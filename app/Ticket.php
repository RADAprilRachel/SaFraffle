<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function ticket() {
        $this->belongsTo(Raffle::class);
        $this->belongsTo(Purchase::class);
    }
}
