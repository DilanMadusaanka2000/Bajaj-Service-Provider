<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserManagmentController extends Controller
{
    public function index()
    {

        return view('SpareParts.Dashboard.user');
    }
    public function addpage()
    {

        return view('SpareParts.Dashboard.User.add_user');
    }
}
