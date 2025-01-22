<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserManagement;
use App\Models\RegisterSP;

class UserManagmentController extends Controller
{



    protected $task;

    public function __construct()
    {
        $this->task = new UserManagement();
    }


    public function index()
    {
        $UserManagementCount = UserManagement::count();
        return view('SpareParts.Dashboard.user' , [
            'UserManagementCount' => $UserManagementCount,
        ]);
    }
    public function addpage()
    {

        return view('SpareParts.Dashboard.User.add_user');
    }


    // public function register(Request $request){

    //     $this->task->create($request->all());

    //     return redirect()->route('user.add');



    // }

    public function register(Request $request)
{
    // Validate the request to ensure unique email when creating
    $request->validate([
        'email' => 'required|email|unique:user_management,email,' . $request->id, // Allow email to be the same when updating
        'name' => 'required',
        'password' => 'required|confirmed', // Ensure password confirmation
    ]);

    //dd($request);

    // If ID is present (editing user), find the user and update
    if ($request->id) {
        //dd($request);
        $task = $this->task->find($request->id);
        $task->update($request->all());
    } else {
        // Otherwise, create a new user
        $this->task->create($request->all());
    }

    return redirect()->route('user.add');
}





    public function viewUser(){

    $tasks = $this->task->all();

    // Return the view with tasks data
    return view('SpareParts.Dashboard.User.view_user', compact('tasks'));



    }




        public function editPage($id)
        {
            // Fetch the user by ID
            $task = $this->task->findOrFail($id);

            // Pass the user data to the register view for editing
            return view('SpareParts.Dashboard.User.edit_user', compact('task'));
        }



public function destroy($id)
{
    try {
        // Find the user by ID
        $task = $this->task->findOrFail($id);

        // Delete the user
        $task->delete();

        // Redirect back with a success message
        return redirect()->route('view.register')->with('success', 'User deleted successfully!');
    } catch (\Exception $e) {
        // Log the error and redirect back with an error message
        \Log::error('Error deleting user: ' . $e->getMessage());
        return redirect()->route('view.register')->with('error', 'Failed to delete user.');
    }
}


}
