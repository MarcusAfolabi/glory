<?php

namespace App\Livewire;

use App\Models\Member;
use Livewire\Component;

class Membership extends Component
{
    public $phone;
    public $name;
    public $email;
    public $address;
    public $successMessage = '';
    public $isLoading = false;
    public $members = '';
    protected $rules = [
        'name' => 'required|min:4|max:50',
        'phone' => 'required|numeric|min:11|unique:members,phone',
        'email' => 'required|email|unique:members,email',
        'address' => 'required|string',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    function mount()
    {
        $this->fetchMembers();
    }

    function fetchMembers()
    {
        $this->members = Member::all()->reverse();
    }

    public function saveMember()
    {
        $this->validate();

        // Membership::create(
        //     $this->only(['phone', 'name', 'email', 'address'])
        // );
        Member::create([
            'phone' => $this->phone,
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
        ]);
        $this->successMessage = 'Member information saved successfully.';
        $this->reset(['phone', 'name', 'email', 'address']);
        $this->fetchMembers();
    }

    public static function search($keyword)
    {
        return static::where('name', 'like', '%' . $keyword . '%')
            ->orWhere('email', 'like', '%' . $keyword . '%')
            ->orWhere('phone', 'like', '%' . $keyword . '%')
            ->orWhere('address', 'like', '%' . $keyword . '%');
    }
    
    public function render()
    {
        return view('livewire.membership');
    }
}
