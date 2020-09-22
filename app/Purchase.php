<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function raffle()
    {
        Return $this->belongsTo(Raffle::class);
    }
    public function tickets()
    {
	Return $this->hasMany(Ticket::class);
    }
    public function payment()
    {
	Return $this->hasOne(Payment::class);
    }
}
