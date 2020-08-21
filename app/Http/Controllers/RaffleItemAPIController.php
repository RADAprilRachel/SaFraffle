<?php

namespace App\Http\Controllers;

use App\RaffleItem;
use App\Raffle;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Factory as Validator;


class RaffleItemAPIController extends Controller
{
    /** 
    * Validator factory instance
    *
    * @var Illuminate\Contracts\Validation\Factory
    */
    protected $validator;

    /** 
     * Inject controller dependencies
     *
     */
    public function __construct(Validator $validator)
    {   
        $this->validator = $validator;
    }   

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Raffle  $raffle
     * @return \Illuminate\Http\Response
     */
    public function index(Raffle $raffle)
    {
        $raffleItems = RaffleItem::whereRaffleId($raffle->id)->get();
        return response()->json(['data'=>collect(['raffle'=>$raffle, 'raffle_items'=>$raffleItems])]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Raffle  $raffle
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Raffle $raffle)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Raffle  $raffle
     * @param  \App\RaffleItem  $raffleItem
     * @return \Illuminate\Http\Response
     */
    public function show(Raffle $raffle, RaffleItem $raffleItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Raffle  $raffle
     * @param  \App\RaffleItem  $raffleItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Raffle $raffle, RaffleItem $raffleItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Raffle  $raffle
     * @param  \App\RaffleItem  $raffleItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Raffle $raffle, RaffleItem $raffleItem)
    {
        //
    }
}
