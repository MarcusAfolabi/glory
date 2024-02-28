<?php

namespace App\Livewire;

use App\Models\Member;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Csv extends Component
{
    use WithFileUploads;
    public $filename;

    protected $rules = [
        'filename' => 'required|file|mimes:csv,txt', // Ensure file is a CSV
    ];

    public function uploadMember()
    {
        $this->validate();
        try {
            $path = $this->filename->store('uploads'); // Store the uploaded file
            $file = Storage::get($path); // Get file content
            $rows = array_map('str_getcsv', explode("\n", $file)); // Parse CSV rows

            foreach ($rows as $row) {
                // Assuming the CSV structure is: name, email, phone, address
                $member = new Member([
                    'name' => $row[0],
                    'email' => $row[1],
                    'phone' => $row[2],
                    'address' => $row[3],
                ]);
                $member->save();
                session()->flash('message', 'Member Uploaded Successfully');
                $this->reset();
            }
        } catch (\Throwable $th) {
            // throw $th;
            session()->flash('message', $th->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.csv');
    }
}
