<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raffle extends Model
{
    public function raffleItems()
    {
        return $this->hasMany(RaffleItem::class);
    }

}
