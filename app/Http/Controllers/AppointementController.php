<?php

namespace App\Http\Controllers;

use App\Models\Appointement;
use App\Http\Requests\StoreAppointementRequest;
use App\Http\Requests\UpdateAppointementRequest;
use Illuminate\Http\Request;
use App\Http\Resources\AppointementResource;

class AppointementController extends Controller
{
    /* Start Method Admin */
    public function appointementUpcommingPast(Request $request) {
        $query = Appointement::with(['doctor', 'patient']);

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    if ($request->filled('name_patient')) {
        $query->whereHas('patient', function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->name_patient . '%');
        });
    }

    if ($request->filled('name_doctor')) {
        $query->whereHas('doctor', function ($query) use ($request) {
            $query->where('username', 'like', '%' . $request->name_doctor . '%');
        });
    }

    $appointments = $query->paginate(6);
    return new AppointementResource($appointments);
    }
    /* End Method Admin */
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
