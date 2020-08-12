<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaffleItem extends Model
{
    public function raffle()
    {
        $this->belongsTo(Raffle::class);
    }

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
