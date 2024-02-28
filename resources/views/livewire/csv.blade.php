<div>
    <div
        class="mt-10 border border-gray-400 rounded-3xl d-flex flex-column flex-md-row aai-option-bar justify-content-center align-items-center">
        <form wire:submit.prevent="uploadMember">
            <input wire:model='filename' type="file" class="text-red-600 ">
            @error('filename')
                <span class="text-white error ">{{ $message }}</span>
            @enderror
            <button class="px-2 py-2 text-white bg-red-600 rounded-xl" type="submit">Upload</button>
        </form>
    </div>
    <span class="justify-center ml-40 text-center text-white">Upload members with .csv file only</span>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</div>
