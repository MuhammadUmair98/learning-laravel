<?php

namespace App\Http\Controllers;

use App\Models\UserPhone;
use Illuminate\Http\Request;

class UserPhoneController extends Controller
{

    public function store(Request $request_object)
    {
        /**if (isset($requestObject->phoneType)) {
            $requestObject->request->add(['phoneType' => strtolower($requestObject->phoneType)]);
        } **/
        $request_object->validate([
            'brandName' => 'required|string',
            'price' => 'required|integer',
            'description' => 'required|string',
            'phoneType' => 'required|in:samsung,apple',
            'userId' => 'required|exists:users,id'
        ]);
        $user_phone = new UserPhone;
        $user_phone->brand_name = $request_object->brandName;
        $user_phone->price = $request_object->price;
        $user_phone->description = $request_object->description;
        $user_phone->phone_type = $request_object->phoneType;
        $user_phone->user_id = $request_object->userId;
        $user_phone->save();
        return response()->json(['success' => true, 'data' => $user_phone]);
    }
}
