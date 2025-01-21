<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpareParts;
use App\Models\Order;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



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
    //dd($request);

    $this->task->create($request->all());

     return redirect()->route('home');

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
