<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('SpareParts.Dashboard.order');
    }


    public function showorder()
    {
        $tasks = order::all(); // Fetch all spare parts
        return view('SpareParts.Dashboard.Order.view_order', compact('tasks')); // Pass data to the view
    }



}
