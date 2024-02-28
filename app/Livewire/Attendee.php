<?php

namespace App\Livewire;

use App\Models\Member;
use Livewire\Component;
use App\Models\Attendance;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Attendee extends Component
{
    // public $attendees;
    public $isLoading = true;

    use WithPagination;


    public $search = '';
    // public function mount(Attendance $attendance)
    // {
    //     $this->fetchAttendees();
    // }
    // function fetchAttendees()
    // {
    //     $this->attendees = Attendance::where('member_id', 'like', '%' . $this->search . '%')->cursorPaginate(10)->reverse();
    //     $this->isLoading = false;
    // }


    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        $startOfWeek = now()->startOfWeek()->format('Y-m-d');
        $endOfWeek = now()->endOfWeek()->format('Y-m-d');
        // return view('livewire.attendee', [
        //     'attendees' => Attendance::whereHas('member', function ($query) {
        //     $query->where('name', 'like', '%' . $this->search . '%')
        //           ->orWhere('phone', 'like', '%' . $this->search . '%');
        // })->cursorPaginate(10),
        //     // 'attendees' => Attendance::where('member_id', 'like', '%' . $this->search . '%')->cursorPaginate(10),
        // ]);
        if ($this->search == 'LastWednesday') {
            // Search for last Wednesday of the current month
            $lastWednesday = now()->endOfMonth()->previous('Wednesday')->format('Y-m-d');
            $attendees = Attendance::whereDate('created_at', $lastWednesday)->cursorPaginate(10);
        } elseif ($this->search == 'LastSunday') {
            // Search for second Sunday of the current month
            $lastDayOfMonth = now()->endOfMonth();
            $lastSunday = $lastDayOfMonth->subDays($lastDayOfMonth->dayOfWeek)->format('Y-m-d');
            $attendees = Attendance::whereDate('created_at', $lastSunday)->cursorPaginate(10);
        } elseif ($this->search == 'TodaysAbsentees') {
           
            $attendees =
            Member::leftJoin('attendances', 'members.id', '=', 'attendances.member_id')
            ->whereNull('attendances.member_id')
            ->whereBetween('members.created_at', [$startOfWeek, $endOfWeek])
            ->select('members.*', DB::raw("'Absent' as status"))
            ->orderBy('members.created_at', 'asc') // Example sorting, you can change it as per your requirement
            ->get();
            info($attendees);
            // $secondSunday = now()->firstOfMonth()->modify('first sunday of this month +1 week')->format('Y-m-d');
            // $attendees = Attendance::whereDate('created_at', $secondSunday)->cursorPaginate(10);
        } else {
            // Default search by name or phone
            $attendees = Attendance::whereHas('member', function ($query) use ($startOfWeek, $endOfWeek) {
                $query->where(function ($innerQuery) {
                    $innerQuery->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%');
                });
            })
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->cursorPaginate(10);
        }
        return view('livewire.attendee', compact('attendees'));
    }
}
