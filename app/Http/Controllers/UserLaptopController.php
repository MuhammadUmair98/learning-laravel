<?php

namespace App\Http\Controllers;

use App\Http\Requests\LaptopFormRequest;
use App\Models\UserLaptop;
use Facades\App\Services\UserLaptopService;
use Illuminate\Http\Request;

class UserLaptopController extends Controller
{
    function __construct()
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LaptopFormRequest $request)
    {
        $user_laptop = new UserLaptop;
        $user_laptop = UserLaptopService::storeOrUpdateLaptop($user_laptop, $request);
        return response()->json(['success' => true, 'data' => $user_laptop]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LaptopFormRequest $request, string $id)
    {
        $user_laptop = UserLaptop::findOrFail($id);
        $user_laptop = UserLaptopService::storeOrUpdateLaptop($user_laptop, $request);
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
}
