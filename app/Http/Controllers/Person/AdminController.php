<?php

namespace App\Http\Controllers\Person;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function __invoke()
    {
        $people = User::all();
        return $people;
    }
}
