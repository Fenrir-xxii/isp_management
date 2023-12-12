<form wire:submit.prevent="register" action="#" method="POST" role="form text-left">
    <div class="mb-3">
        <label for="name" class="form-label">{{ __('site.cabinet.profile_info.company_name') }}:</label>
        <div class="@error('name') border border-danger rounded-3  @enderror">
            <input wire:model="name" type="text" class="form-control" placeholder="{{ __('site.cabinet.profile_info.company_name') }}"
                aria-label="name" aria-describedby="email-addon">
        </div>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="crn" class="form-label">{{ __('site.cabinet.profile_info.crn') }}:</label>
        <div class="@error('crn') border border-danger rounded-3  @enderror">
            <input wire:model="crn" type="text" class="form-control"
                placeholder="{{ __('site.cabinet.profile_info.crn') }}" aria-label="crn"
                aria-describedby="email-addon">
        </div>
        @error('crn')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">{{ __('site.cabinet.profile_info.phone') }}:</label>
        <div class="@error('phone') border border-danger rounded-3 @enderror">
            <input wire:model="phone" type="text" class="form-control" placeholder="{{ __('site.cabinet.profile_info.phone') }}" aria-label="phone"
                aria-describedby="email-addon">
        </div>
        @error('phone')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    {{-- <div class="mb-3">
        <label for="email" class="form-label">{{ __('site.cabinet.profile_info.email') }}:</label>
        <div class="@error('email') border border-danger rounded-3 @enderror">
            <input wire:model="email" type="email" class="form-control" placeholder="{{ __('site.cabinet.profile_info.email') }}" aria-label="email"
                aria-describedby="email-addon">
        </div>
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div> --}}
    <div class="mb-3">
        <label for="company_contact" class="form-label">{{ __('site.cabinet.profile_info.company_representative') }}:</label>
        <div class="@error('company_contact') border border-danger rounded-3 @enderror">
            <input wire:model="company_contact" type="text" class="form-control" placeholder="{{ __('site.cabinet.profile_info.company_representative') }}" aria-label="company_contact"
                aria-describedby="email-addon">
        </div>
        @error('company_contact')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="text-center">
        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">{{ __('site.action.save') }}</button>
    </div>
</form>
