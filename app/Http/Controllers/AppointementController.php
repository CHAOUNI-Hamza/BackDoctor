<?php

namespace App\Http\Controllers;

use App\Models\Appointement;
use App\Http\Requests\StoreAppointementRequest;
use App\Http\Requests\UpdateAppointementRequest;

class AppointementController extends Controller
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
     * @param  \App\Http\Requests\StoreAppointementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointement  $appointement
     * @return \Illuminate\Http\Response
     */
    public function show(Appointement $appointement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointement  $appointement
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointement $appointement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppointementRequest  $request
     * @param  \App\Models\Appointement  $appointement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointementRequest $request, Appointement $appointement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointement  $appointement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointement $appointement)
    {
        //
    }
}
