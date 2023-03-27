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
    /* Start Method Admin */

    public function specialties(Request $request) {
        $order_by = $request->input('order_by', 'id');
        $query = specialty::orderBy($order_by);

    if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
    }

    $specialities = $query->paginate(10);

    return SpecialtyResource::collection($specialities);
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
    public function update(UpdatespecialtyRequest $request, $id)
    {
        $specialty = specialty::find($id);
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
    public function show(specialty $specialty, $id)
    {
        $specialty = specialty::find($id);

    if (!$specialty) {
        return response()->json(['message' => 'User not found'], 404);
    }

    return new SpecialtyResource($specialty);
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function edit(specialty $specialty)
    {
        //
    }

    

    
}