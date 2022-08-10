<?php

namespace App\Http\Controllers;

use App\Http\Requests\api\RegisterReq;
use App\Models\User;
use App\Http\Requests\api\LoginReq;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Validator;
//use Illuminate\Contracts\Validation\Validator;
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
        $is_admin = $user->is_admin;
        $name = $user->name;
        return response()->json(array_merge_recursive(['Token'=> $token], ['is_admin'=> $is_admin], ['name'=> $name]), 200);
        //return Auth::user();

    }

    public function register(RegisterReq $request): \Illuminate\Http\JsonResponse
    {

//        protected function validator(array $request)
//    {
//        return Validator::make($request, [
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
//        ]);
//    }
           $user = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'is_admin' => $request->get('is_admin'),
            ]);

            $token = $user->createToken('Token');
            $is_admin = $user->is_admin;
            return response()->json(array_merge_recursive(['Token'=> $token], ['is_admin'=> $is_admin]), 200);

    }


}
