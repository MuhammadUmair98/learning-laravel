<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneFormRequest;
use App\Models\UserPhone;
use Illuminate\Http\Request;

class UserPhoneController extends Controller
{

    public function store(PhoneFormRequest $request_object)
    {

        $user_phone = new UserPhone;
        $user_phone->brand_name = $request_object->brandName;
        $user_phone->price = $request_object->price;
        $user_phone->description = $request_object->description;
        $user_phone->phone_type = $request_object->phoneType;
        $user_phone->user_id = $request_object->userId;
        $user_phone->save();
        return response()->json(['success' => true, 'data' => $user_phone]);
    }


    public function index()
    {
        // $user_phones = UserPhone::with('user')->get();

        $user_phones = UserPhone::get();
        $data = $user_phones->map(function ($user_phone) {
            return [
                'name' => $user_phone['brand_name'],
                'user' => $user_phone['user'],
            ];
        });

        return response()->json(['data' => $data]);
    }
}
