<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AddFirebaseRequest;
use App\Http\Requests\Api\AuthRequest;
use App\Http\Requests\Api\UpdateProfileRequest;
use App\Http\Resources\Api\AuthResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        $data = $request->validated();
        if (!in_array($data['phone'], User::pluck('phone')->toArray())) {
            return failedResponse(Lang::get('phone_not_correct'));
        }

        $user = User::firstWhere([
              'phone' => $data['phone'],
        ]);

        if (!$user) return failedResponse(Lang::get('user_not_found'));

        $credentials = $request->only('phone', 'password');
        if (Auth::attempt($credentials)) {
                  $request->firebase_token ?? $user->update(['firebase_token' => $request->firebase_token]);
            $user->token = $user->createToken('village_diet')->plainTextToken;
            return successResponse(AuthResource::make($user), message: "login successfully");
        } else {
            return failedResponse(Lang::get('user_not_found'));
        }
    }


    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'successfully_logged_out']);
    }

    public function addFirebaseToUser(AddFirebaseRequest $request)
    {
        $data = $request->validated();
        auth()->user()->update(['firebase_token' => $data['firebase_token']]);
        return successResponse(AuthResource::make(auth()->user()), message: trans('updated_successfully'));
    }
}
