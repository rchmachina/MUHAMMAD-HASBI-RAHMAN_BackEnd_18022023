<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class usersController extends Controller
{
    public function index()
    {        
        $user = DB::table('users')->get();
        return view('datanasabah')->with('user',$user);
    }

    public function create()
    {
        return view('adddatanasabah');
    }

    public function postnasabah(Request $request)
    {
        DB::table('users')->insert([
            'userName' => $request->userName,
            

        ]);
        return redirect("/");
    }
}
