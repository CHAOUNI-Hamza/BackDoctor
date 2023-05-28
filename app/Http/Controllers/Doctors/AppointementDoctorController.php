<?php

namespace App\Http\Controllers\Doctors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AppointementResource;
use Illuminate\Support\Facades\Schema;
use App\Models\Appointement;

class AppointementDoctorController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {  
        $this->middleware(['doctor:api']);
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

    


    // Filter by doctor ID if provided
        $query->whereHas('doctor', function ($query) use ($request) {
            $query->where('id', auth()->guard('doctor')->user()->id);
        });
    




    // Paginate the results with a limit of 10 appointments per page
    $appointments = $query->paginate(10);
    return AppointementResource::collection($appointments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
