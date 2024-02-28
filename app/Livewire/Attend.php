<?php

namespace App\Livewire;

use App\Models\Member;
use Livewire\Component;
use App\Models\Attendance;
use Carbon\Carbon;

class Attend extends Component
{
    public $glory; //id of the member
    public $successMessage = '';
    public $isLoading = false;
    public $name = 'Hmmm';

    public function mount()
    {
        $this->glory = request()->query('glory');

        // Query the users table using the 'id' parameter
        $user = Member::find($this->glory);

        if ($user) {
            $this->name = $user->name;

            // Check if an entry already exists for today's date and member_id
            $existingAttendance = Attendance::where('member_id', $this->glory)
                ->whereDate('created_at', Carbon::today())
                ->exists();

            // If an entry doesn't exist, create a new one
            if (!$existingAttendance) {
                Attendance::create([
                    'member_id' => $this->glory,
                    'status' => 'present',
                ]);
                $this->successMessage = 'Thank you for coming to church!';
            } else {
                // If an entry already exists, set a message indicating so
                $this->successMessage = 'Your attendance had already taken been for today service!';
            }
        } else {
            // If the user does not exist, set a message indicating so
            $this->successMessage = 'Please see the protocol officer to get started.';
        }

        $this->reset(['glory']);
    }
    public function render()
    {
        return view('livewire.attend');
    }
}
