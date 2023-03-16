<?php

namespace App\Http\Controllers;

use App\Models\specialty;
use App\Http\Requests\StorespecialtyRequest;
use App\Http\Requests\UpdatespecialtyRequest;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorespecialtyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorespecialtyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function show(specialty $specialty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function edit(specialty $specialty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatespecialtyRequest  $request
     * @param  \App\Models\specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatespecialtyRequest $request, specialty $specialty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function destroy(specialty $specialty)
    {
        //
    }
}
