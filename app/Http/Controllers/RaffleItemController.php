<?php

namespace App\Http\Controllers;

use App\RaffleItem;
use App\Raffle;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory as View;
use Illuminate\Contracts\Validation\Factory as Validator;

class RaffleItemController extends Controller
{
    /** 
    * View factory instance
    *
    * @var Illuminate\Contracts\View\Factory
    */
    protected $view;

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
    public function __construct(View $view, Validator $validator)
    {   
        $this->view = $view;
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
        $this->authorize('viewAny', RaffleItem::class);
        $raffleItems = RaffleItem::where('raffle_id', '=', $raffle->id)->get();
        return $this->view->make('raffle_item.index', compact('raffleItems', 'raffle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Raffle  $raffle
     * @return \Illuminate\Http\Response
     */
    public function create(Raffle $raffle)
    {
	$this->authorize('create', RaffleItem::class);
        return $this->view->make('raffle_item.create', compact('raffle'));
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
        $this->authorize('create', RaffleItem::class);
        $rules = [
            'name' => 'required|string|max:100',
            'donor' => 'required|string|max:100',
            'description' => 'string',
            'value' => 'required|numeric',
        ];
        $validator = $this->validator->make($request->all(), $rules);

        if ($validator->fails()) {
                return $validator->messages();
        }   
        else {
            $raffleItem = new RaffleItem;
            $raffleItem->name = $request['name'];
            $raffleItem->donor = $request['donor'];
            $raffleItem->description = $request['description'];
            $raffleItem->value = $request['value'];
            $raffleItem->raffle_id = $raffle->id;
            $raffleItem->save();
        }   

        $raffleItems = RaffleItem::all();

        return redirect()->route('raffles.raffle_items.index', $raffle);
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Raffle  $raffle
     * @param  \App\RaffleItem  $raffleItem
     * @return \Illuminate\Http\Response
     */
    public function edit(Raffle $raffle, RaffleItem $raffleItem)
    {
	$this->authorize('update', $raffleItem);
        return $this->view->make('raffle_item.edit', compact('raffle', 'raffleItem'));
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
        $this->authorize('update', $raffleItem);
        $rules = [
            'name' => 'required|string|max:100',
            'donor' => 'required|string|max:100',
            'description' => 'string',
            'value' => 'required|numeric',
        ];
        $validator = $this->validator->make($request->all(), $rules);

        if ($validator->fails()) {
                return $validator->messages();
        }   
        else {
            ($raffleItem->name == $request['name']) ?: $raffleItem->name = $request['name'];
            ($raffleItem->name == $request['donor']) ?: $raffleItem->donor = $request['donor'];
            ($raffleItem->name == $request['description']) ?: $raffleItem->description = $request['description'];
            ($raffleItem->name == $request['value']) ?: $raffleItem->value = $request['value'];
            $raffleItem->save();
        }   

        $raffleItems = RaffleItem::all();

        return redirect()->route('raffles.raffle_items.index', $raffle);
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
