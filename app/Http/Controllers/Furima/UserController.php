<?php

namespace App\Http\Controllers\Furima;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function showUsers()
    {
        return view('furima.users');
    }
}
