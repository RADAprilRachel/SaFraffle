<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Raffle;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory as View;

class TicketController extends Controller
{
    /** 
    * View factory instance
    *
    * @var Illuminate\Contracts\View\Factory
    */
    protected $view;

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Raffle  $raffle
     * @return \Illuminate\Http\Response
     */
    public function __construct(View $view)
    {   
        $this->view = $view;
    }

    public function search(Request $request, Raffle $raffle)
    {
        $this->authorize('viewAny', Ticket::class);
	$tickets = Ticket::with(['raffleItem','purchase'])->whereHas('raffleItem', function ($query) use($raffle) {
		$query->whereHas('raffle', function ($q) use($raffle) {
			$q->where('id', $raffle->id);
		});
	})->whereHas('purchase', function ($query) use($request) {
            $query->has('payment')->whereBetween('created_at', [$request['begin'], $request['end']]);
	})->get();
	return $this->view->make('ticket.index', compact('tickets', 'raffle'), ['begin'=>$request['begin'],'end'=>$request['end']]);
    }

    public function index(Raffle $raffle)
    {
        $this->authorize('viewAny', Ticket::class);
	$tickets = Ticket::with(['raffleItem','purchase'])->whereHas('raffleItem', function ($query) use($raffle) {
		$query->whereHas('raffle', function ($q) use($raffle) {
			$q->where('id', $raffle->id);
		});
	})->whereHas('purchase', function ($query) {
            $query->has('payment');
	})->get();
	return $this->view->make('ticket.index', compact('tickets', 'raffle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Raffle  $raffle
     * @return \Illuminate\Http\Response
     */
    public function create(Raffle $raffle)
    {
        //
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
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Raffle $raffle, Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Raffle  $raffle
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Raffle $raffle, Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Raffle  $raffle
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Raffle $raffle, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Raffle  $raffle
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Raffle $raffle, Ticket $ticket)
    {
        //
    }
}
