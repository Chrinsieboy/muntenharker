<?php

namespace App\Http\Controllers;

use App\Models\MijnMuntenharker;
use App\Http\Requests\StoreMijnMuntenharkerRequest;
use App\Http\Requests\UpdateMijnMuntenharkerRequest;

class MijnMuntenharkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mijn-muntenharker');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMijnMuntenharkerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMijnMuntenharkerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MijnMuntenharker  $mijnMuntenharker
     * @return \Illuminate\Http\Response
     */
    public function show(MijnMuntenharker $mijnMuntenharker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MijnMuntenharker  $mijnMuntenharker
     * @return \Illuminate\Http\Response
     */
    public function edit(MijnMuntenharker $mijnMuntenharker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMijnMuntenharkerRequest  $request
     * @param  \App\Models\MijnMuntenharker  $mijnMuntenharker
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMijnMuntenharkerRequest $request, MijnMuntenharker $mijnMuntenharker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MijnMuntenharker  $mijnMuntenharker
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        // 
    }
}
