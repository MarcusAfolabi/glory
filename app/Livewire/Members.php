<?php

namespace App\Livewire;

use App\Models\Member;
use Livewire\Component;
use Livewire\WithPagination;

class Members extends Component
{
    // public $members = [];
    public $isLoading = true;
    public $search = '';
    public $name;
    public $email;
    public $address;
    public $phone;



    use WithPagination;

    public $selectedMemberId;


    public function editMember($id)
    {
        $member = Member::findOrFail($id);
        $this->name = $member->name;
        $this->email = $member->email;
        $this->phone = $member->phone;
        $this->address = $member->address;
        $this->selectedMemberId = $id;
    }

    // Delete member
    public function deleteMember($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
    }

    public function updateMember()
    {
        $member = Member::findOrFail($this->selectedMemberId);
        $member->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
        ]);

        // Clear form fields after update
        $this->reset(['name', 'email', 'phone', 'address']);
    }

    public function deleteMemberConfirmation($id)
    {
        $this->emit('deleteMember', $id);
    }

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.members', [
            'members' => Member::where('name', 'like', '%' . $this->search . '%')->orWhere('phone', 'like', '%' . $this->search . '%')->cursorPaginate(10),
        ]);
    }
}
