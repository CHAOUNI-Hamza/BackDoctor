<?php

namespace App\Http\Controllers;

use App\Models\Appointement;
use App\Http\Requests\StoreAppointementRequest;
use App\Http\Requests\UpdateAppointementRequest;
use Illuminate\Http\Request;
use App\Http\Resources\AppointementResource;
use Illuminate\Support\Facades\Schema;

class AppointementController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {  
        $this->middleware(['auth:api']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Start with fetching appointments and eager loading related models (doctor, patient)
        $query = Appointement::with(['doctor', 'patient']);

    
    // Filter by status if provided
    if ($request->filled('status')) {
        $query->where('status', $request->status)->orWhere('status', $request->status_two);
    }

    // Filter by patient name if provided
    if ($request->filled('name_patient')) {
        $query->whereHas('patient', function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->name_patient . '%');
        });
    }

    // Filter by doctor username if provided
    if ($request->filled('name_doctor')) {
        $query->whereHas('doctor', function ($query) use ($request) {
            $query->where('username', 'like', '%' . $request->name_doctor . '%');
        });
    }

    // Paginate the results with a limit of 10 appointments per page
    $appointments = $query->paginate(10);
    return AppointementResource::collection($appointments);
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
