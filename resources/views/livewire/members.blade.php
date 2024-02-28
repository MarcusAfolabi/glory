<div>
    <div wire:loading wire:target="fetchMembers">
        <div class="spinner"></div>
    </div>
    <div wire:loading.remove>
        <input type="text" wire:model.live="search" class="mb-3 form-control" placeholder="Search...">

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->phone }}</td>
                            <td>{{ $member->address }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm">Edit</button>
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <style>
        .spinner {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-left-color: #6cb2eb;
            /* Change this to your desired color */
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</div>
