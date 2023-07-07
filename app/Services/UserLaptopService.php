<?php

namespace App\Services;

use App\Models\UserLaptop;
use Illuminate\Http\Request;

class UserLaptopService
{
    public function storeOrUpdateLaptop(UserLaptop $user_laptop, Request $request)
    {
        $user_laptop->brand_name = $request->brandName;
        $user_laptop->price = $request->price;
        $user_laptop->description = $request->description;
        $user_laptop->save();
        $user_laptop->users()->sync($request->usersId);
        return $user_laptop;
    }
}
