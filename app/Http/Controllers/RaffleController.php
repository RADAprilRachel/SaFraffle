<?php

namespace App\Http\Controllers;

use App\Raffle;
use App\Traits\UploadTrait;
use App\Traits\ImageFileTrait;
use App\Http\Requests\RaffleFormRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory as View;
use Illuminate\Contracts\Validation\Factory as Validator;

class RaffleController extends Controller
{
    use UploadTrait;
    use ImageFileTrait;
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
    public function store(RaffleFormRequest $request)
    {
        $this->authorize('create', Raffle::class);

        if ($request->validated()) {
            $raffle = new Raffle;
            $raffle->name = $request['name'];
            $raffle->benefactor = $request['benefactor'];
            $raffle->description = $request['description'];
            $raffle->begin_date = $request['begin_date'];
            $raffle->end_date = $request['end_date'];
            $raffle->ticket_cost = $request['ticket_cost'];
            $raffle->save();
            if ($request->has('image')) {
                $image = $request->file('image');
                $image_name = 'raffle_img_'.strval($raffle->id);
                $directory = '/img/raffle/';
                $path = '/storage'.$directory . $image_name. '.' . $image->getClientOriginalExtension();
                $this->uploadOne($image, $directory, 'public', $image_name);
                $raffle->image = $path;
                $this->resize($path, 600, 400);
                $raffle->save();
            }
	}
	else {
            return $request->messages();
        }

	return redirect()->route('raffles.raffleItems.index', ['raffle' => $raffle['id']])->with('success', 'Created!');
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
    public function update(RaffleFormRequest $request, Raffle $raffle)
    {
        $this->authorize('update', $raffle);

        if ($request->has('image')) {
            $image = $request->file('image');
            $image_name = 'raffle_img_'.strval($raffle->id);
            $directory = '/img/raffle/';
            $path = '/storage'.$directory . $image_name. '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $directory, 'public', $image_name);
            $raffle->image = $path;
            $this->resize($path, 600, 400);
        }
        ($raffle->name == $request['name']) ?: $raffle->name = $request['name'];
        ($raffle->benefactor == $request['benefactor']) ?: $raffle->benefactor = $request['benefactor'];
        ($raffle->description == $request['description']) ?: $raffle->description = $request['description'];
        ($raffle->begin_date == $request['begin_date']) ?: $raffle->begin_date = $request['begin_date'];
        ($raffle->end_date == $request['end_date']) ?: $raffle->end_date = $request['end_date'];
        ($raffle->ticket_cost == $request['ticket_cost']) ?: $raffle->ticket_cost = $request['ticket_cost'];
        $raffle->save();
	return redirect()->route('raffles.raffleItems.index', ['raffle' => $raffle['id']])->with('success', 'Updated!');
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
