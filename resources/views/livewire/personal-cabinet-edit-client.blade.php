<form wire:submit.prevent="register" action="#" method="POST" role="form text-left">
    <div class="mb-3">
        <label for="first_name" class="form-label">{{ __('site.cabinet.profile_info.first_name') }}:</label>
        <div class="@error('first_name') border border-danger rounded-3  @enderror">
            <input wire:model="first_name" type="text" class="form-control" placeholder="{{ __('site.cabinet.profile_info.first_name') }}"
                aria-label="first_name" aria-describedby="email-addon">
        </div>
        @error('first_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="last_name" class="form-label">{{ __('site.cabinet.profile_info.last_name') }}:</label>
        <div class="@error('last_name') border border-danger rounded-3  @enderror">
            <input wire:model="last_name" type="text" class="form-control" placeholder="{{ __('site.cabinet.profile_info.last_name') }}"
                aria-label="last_name" aria-describedby="email-addon">
        </div>
        @error('last_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">{{ __('site.cabinet.profile_info.phone') }}:</label>
        <div class="@error('phone') border border-danger rounded-3 @enderror">
            <input wire:model="phone" type="text" class="form-control" placeholder="{{ __('site.cabinet.profile_info.phone') }}"
                aria-label="phone" aria-describedby="email-addon">
        </div>
        @error('phone')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    {{-- <div class="mb-3">
        <label for="email" class="form-label">{{ __('site.cabinet.profile_info.email') }}:</label>
        <div class="@error('email') border border-danger rounded-3 @enderror">
            <input wire:model="email" type="email" class="form-control" placeholder="{{ __('site.cabinet.profile_info.email') }}"
                aria-label="email" aria-describedby="email-addon">
        </div>
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div> --}}
    <div class="text-center">
        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">{{ __('site.action.save') }}</button>
    </div>
</form>
