<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpareParts;
use App\Models\Order;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class SparePartsController extends Controller
{
    // public function index(){

    //     return view('SpareParts.HomePage.homepage');


    // }


    public function index()
{
    $spareParts = SpareParts::all(); // Fetch all spare parts
    return view('SpareParts.HomePage.homepage', compact('spareParts')); // Pass data to the view
}


    public function show($id)
    {
        $sparePart = SpareParts::findOrFail($id);// Fetch the spare part by ID
        return view('SpareParts.HomePage.buy.spare_parts_buy', compact('sparePart')); // Pass data to the detail view
    }


    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone' => 'required|digits:10',
        'postal_code' => 'required|digits:5',
        'quantity' => 'required|integer|min:1',
        'sparePart_id' => 'required|integer|exists:spare_parts,spareParts_id',
    ]);

    // Remove dd and add logging for debugging
    \Log::info($validated);

    //dd($validated);

    Order::create([
        // 'customer_id' => auth()->id(),

        'name' => $validated['name'],
        'address' => $validated['address'],
        'phone' => $validated['phone'],
        'postal_code' => $validated['postal_code'],
        'spare_part_name' => $validated['name'],
        'status' => 'pending',
        'spareParts_id' => $validated['sparePart_id'],
        'quantity' => $validated['quantity'],

    ]);

    return redirect()->back()->with('success', 'Order placed successfully!');
}




   public function login(){



   }

   public function register(){


   }





   public function addComment(Request $request, $spareParts_id)
   {
       // Validate the input
       $request->validate([
           'comment' => 'required|string|max:1000',
       ]);

       // Create a new comment
       $comment = new Comment();
       $comment->spareParts_id = $spareParts_id;
       $comment->user_id = Auth::id(); // Optionally use auth if the user is logged in
       $comment->comment = $request->comment;
       $comment->save();

       // Redirect back to the product page with a success message
       return redirect()->route('spareparts.comments', ['spareParts_id' => $spareParts_id])
                        ->with('success', 'Your comment has been added.');
   }



}
