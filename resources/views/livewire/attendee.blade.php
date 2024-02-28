<div>
    <div class="flex justify-between gap-4">
        <input wire:model.live="search" type="search" class="mb-2 form-control" placeholder="Search by name or phone">
        <select wire:model.live="search" class="w-1/4 mb-2 form-control">
            <option value="" selected hidden>Select by Day</option>
            <option value="LastWednesday">Last Wednesday</option>
            <option value="LastSunday">Last Sunday</option>
            <option value="TodaysAbsentees">Today's Absentees</option>
        </select>
    </div>
    <div class="rounded-2xl table-responsive">
        <table class="table table-auto table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Time</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendees as $member)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $member->member_id ?? $member->name }}</td>
                        <td><a href="tel:{{ $member->member->phone ?? $member->phone }}"
                                class="text-red-900">{{ $member->member->phone ?? $member->phone }}</a></td>
                        <td>{{ $member->member->address ?? $member->address }}</td>
                        <td>{{ $member->created_at->format('g:iA') }}</td>
                        <td>{{ $member->created_at->format('l, jS F Y') }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
