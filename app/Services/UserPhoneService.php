<?php

namespace App\Services;

use App\Models\UserPhone;
use Illuminate\Http\Request;


class UserPhoneService {
    public function storeOrUpdatePhone (UserPhone $user_phone, Request $request){
        
        $user_phone->brand_name = $request->brandName;
        $user_phone->price = $request->price;
        $user_phone->description = $request->description;
        $user_phone->phone_type = $request->phoneType;
        $user_phone->user_id = $request->userId;
        $user_phone->save();
        return $user_phone;
    }
}
