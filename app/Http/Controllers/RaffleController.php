<?php

namespace App\Http\Controllers;

use App\Raffle;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory as View;
use Illuminate\Contracts\Validation\Factory as Validator;

class RaffleController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Raffle::class);
        $raffles = Raffle::all();
        return $this->view->make('raffle.index', compact('raffles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Raffle::class);
        return $this->view->make('raffle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Raffle::class);
        $data = $request->all();
        $rules = [
	    'name' => 'required|string|max:100|unique:raffles,name',
	    'benefactor' => 'required|string|max:100',
	    'description' => 'string',
        ];

        $validator = $this->validator->make($data, $rules);

        if ($validator->fails()) {
		return $validator->messages();
	}
	else {
            $raffle = new Raffle;
            $raffle->name = $request['name'];
            $raffle->benefactor = $request['benefactor'];
            $raffle->description = $request['description'];
            $raffle->save();
        }

	$raffles = Raffle::all();
	return $this->view->make('raffle.index', compact('raffles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Raffle  $raffle
     * @return \Illuminate\Http\Response
     */
    public function show(Raffle $raffle)
    {
        $this->authorize('view', $raffle);
        return $this->view->make('raffle.show', ['raffle' => $raffle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Raffle  $raffle
     * @return \Illuminate\Http\Response
     */
    public function edit(Raffle $raffle)
    {
        $this->authorize('update', $raffle);
        return $this->view->make('raffle.edit', ['raffle' => $raffle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Raffle  $raffle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Raffle $raffle)
    {
        $this->authorize('update', $raffle);

        $id = $raffle->id;
        $data = $request->all();
        $rules = [
	    'name' => 'required|string|max:100|unique:raffles,name,'.$id,
	    'benefactor' => 'required|string|max:100',
	    'description' => 'string',
        ];

        $validator = $this->validator->make($data, $rules);
        if ($validator->fails()) {
		return $validator->messages();
	}
	else {
            ($raffle->name == $request['name']) ?: $raffle->name = $request['name'];
            ($raffle->benefactor == $request['benefactor']) ?: $raffle->benefactor = $request['benefactor'];
            ($raffle->description == $request['description']) ?: $raffle->description = $request['description'];
            $raffle->save();
        }
	$raffles = Raffle::all();
	return $this->view->make('raffle.index', compact('raffles'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Raffle  $raffle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Raffle $raffle)
    {
        //
    }
}
