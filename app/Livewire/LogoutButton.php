<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LogoutButton extends Component
{
    public function logout()
    {
        Auth::logout(); // Log out user
        session()->invalidate(); // Invalidate session
        session()->regenerateToken(); // Regenerate CSRF token

        return redirect('/welcome'); // Redirect after logout
    }

    public function render()
    {
        return view('livewire.logout-button');
    }
}
