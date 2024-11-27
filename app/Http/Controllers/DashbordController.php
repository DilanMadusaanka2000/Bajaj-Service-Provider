<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleMaintain;

class DashbordController extends Controller
{
    //

    protected $task;
    public function __construct()
    {
        $this->task = new VehicleMaintain();
    }




    public function index(){

        return view ('dashboard1');
    }



    //maintain request see

    public function maintainrequest(){


        $response['tasks']= $this->task->all();
        //dd($response);

        return view('dashboard1.maintainRequest')->with($response);

    }
}
