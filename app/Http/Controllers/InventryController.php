<?php

namespace App\Http\Controllers;

use domain\Facades\InventoryFacade;

use Illuminate\Http\Request;
use App\Models\SpareParts;

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



    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|string',
        'price' => 'required|numeric',
        'discount' => 'required|numeric',
        'stock' => 'required|integer',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('spare_parts', 'public');
        $validatedData['image'] = $imagePath;
    }

    // Check if this is an update or a new record
    $sparePartsId = $request->input('id');
    InventoryFacade::store($validatedData, $sparePartsId);

    $message = $sparePartsId ? 'Spare part updated successfully!' : 'Spare part added successfully!';
    return redirect()->route('inventory')->with('success', $message);
}









    public function show()
     {

        // $response['tasks'] = InventoryFacade::all();
        // return view ('SpareParts.Dashboard.inventory.inventry_view')->with($response);


        $response['tasks'] = InventoryFacade::all();
        return view('SpareParts.Dashboard.inventory.inventry_view')->with($response);



     }




     //update

     public function updateView($spareParts_id)
     {
         $task = InventoryFacade::find($spareParts_id); // Correctly fetch the task
         if (!$task) {
             return redirect()->route('inventory')->with('error', 'Item not found.');
         }
         return view('SpareParts.Dashboard.inventory.update.inventory_update', compact('task'));
     }






//low quantity


// In InventryController.php
public function quantity()
{
    // Fetch spare parts with stock less than 10
    $lowStockItems = SpareParts::where('stock', '<',10)->get();

    // Pass the low stock items to the view
    return view('SpareParts.Dashboard.inventory.low_stock_alert', compact('lowStockItems'));
}





}
