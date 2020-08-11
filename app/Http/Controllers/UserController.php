<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory as View;
use Illuminate\Contracts\Validation\Factory as Validator;

class UserController extends Controller
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
        $this->authorize('viewAny', User::class);
        $users = User::all();
        return $this->view->make('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);
        return $this->view->make('user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return $this->view->make('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

	$id = strval($user->id);
	$roles = implode(",",User::$roles);
        $data = $request->all();
        $rules = [
	    'name' => 'required|string|max:255',
	    'email' => 'required|string|email|max:255|unique:users,email,'.$id,
	    'role' => 'in:'.$roles, 
        ];

        $validator = $this->validator->make($data, $rules);

        if ($validator->fails()) {
		return $validator->messages();
	}
	else {
            ($user->name == $request['name']) ?: $user->name = $request['name'];
            ($user->email == $request['email']) ?: $user->email = $request['email'];
            ($user->role == $request['role']) ?: $user->role = $request['role'];
            $user->save();
        }

	$users = User::all();
	return $this->view->make('user.index', compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
    }
}
