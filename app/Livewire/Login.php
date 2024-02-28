<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{
    public $password = '';
    public $email = '';
    public $showPassword = false; // Add showPassword property
    public function togglePasswordVisibility()
    {
        $this->showPassword = !$this->showPassword; // Toggle showPassword value
    }
    protected $rules = [
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:8|max:12',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function login()
    {
        $this->validate();
        // $user = $this->email;
        $user = User::where('email', $this->email)->first();
        if ($user) {
            if (Hash::check($this->password, $user->password)) {
                Auth::login($user);
                return redirect()->to('/dashboard');
            } else {
                // Password is incorrect, display an error message
                $this->addError('password', 'Invalid password.');
            }
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
