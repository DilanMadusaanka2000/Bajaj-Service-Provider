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

        if ($search) {
            $spareParts = SpareParts::where('name', 'like', '%' . $search . '%')->get();
        } else {
            $spareParts = SpareParts::all();
        }

        return view('customerView.sparparts.spareparts_view.homepage', compact('spareParts'));
    }



    public function show($id)
    {
        $sparePart = SpareParts::findOrFail($id);// Fetch the spare part by ID
        return view('customerView.sparparts.buy.spare_parts_buy', compact('sparePart')); // Pass data to the detail view
    }







    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'spareParts_id' => 'required|exists:spare_parts,spareParts_id',
            'quantity' => 'required|integer|min:1',
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|digits:10',
            'postal_code' => 'required|digits:5',
        ]);

        try {
            \DB::beginTransaction();

            // Create the order
            $order = $this->task->create($request->all());

            $sparePart = SpareParts::findOrFail($request->spareParts_id);

            if ($sparePart->stock < $request->quantity) {
                \DB::rollBack();
                return redirect()->back()->with('error', 'Insufficient stock for the selected spare part.');
            }

            $sparePart->stock -= $request->quantity;
            $sparePart->save();

            \DB::commit();

            $userEmail = Auth::user()->email; // Get the logged-in user's email
            // $orderLink = url('/home/spare-parts/order/store/' . $order->id);
            $orderLink = url('/home/spare-parts/order/store/' . ($order->order_id ?? 'null'));


            //dd($orderLink);
            Mail::to($userEmail)->send(new OrderPlacedMail($order, $orderLink));

            // Log success message
            Log::info('Order placed and email sent successfully to: ' . $userEmail);

            return redirect()->route('home')->with('success', 'Order placed successfully! An email has been sent.');
        } catch (Exception $e) {
            // Rollback the transaction if an error occurs
            \DB::rollBack();

            Log::error('Error while placing the order: ' . $e->getMessage());

            return redirect()->route('home')->with('error', 'Something went wrong. Please try again.');
        }
    }


    //update the order

    public function showOrderDetails($order_id)
{
    $order = Order::find($order_id);

    if (!$order) {
       return view("email.order_placed");
    }

    return view('customerView.sparparts.buy.order_update', compact('order'));
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





   //edit and update


   public function editOrder($order_id)
   {
       $order = Order::find($order_id);

       if (!$order) {
           return redirect()->route('home')->with('error', 'Order not found.');
       }

       return view('customerView.sparparts.buy.order_update', compact('order'));
   }



//    public function updateOrder(Request $request, $order_id)
//    {
//        $request->validate([
//            'quantity' => 'required|integer|min:1',
//            'name' => 'required|string',
//            'address' => 'required|string',
//            'phone' => 'required|digits:10',
//            'postal_code' => 'required|digits:5',
//        ]);

//        $order = Order::find($order_id);

//        if (!$order) {
//            return redirect()->route('home')->with('error', 'Order not found.');
//        }

//        $order->update([
//            'quantity' => $request->quantity,
//            'name' => $request->name,
//            'address' => $request->address,
//            'phone' => $request->phone,
//            'postal_code' => $request->postal_code,
//        ]);

//        return redirect()->route('home')->with('success', 'Order updated successfully!');
//    }




}




