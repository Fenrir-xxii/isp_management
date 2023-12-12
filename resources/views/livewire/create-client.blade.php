<div class="card-body">

    <form wire:submit.prevent="register" action="#" method="POST" role="form text-left">
        <div class="form-check form-check-info text-left">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" wire:model="isCorporate">
            <label class="form-check-label" for="flexCheckDefault">
                Corporate client<a href="javascript:;" class="text-dark font-weight-bolder"></a>
            </label>
        </div>
        @if ($isCorporate)
            <div class="mb-3">
                <div class="@error('company_name') border border-danger rounded-3  @enderror">
                    <input wire:model="company_name" type="text" class="form-control" placeholder="Company Name" aria-label="company_name"
                        aria-describedby="email-addon">
                </div>
                @error('company_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="@error('company_crn') border border-danger rounded-3  @enderror">
                    <input wire:model="company_crn" type="text" class="form-control"
                        placeholder="Company Registration Number" aria-label="company_crn"
                        aria-describedby="email-addon">
                </div>
                @error('company_crn')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="@error('company_address') border border-danger rounded-3 @enderror">
                    <input wire:model="company_address" type="text" class="form-control" placeholder="Address" aria-label="company_address"
                        aria-describedby="email-addon">
                </div>
                @error('company_address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="@error('company_phone') border border-danger rounded-3 @enderror">
                    <input wire:model="company_phone" type="text" class="form-control" placeholder="Phone" aria-label="company_phone"
                        aria-describedby="email-addon">
                </div>
                @error('company_phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="@error('company_email') border border-danger rounded-3 @enderror">
                    <input wire:model="company_email" type="email" class="form-control" placeholder="Email" aria-label="company_email"
                        aria-describedby="email-addon">
                </div>
                @error('company_email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="@error('company_balance') border border-danger rounded-3 @enderror">
                    <input wire:model="company_balance" type="number" class="form-control" placeholder="Balance" aria-label="company_balance"
                        aria-describedby="email-addon">
                </div>
                @error('company_balance')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="@error('company_username') border border-danger rounded-3  @enderror">
                    <input wire:model="company_username" type="text" class="form-control" placeholder="Username (connection)" aria-label="company_username"
                        aria-describedby="email-addon">
                </div>
                @error('company_username')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="@error('company_contact') border border-danger rounded-3 @enderror">
                    <input wire:model="company_contact" type="text" class="form-control" placeholder="Contact Person" aria-label="company_contact"
                        aria-describedby="email-addon">
                </div>
                @error('company_contact')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="@error('company_tariff') border border-danger rounded-3 @enderror">
                    <select wire:model="company_tariff" class="form-control">
                        @foreach($tariffs as $tariff)
                            <option value="{{$tariff->id}}">{{$tariff->title . ": " . $tariff->max_speed}}</option>
                        @endforeach
                    </select>
                </div>
                @error('company_tariff')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

           
        @else
            <div class="mb-3">
                <div class="@error('individual_first_name') border border-danger rounded-3  @enderror">
                    <input wire:model="individual_first_name" type="text" class="form-control" placeholder="First Name" aria-label="individual_first_name"
                        aria-describedby="email-addon">
                </div>
                @error('individual_first_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="@error('individual_last_name') border border-danger rounded-3  @enderror">
                    <input wire:model="individual_last_name" type="text" class="form-control" placeholder="Last Name" aria-label="individual_last_name"
                        aria-describedby="email-addon">
                </div>
                @error('individual_last_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="@error('individual_age') border border-danger rounded-3 @enderror">
                    <input wire:model="individual_age" type="number" class="form-control" placeholder="Age" aria-label="individual_age"
                        aria-describedby="email-addon">
                </div>
                @error('individual_age')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="@error('individual_address') border border-danger rounded-3 @enderror">
                    <input wire:model="individual_address" type="text" class="form-control" placeholder="Address" aria-label="individual_address"
                        aria-describedby="email-addon">
                </div>
                @error('individual_address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="@error('individual_phone') border border-danger rounded-3 @enderror">
                    <input wire:model="individual_phone" type="text" class="form-control" placeholder="Phone" aria-label="individual_phone"
                        aria-describedby="email-addon">
                </div>
                @error('individual_phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="@error('individual_email') border border-danger rounded-3 @enderror">
                    <input wire:model="individual_email" type="email" class="form-control" placeholder="Email" aria-label="individual_email"
                        aria-describedby="email-addon">
                </div>
                @error('individual_email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="@error('individual_balance') border border-danger rounded-3 @enderror">
                    <input wire:model="individual_balance" type="number" class="form-control" placeholder="Balance" aria-label="individual_balance"
                        aria-describedby="email-addon">
                </div>
                @error('individual_balance')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="@error('individual_username') border border-danger rounded-3  @enderror">
                    <input wire:model="individual_username" type="text" class="form-control" placeholder="Username (connection)" aria-label="individual_username"
                        aria-describedby="email-addon">
                </div>
                @error('individual_username')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="@error('individual_tariff') border border-danger rounded-3 @enderror">
                    <select wire:model="individual_tariff" class="form-control">
                        @foreach($tariffs as $tariff)
                            <option value="{{$tariff->id}}">{{$tariff->title . ": " . $tariff->max_speed}}</option>
                        @endforeach
                    </select>
                </div>
                @error('individual_tariff')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        @endif
        <div class="text-center">
            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Create</button>
        </div>
    </form>

</div>
