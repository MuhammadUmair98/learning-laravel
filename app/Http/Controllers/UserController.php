<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);
        $user = User::create($request->all());
        return response()->json(['success' => true, 'data' => $user]);
    }

    public function show(int $id)
    {
        $user = User::findOrFail($id);
        return response()->json(['data' => $user]);
    }

    public function index()
    {
        $users = User::get();
        $data = $users->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'userPhones' => $user->userPhones
            ];
        });
        return response()->json(['data' => $data]);
    }

    public function destroy(int $id)
    {
        $user = User::findOrFail($id);
        if (isset($user->userPhones)) {
            $user->userPhones()->delete();
        }
        $user->delete();

        return response()->json(['success' => true]);
    }
}
