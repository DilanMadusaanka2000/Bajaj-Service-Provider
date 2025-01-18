<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisterSP;

class AuthController extends Controller
{


    public function index(){


    }


    //login function

    public function login(Request $request)
    {
        return view('SpareParts.Login.login');
    }







    public function register(){


    }
}
