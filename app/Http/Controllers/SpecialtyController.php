<?php

namespace App\Http\Controllers;

use App\Models\specialty;
use App\Http\Requests\StorespecialtyRequest;
use App\Http\Requests\UpdatespecialtyRequest;
use Illuminate\Http\Request;
use App\Http\Resources\SpecialtyResource;
use Illuminate\Support\Facades\Schema;

class SpecialtyController extends Controller
{
    /* Start Method Admin */

    public function specialties(Request $request) {
        $query = specialty::orderBy($request->order_by);

    if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
    }

    $specialities = $query->paginate(10);
    return new SpecialtyResource($specialities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorespecialtyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorespecialtyRequest $request)
    {
        $specialty = new specialty;
        $specialty->name = $request->name;
        if ($request->hasFile('photo')) {
            $photoName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('images'), $photoName);
        $specialty->photo = $photoName;
        }
        
        $specialty->save();
        return new SpecialtyResource($specialty);
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
        return $specialty;
        $specialty->name = $request->input('name', $specialty->name);

        if ($request->hasFile('photo')) {
            $photoName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('images'), $photoName);
        $specialty->photo = $photoName;
        }

    $specialty->save();

    return new SpecialtyResource($specialty);
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