<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use UserResource;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Routing\Controller as BaseController;

class AuthController extends Controller
{
    public function __invoke()
    {
        return new UserResource(Auth::user());
    }
}
