<div class="card-body">
    {{__('site.cabinet.fill_up_balance')}}:
    <form wire:submit.prevent="checkout" action="#" method="POST" role="form text-left">
        <div class="form-group">
            <div class="mb-3">
                <div class="@error('amount') border border-danger rounded-3 @enderror">
                    <input wire:model="amount" type="number" class="form-control" placeholder={{__('site.cabinet.amount')}}
                        aria-label="amount" aria-describedby="email-addon">
                </div>
                @error('amount')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="@error('description') border border-danger rounded-3  @enderror">
                    <input wire:model="description" type="text" class="form-control" placeholder={{__('site.cabinet.description')}}
                        aria-label="description" aria-describedby="email-addon">
                </div>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="py-3">
            <button type="submit" class="btn bg-gradient-success">{{__('site.action.checkout')}}</button>
        </div>
    </form>
    {{__('site.cabinet.payment_history')}}
    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">{{__('site.cabinet.table.date')}}
                        </th>
                        <th
                            class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7 ps-2">
                            {{__('site.cabinet.table.balance_before')}}</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            {{__('site.cabinet.table.amount')}}</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            {{__('site.cabinet.table.balance_after')}}</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($individual_client->payments() as $payment) --}}
                    @foreach ($payments as $payment)
                        <tr>
                            <td class="align-middle text-center">
                                <p class="text-xs font-weight-bold mb-0">{{$payment->datetime}}</p>
                            </td>
                            <td class="align-middle text-sm text-center">
                                <p class="text-xs font-weight-bold mb-0">{{$payment->balance_before}}</p>
                            </td>
                            <td class="align-middle text-sm text-center">
                                @if($payment->amount < 0)
                                    <span class="badge bg-danger">{{$payment->amount}}</span>
                                    {{-- <p class="text-xs font-weight-bold mb-0 text-danger">{{$payment->amount}}</p> --}}
                                @else
                                    <span class="badge bg-success">{{$payment->amount}}</span>
                                    {{-- <p class="text-xs font-weight-bold mb-0 text-success">{{$payment->amount}}</p> --}}
                                @endif
                            </td>
                            <td class="align-middle text-center">
                                <p class="text-xs font-weight-bold mb-0">{{$payment->balance_after}}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</div>
