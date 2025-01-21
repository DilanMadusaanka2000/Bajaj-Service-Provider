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
    public function updateStatus($order_id)
    {
        $task = Order::where('order_id', $order_id)->first();  // Change from find() to where()

        if (!$task) {
            return redirect()->back()->withErrors('Task not found!');
        }

        // Update status logic
        if ($task->status === 'done') {
            $task->status = 'completed';
        } else {
            $task->status = 'done';
        }

        $task->save();

        return redirect()->back()->with('success', 'Status updated successfully!');
    }


    public function searchOrders(Request $request)
    {
        // Get the search query
        $search = $request->input('search');

        // Query the database to find matching records
        $tasks = Order::where('order_id', 'like', "%{$search}%")
            ->orWhere('name', 'like', "%{$search}%")
            ->orWhere('address', 'like', "%{$search}%")
            ->orWhere('phone', 'like', "%{$search}%")
            ->orWhere('postal_code', 'like', "%{$search}%")
            ->orWhere('spare_part_name', 'like', "%{$search}%")
            ->orWhere('spareParts_id', 'like', "%{$search}%")
            ->get();

        // Return the view with the filtered tasks
        return view('SpareParts.Dashboard.Order.view_order', compact('tasks'));
    }





}
