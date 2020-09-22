<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaffleItem extends Model
{
    public function raffle()
    {
        return $this->belongsTo(Raffle::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
