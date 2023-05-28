<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use App\Http\Requests\StorePharmacyRequest;
use App\Http\Requests\UpdatePharmacyRequest;
use App\Http\Resources\PharmacyResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PharmacyController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {  
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $order_by = $request->input('order_by', 'id');
        $query = Pharmacy::orderBy($order_by, 'DESC');
        $query->with('category');

    if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
    }

    if($request->filled('search_array')) {
        $query->whereHas('category', function ($query_test) use ($request) {
            $query_test->whereIn('name', $request->search_array);
       });
    }

    if ($request->filled('pagination')) {
            $pharmacies = $query->paginate($request->pagination);
            return PharmacyResource::collection($pharmacies);
    }

    $pharmacies = $query->get();

    return PharmacyResource::collection($pharmacies);
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
     * @param  \App\Http\Requests\StorePharmacyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePharmacyRequest $request)
    {
        $pharmacy = new Pharmacy;

        $pharmacy->name = $request->name;
        $pharmacy->category_id = $request->category_id;
        $pharmacy->address = $request->address;
        $pharmacy->administrator = $request->administrator;
        $pharmacy->phone = $request->phone;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/clients');  
            $pharmacy->photo = config('app.url').Storage::url($path);
        }
        $pharmacy->about = $request->about;
        $pharmacy->location = $request->location;

        $pharmacy->save();

        return new PharmacyResource($pharmacy);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function show(Pharmacy $pharmacy)
    {
        $pharmacy = Pharmacy::find($pharmacy->id);

    if (!$pharmacy) {
        return response()->json(['message' => 'User not found'], 404);
    }

    return new PharmacyResource($pharmacy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function edit(Pharmacy $pharmacy)
    {
        $pharmacy = Pharmacy::find($pharmacy->id);

    if (!$pharmacy) {
        return response()->json(['message' => 'User not found'], 404);
    }

    return new PharmacyResource($pharmacy);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePharmacyRequest  $request
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePharmacyRequest $request, Pharmacy $pharmacy)
    {
        $pharmacy = Pharmacy::find($pharmacy->id);

        $pharmacy->name = $request->name;
        $pharmacy->category_id = $request->category_id;
        $pharmacy->address = $request->address;
        $pharmacy->administrator = $request->administrator;
        $pharmacy->phone = $request->phone;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/clients');  
            $pharmacy->photo = config('app.url').Storage::url($path);
        }
        $pharmacy->about = $request->about;
        $pharmacy->location = $request->location;

        $pharmacy->save();

        return new PharmacyResource($pharmacy);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pharmacy $pharmacy)
    {
        $pharmacy->delete();
        return new PharmacyResource($pharmacy);
    }
}
