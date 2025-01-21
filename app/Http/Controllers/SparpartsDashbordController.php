<?php



namespace App\Http\Controllers;
use App\Models\VehicleMaintain;
use App\Models\Order;
use App\Models\SpareParts;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\RegisterSP;  // Import the RegisterSP model

class SparpartsDashbordController extends Controller
{
    // Show the login form
    public function login()
    {
        return view('SpareParts.Dashboard.login');
    }

    // Show the dashboard (after login)
    public function index()
    {
        $vehicleMaintainCount = VehicleMaintain::count();
        $ordersCount = Order::count();
        $sparePartsCount = SpareParts::count();

        return view('SpareParts.Dashboard.dashboard', [
            'vehicleMaintainCount' => $vehicleMaintainCount,
            'sparePartsCount' => $sparePartsCount,
            'ordersCount' => $ordersCount, // Fixed the key name
        ]);
    }

    // Handle the login form submission
    public function authenticate(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to find a user with the provided email
        $user = RegisterSP::where('email', $validated['email'])->first();

        // Check if the user exists and the passwords match
        if ($user && $user->password === $validated['password']) {
            // Login success
            return redirect()->route('dashbord.maintain');
        } else {
            // If login fails, reload the login page with an error message
            return back()->withErrors(['login_error' => 'Invalid credentials. Please try again.']);
        }
    }


    // Registration form (not modified in this task)
    public function registration()
    {
        return view('SpareParts.Dashboard.registration');
    }
}
