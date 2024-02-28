<div>
    <div class="text-center aai-form-header d-flex justify-content-center flex-column align-items-center">
        <p class="text-green-600 aai-form-desc ">{{ $name }}, {{ $successMessage }}</p>
    </div>

    <form wire:submit.prevent='attendance' class="max-w-xl mx-auto mt-6 sm:mt-14">

        @if ($successMessage)
            <img src="{{ asset('thank-you.gif') }}" alt="Thank You GIF">
            {{-- <div class="mt-4 text-green-600">{{ $successMessage }}</div> --}}
        @endif
    </form>
</div>
