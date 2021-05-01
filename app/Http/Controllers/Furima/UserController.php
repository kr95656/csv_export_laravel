<?php

namespace App\Http\Controllers\Furima;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showUsers()
    {
        // $furima_users = DB::connection('mysql_A')->select('select * from users');
        $furima_users = DB::connection('mysql_A')
            ->table('users')
            ->leftJoin('items', 'users.id', '=', 'items.seller_id')
            ->orderBy('items.created_at', 'DESC')
            ->get();
        return view('furima.users')
            ->with('furima_users', $furima_users);
    }
}
