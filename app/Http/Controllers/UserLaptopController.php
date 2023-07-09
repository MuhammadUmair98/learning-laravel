<?php

namespace App\Http\Controllers;

use App\Http\Requests\LaptopFormRequest;
use App\Http\Resources\UserLaptopResource;
use App\Models\UserCharger;
use App\Models\UserLaptop;
use App\Services\UserLaptopService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserLaptopController extends Controller
{

    private $user_laptop_service;

    function __construct(UserLaptopService $userLaptopService)
    {
        $this->user_laptop_service = $userLaptopService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_laptops = UserLaptop::get();
        return response()->json(['data' => UserLaptopResource::collection($user_laptops)]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LaptopFormRequest $request)
    {
        $user_laptop = new UserLaptop;
        $user_laptop = $this->user_laptop_service->storeOrUpdateLaptop($user_laptop, $request);
        return response()->json(['success' => true, 'data' => $user_laptop]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user_laptop = UserLaptop::findOrFail($id);
        return response()->json(['data' => new UserLaptopResource($user_laptop)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LaptopFormRequest $request, int $id)
    {
        $user_laptop = UserLaptop::findOrFail($id);
        $user_laptop = $this->user_laptop_service->storeOrUpdateLaptop($user_laptop, $request);
        return response()->json(['success' => true, 'data' => $user_laptop]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $user_laptop = UserLaptop::findOrFail($id);
        $user_laptop->delete();
        return response()->json(['success' => true]);
    }


    public function storeCharger(Request $request)
    {
        $request->validate([
            'laptopId' => 'required|exists:user_laptops,id',
            'name' => 'required|string',
        ]);
        $user_laptop = UserLaptop::findOrFail($request->laptopId);
        $user_charger = new UserCharger();
        $user_charger->name = $request->name;
        $user_laptop->laptopCharger()->save($user_charger);  //we store one record according to another record
        return response()->json(['success' => true, 'data' => $user_charger]);
    }
}
