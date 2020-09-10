<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function purchase()
    {
        $this->belongsTo(Raffle::class);
	$this->hasMany(Ticket::class);
	$this->hasOne(Payment::class);
    }
}
