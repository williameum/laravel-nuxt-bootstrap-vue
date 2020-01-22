<?php

namespace App\Http\Controllers;

use App\Dog;
use App\User;
use Illuminate\Http\Request;

class DogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Dog $dog)
    {
        $dog = auth()->user()->dogs()->get();
        return response()->json($dog);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Dog $dog)
    {
        $dog->name = request('name');
        $dog->description = request('description');
        $dog->user_id = auth()->user()->id;
        $dog->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dog $dog)
    {
        $this->authorize('view', $dog);
        return $dog;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Dog $dog)
    {
        $dog->name = request('name');
        $dog->description = request('description');
        $dog->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dog $dog)
    {
         $dog->delete();
    }
}
