<div class="card-body">
    <form wire:submit.prevent="register" action="#" method="POST" role="form text-left">
        <div class="form-check form-check-info text-left mx-5">
            <label class="form-check-label" for="new-tariff">{{__('site.cabinet.change_tariff')}}</label>
            <select wire:model="tariff_id" class="form-control" name="new-tariff" id="new-tariff" placeholder="Tariffs">
                @foreach ($tariffs as $tariff)
                    @if ($tariff->id == $current_tariff_id)
                        <option disabled value="{{ $tariff->id }}">
                            {{ $tariff->title . ', ' . $tariff->max_speed . ', ' . $tariff->price . ' uah' }}
                        </option>
                    @else
                        <option value="{{ $tariff->id }}">
                            {{ $tariff->title . ', ' . $tariff->max_speed . ', ' . $tariff->price . ' uah' }}
                        </option>
                    @endif
                @endforeach
            </select>
            <div class="text-center">
                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">{{__('site.action.request')}}</button>
            </div>
        </div>
    </form>
</div>
