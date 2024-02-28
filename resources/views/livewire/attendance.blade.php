<div>
    <div class="text-center aai-form-header d-flex justify-content-center flex-column align-items-center">
        <p class="aai-form-desc ">{{ $name }}, You're welcome to church</p>
    </div>

    <form wire:submit.prevent='attendance' class="max-w-xl mx-auto mt-6 sm:mt-14">
        <div class="row g-3">
            <div class="col-lg-12">
                <div class="d-grid">
                    <button type="submit" wire:loading.attr="disabled" class="text-white aai-btn btn-pill-solid">
                        <span wire:loading wire:target="saveMember">Adding...</span>
                        <span wire:loading.remove> In Church</span>
                    </button>

                </div>
            </div>
        </div>
        @if ($successMessage)
            <div class="mt-4 text-green-600">{{ $successMessage }}</div>
        @endif
    </form>
</div>
