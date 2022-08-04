<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\api\LoginReq;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\HttpException;


class AuthController extends Controller
{
    public function login(LoginReq $request): \Illuminate\Http\JsonResponse
    {

        $user = User::where('email', $request->get('email'))->firstOrFail();
        if (!Hash::check($request->get('password'), $user -> password)) {
        throw new HttpException('404', 'Некорректный Пароль');
    }
        $token = $user->createToken('Token');
        return response()->json($token, 200);
        //return Auth::user();

    }
}
