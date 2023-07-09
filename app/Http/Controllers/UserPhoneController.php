<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneFormRequest;
use App\Models\UserCharger;
use App\Models\UserPhone;
use App\Services\UserPhoneService;
use Illuminate\Http\Request;

class UserPhoneController extends Controller
{

    private $user_phone_service;

    function __construct(UserPhoneService $userPhoneService)
    {
        $this->user_phone_service = $userPhoneService;
    }

    public function store(PhoneFormRequest $request)
    {

        $user_phone = new UserPhone;
        $user_phone = $this->user_phone_service->storeOrUpdatePhone($user_phone, $request);
        return response()->json(['success' => true, 'data' => $user_phone]);
    }

    public function update(PhoneFormRequest $request, int $id)
    {

        $user_phone =  UserPhone::findOrFail($id);
        $user_phone = $this->user_phone_service->storeOrUpdatePhone($user_phone, $request);
        return response()->json(['success' => true, 'data' => $user_phone]);
    }


    public function index()
    {
        $user_phones = UserPhone::get();
        $data = $user_phones->map(function ($user_phone) {
            return [
                'name' => $user_phone->brand_name,
                'user' => $user_phone->user
            ];
        });

        return response()->json(['data' => $data]);
    }


    public function storeCharger(Request $request)
    {
        $request->validate([
            "phoneId" => 'required|exists:user_phones,id',
            "name" => 'required|string',
        ]);

        $user_phone = UserPhone::find($request->phoneId);
        $user_charger = new UserCharger();
        $user_charger->name = $request->name;
        $user_phone->phoneCharger()->save($user_charger);
        return response()->json(['success' => true, 'data' => $user_charger]);
    }
}
