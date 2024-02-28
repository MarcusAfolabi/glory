<div>
    {{-- <div wire:loading wire:target="fetchMembers">
        <div class="spinner"></div>
    </div>
    <div wire:loading.remove> --}}
    {{-- <form wire:model.live="qrcode" > --}}
    <form>
        <div class="flex justify-between gap-2">
            <input wire:model.live="search" type="search" class="mb-3 form-control" placeholder="Search by name or phone">
            <button type="submit" class="w-2/3 mb-3 text-white form-control border-red-50">Generate QR Code</button>
        </div>
    </form>
    @if ($selectedMemberId)
        {{-- To edit member form  --}}
        <form wire:submit.prevent='updateMember'>
            <div class="flex justify-between gap-2">
                <input type="text" wire:model.live="name" class="mb-3 form-control">
                <input type="email" wire:model.live="email" class="mb-3 form-control">
                <input type="tel" wire:model.live="phone" class="mb-3 form-control">
                <input type="text" id="address" wire:model.live="address" class="mb-3 form-control">
                <button type="submit"
                    class="justify-end w-1/12 px-1 py-1 text-white bg-blue-500 rounded-lg h-9 text-end">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                    </svg>
                </button>
            </div>
        </form>
    @endif
    <div class="rounded-2xl table-responsive">
        <table class="table table-auto table-bordered table-striped">
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
                            <button wire:click="editMember({{ $member->id }})"
                                class="btn btn-primary btn-sm">Edit</button>
                            <button wire:click="deleteMember({{ $member->id }})"
                                onclick="if (!confirm('Are you sure you want to delete this member?')) return false;"
                                class="btn btn-danger btn-sm">Delete</button>
                            {{-- <button onclick="confirmDelete({{ $member->id }})"
                                class="btn btn-danger btn-sm">Delete</button>

                            <script>
                                function confirmDelete(memberId) {
                                    if (confirm('Are you sure you want to delete this member?')) {
                                        Livewire.emit('deleteMember', memberId);
                                    }
                                }
                            </script> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $members->links() }}

    </div>
</div>
{{-- <style>
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
    </style> --}}
{{-- </div> --}}
