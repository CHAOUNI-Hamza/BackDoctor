<?php

namespace App\Http\Controllers;

use App\Models\specialty;
use App\Http\Requests\StorespecialtyRequest;
use App\Http\Requests\UpdatespecialtyRequest;
use Illuminate\Http\Request;
use App\Http\Resources\SpecialtyResource;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class SpecialtyController extends Controller
{

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
        $path = $request->file('photo')->store('public/clients');  
            $specialty->photo = Storage::url($path);
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
        $specialty = specialty::find($specialty->id);
        $specialty->name = $request->name;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/clients');  
            $specialty->photo = Storage::url($path);
        }

    $specialty->update(); 

    return new SpecialtyResource($specialty);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function show(specialty $specialty)
    {
        $specialtie = specialty::find($specialty->id);

    if (!$specialtie) {
        return response()->json(['message' => 'User not found'], 404);
    }

    return new SpecialtyResource($specialtie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function destroy(specialty $specialty)
    {
        $specialty->delete();
        return new SpecialtyResource($specialty);
    }
    
    /* End Method Admin */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order_by = $request->input('order_by', 'id');
        $query = specialty::orderBy($order_by, 'DESC');

    if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
    }

    if ($request->filled('pagination')) {
            $specialities = $query->paginate($request->pagination);
            return SpecialtyResource::collection($specialities);
    }

    $specialities = $query->get();

    return SpecialtyResource::collection($specialities);
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function edit(specialty $specialty)
    {
        $specialtie = specialty::find($specialty->id);

        if (!$specialtie) {
            return response()->json(['message' => 'User not found'], 404);
        }
    
        return new SpecialtyResource($specialtie);
    }

    

    
}