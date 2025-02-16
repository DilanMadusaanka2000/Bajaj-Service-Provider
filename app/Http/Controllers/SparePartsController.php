<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpareParts;
use App\Models\Order;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\OrderPlacedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Exception;



class SparePartsController extends Controller
{


    protected $task;

    public function __construct()
    {
        $this->task = new Order();
    }
    // public function index(){

    //     return view('SpareParts.HomePage.homepage');


    // }

    public function index(Request $request)
    {
        $search = $request->input('search'); // Get search input from request

        // If search input is provided, filter spare parts based on the name
        if ($search) {
            $spareParts = SpareParts::where('name', 'like', '%' . $search . '%')->get();
        } else {
            $spareParts = SpareParts::all(); // Fetch all spare parts if no search query
        }

        return view('SpareParts.HomePage.homepage', compact('spareParts')); // Pass data to the view
    }



    public function show($id)
    {
        $sparePart = SpareParts::findOrFail($id);// Fetch the spare part by ID
        return view('SpareParts.HomePage.buy.spare_parts_buy', compact('sparePart')); // Pass data to the detail view
    }







    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'spareParts_id' => 'required|exists:spare_parts,spareParts_id', // Ensure 'id' matches your database field
            'quantity' => 'required|integer|min:1',
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|digits:10',
            'postal_code' => 'required|digits:5',
        ]);

        try {
            // Start a database transaction
            \DB::beginTransaction();

            // Create the order
            $order = $this->task->create($request->all());

            // Update the stock
            $sparePart = SpareParts::findOrFail($request->spareParts_id);

            if ($sparePart->stock < $request->quantity) {
                // Rollback the transaction and throw an exception if stock is insufficient
                \DB::rollBack();
                return redirect()->back()->with('error', 'Insufficient stock for the selected spare part.');
            }

            // Deduct the ordered quantity from the stock
            $sparePart->stock -= $request->quantity;
            $sparePart->save();

            // Commit the transaction
            \DB::commit();

            // Send email to the logged-in user
            $userEmail = Auth::user()->email; // Get the logged-in user's email
            Mail::to($userEmail)->send(new OrderPlacedMail($order));

            // Log success message
            Log::info('Order placed and email sent successfully to: ' . $userEmail);

            return redirect()->route('home')->with('success', 'Order placed successfully! An email has been sent.');
        } catch (Exception $e) {
            // Rollback the transaction if an error occurs
            \DB::rollBack();

            // Log error details
            Log::error('Error while placing the order: ' . $e->getMessage());

            return redirect()->route('home')->with('error', 'Something went wrong. Please try again.');
        }
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
