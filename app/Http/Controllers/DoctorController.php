<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Http\Resources\DoctorResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('doctor', ['except' => ['login']]);
    }

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
        return response()->json(auth()->guard('doctor')->user());
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
        return $this->respondWithToken(auth()->refresh());
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
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 10);
    $whereBy = $request->input('whereBy', '');
    $value = $request->input('value', '');

    $doctors = Doctor::where($whereBy, 'like', '%' . $value . '%')->paginate($perPage);

    return new DoctorResource($doctors);
        /*$doctors = Doctor::all();
        return DoctorResource::collection($doctors);*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDoctorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
    {
        /*$photo = $request->file('photo');
        $name = time().'.'.$photo->getClientOriginalExtension();
        $destinationPath = public_path('/uploads');
        $photo->move($destinationPath, $name);
        $imageData->path = $destinationPath.'/'.$name;
        $imageData->save();*/

        $doctor = Doctor::create($request->all());
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
