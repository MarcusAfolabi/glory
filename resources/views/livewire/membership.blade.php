<div>
    <form wire:submit.prevent='saveMember' class="max-w-xl mx-auto mt-6 sm:mt-14">
        <div class="row g-3">
            <div class="col-lg-6">
                <div class="aai-form-container">
                    <input type="text" wire:model.live="name" class="shadow-none form-control"
                        placeholder="First Name" />
                </div>
                @error('name')
                    <em class="text-xs text-danger">{{ $message }}</em>
                @enderror
            </div>
            <div class="col-lg-6">
                <div class="aai-form-container">
                    <input type="tel" wire:model.live="phone" maxlength="11" class="shadow-none form-control"
                        placeholder="Phone no" />
                </div>
                @error('phone')
                    <em class="text-xs text-danger">{{ $message }}</em>
                @enderror
            </div>
            <div class="col-lg-12">
                <div class="aai-form-container">
                    <input type="email" name="email" wire:model.live="email" class="shadow-none form-control"
                        placeholder="Email" />
                </div>
                @error('email')
                    <em class="text-xs text-danger">{{ $message }}</em>
                @enderror
            </div>
            <div class="col-lg-12">
                <div class="aai-form-container">
                    <input type="text" wire:model.live="address" class="shadow-none form-control"
                        placeholder="Address" />
                </div>
                @error('address')
                    <em class="text-xs text-danger">{{ $message }}</em>
                @enderror
            </div>

            <div class="col-lg-12">
                <div class="d-grid">
                    <button type="submit" wire:loading.attr="disabled" class="text-white aai-btn btn-pill-solid">
                        <span wire:loading wire:target="saveMember">Adding...</span>
                        <span wire:loading.remove> Add Up</span>
                    </button>

                </div>
            </div>
        </div>
        @if ($successMessage)
            <div class="mt-4 text-green-600">{{ $successMessage }}</div>
        @endif
    </form>
</div>
