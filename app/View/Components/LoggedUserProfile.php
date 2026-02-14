<?php

namespace App\View\Components;
 
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class LoggedUserProfile extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $user;
    public function __construct($user)
    {
        if (Auth::check()) {
            $this->user = Auth::user();
        } else {
            $this->user = null;
        }
    }


    public function render()
    {
        return view('components.logged-user-profile');

    }
}
