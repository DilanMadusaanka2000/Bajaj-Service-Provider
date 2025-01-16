<?php

namespace App\Http\Controllers;

use domain\Facades\InventoryFacade;

use Illuminate\Http\Request;

class InventryController extends Controller
{


    public function index()
    {
        return view("SpareParts.Dashboard.inventory");
    }

    public function inventroyForm()
    {
        return view('SpareParts.Dashboard.inventory.inventroy');
    }



    public function store (Request $request)
    {
        InventoryFacade::store($request->all());

    //    $this->task-create($request->all());
         // return redirect-back();
         return redirect()->back()->with('success', 'Spare part added successfully!');
    }



    public function show()
     {

        $response['tasks'] = InventoryFacade::all();
        return view ('SpareParts.Dashboard.inventory.inventry_view')->with($response);
     }

}
