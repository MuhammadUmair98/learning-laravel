<?php

namespace App\Http\Controllers;

use App\Models\UserLaptop;
use Illuminate\Http\Request;

class UserLaptopController extends Controller
{
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
    public function store(Request $request)
    {
        $request->validate([
            'brandName' => 'required|string',
            'price' => 'required|integer',
            'description' => 'required|string',
            'usersId' => 'required|array'
        ]);
        $user_laptop = new UserLaptop;
        $user_laptop->brand_name = $request->brandName;
        $user_laptop->price = $request->price;
        $user_laptop->description = $request->description;
        $user_laptop->save();
        $user_laptop->users()->sync($request->usersId);
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
    public function update(Request $request, string $id)
    {
        $request->validate([
            'brandName' => 'required|string',
            'price' => 'required|integer',
            'description' => 'required|string',
            'usersId' => 'required|array'
        ]);
        $user_laptop = UserLaptop::findOrFail($id);
        $user_laptop->brand_name = $request->brandName;
        $user_laptop->price = $request->price;
        $user_laptop->description = $request->description;
        $user_laptop->save();
        $user_laptop->users()->sync($request->usersId);
        return response()->json(['success' => true, 'data' => $user_laptop]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
