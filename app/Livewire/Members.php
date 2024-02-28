<?php

namespace App\Livewire;

use App\Models\Member;
use Livewire\Component;

class Members extends Component
{
    public $members = [];
    public $isLoading = true;
    public $search = '';


    public function mount()
    {
        $this->fetchMembers();
    }

    function fetchMembers()
    {
        $this->members = Member::all()->reverse();
        $this->isLoading = false;
    }


    public function render()
    {
        return view('livewire.members', [
            'members' => Member::search($this->search)->get(),
        ]);

        // return view('livewire.members', ['members' => $members]);
    }
}
