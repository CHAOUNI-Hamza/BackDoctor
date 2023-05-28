<?php

namespace App\Http\Controllers\Doctors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointement;
use App\Models\Patient;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Http\Resources\DoctorResource;
use Illuminate\Support\Facades\Auth;

class DoctorDoctorController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {  
        $this->middleware('doctor:api', ['except' => ['login','store']]);
    }

    /* Start Method Admin */
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $query = Doctor::with(['specialty']);
            $query->withCount('appointments');

            if ($request->filled('limit_doctors')) {
            $doctors = $query->orderBy('appointments_count', 'desc')->take($request->limit_doctors)->get();
            return DoctorResource::collection($doctors);
    };

    if($request->filled('search_array')) {
        $query->whereHas('specialty', function ($query_test) use ($request) {
            $query_test->whereIn('name', $request->search_array);
       });
    }

    if($request->filled('sex')) {
        $query->where('sex', $request->sex);
    }
                    


        if ($request->filled('value') && $request->filled('search_by')) {
            if($request->search_by == 'specialty') {
                $query->whereHas('specialty', function ($query_test) use ($request) {
            $query_test->where('name', 'like', '%' . $request->value . '%');
       });
            } else {
                $query->where($request->search_by, 'like', '%' . $request->value . '%');
            }
            
    }

    $doctors = $query->paginate(10);
    return DoctorResource::collection($doctors);
    }

    public function updateStatus(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->status = $request->input('status');
        $doctor->save();
        return response()->json([
            'message' => 'Doctor updated successfully',
            'data' => $doctor
        ]);
    }
    /* End Method Admin */

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']); 

        if (! $token = auth()->guard('doctor')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {

        $doctor = auth()->guard('doctor')->user();


    return new DoctorResource($doctor);

        //return response()->json(auth()->guard('doctor')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->guard('doctor')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->guard('doctor')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->guard('doctor')->factory()->getTTL() * 60
        ]);
    }
    
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDoctorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
    {
        $doctor = new Doctor();

    $doctor->username = $request->input('username');
    /*$doctor->specialite_id = $request->input('specialite_id');
    $doctor->membre_since = $request->input('membre_since');
    $doctor->status = $request->input('status');
    $doctor->sex = $request->input('sex');
    $doctor->date = $request->input('date');*/
    $doctor->email = $request->input('email');
   /* $doctor->firstname = $request->input('firstname');
    $doctor->lastname = $request->input('lastname');*/
    $doctor->password = bcrypt($request->input('password'));
    /*$doctor->phone = $request->input('phone');
    $doctor->clinicname = $request->input('clinicname');
    $doctor->clinicadresse = $request->input('clinicadresse');
    $doctor->adresse_one = $request->input('adresse_one');
    $doctor->adresse_two = $request->input('adresse_two');
    $doctor->city = $request->input('city');
    $doctor->state = $request->input('state');
    $doctor->country = $request->input('country');
    $doctor->code_postal = $request->input('code_postal');
    $doctor->pricing = $request->input('pricing');
    $doctor->service = $request->input('service');
    $doctor->specialization = $request->input('specialization');
    $doctor->education = $request->input('education');
    $doctor->experience = $request->input('experience');
    $doctor->awords = $request->input('awords');
    $doctor->memberships = $request->input('memberships');
    $doctor->memberships = $request->input('registrations');*/
    $doctor->save();
        return new DoctorResource($doctor);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {

        $doctor = Doctor::with('specialty')->find($doctor->id);


    return new DoctorResource($doctor);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {

        $doctor = Doctor::with('specialty')->find($doctor->id);


    return new DoctorResource($doctor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctorRequest  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        return 'hhhh';
        $doctor->update($request->all());
        return new DoctorResource($doctor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function delete(Doctor $doctor)
    {
        $doctor->delete();
        return new DoctorResource($doctor);
    }

    public function deleted() {
        return Doctor::onlyTrashed()->get();
    }

    public function restore(Doctor $doctor) {
        $doctor = Doctor::onlyTrashed()->findOrFail($doctor);
    $doctor->restore();
    return new DoctorResource($doctor);
    }
}
