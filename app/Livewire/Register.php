<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $password = '';
    public $name = '';
    public $invitee = '';
    public $email = '';
    public $showPassword = false; // Add showPassword property

    public function togglePasswordVisibility()
    {
        $this->showPassword = !$this->showPassword; // Toggle showPassword value
    }
    protected $rules = [
        'name' => 'required|min:5|max:100',
        'invitee' => 'required|min:5|in:Glory',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|max:12',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function register()
    {
        $this->validate();

        $user = User::create([
            'email' => $this->email,
            'name' => $this->name,
            'invitee' => $this->invitee,
            'password' => Hash::make($this->password),
        ]);
        session()->flash('status', 'User Account created');
        Auth::login($user);
        $this->redirect('/uploadMembers', navigate: true);
    }

    public function render()
    {
        return view('livewire.register');
    }
}
