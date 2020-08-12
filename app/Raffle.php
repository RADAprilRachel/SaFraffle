<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raffle extends Model
{
    public function raffleItems()
    {
        return $this->hasMany(RaffleItem::class);
    }

    protected $casts = [
    'begin_date' => 'date:Y-m-d',
    'end_date' => 'date:Y-m-d',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
