<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Type
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Full Name
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Username
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Phone
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tariff
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Balance
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($individual_clients as $client)
                                    <tr>
                                        <td class="text-center">
                                            <img src="../assets/img/small-logos/logo-individual.svg"
                                                class="avatar avatar-sm" alt="individual">
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $client->first_name . ' ' . $client->last_name }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $client->username }}</p>
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $client->phone }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $client->tariff->title }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $client->balance }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $client->status->title }}</span>
                                        </td>
                                        <td class="text-center">
                                            @if ($client->status->title === 'active')
                                                <div class="form-check form-switch ps-6">
                                                    <input class="form-check-input ms-auto mt-1" type="checkbox"
                                                        id="indiv{{ $client->id }}" checked wire:change="change({{$client->id}}, false, {{$client->status}})"
                                                        value = {{$client->status}} name="input">
                                                </div>
                                            @else
                                                <div class="form-check form-switch ps-6">
                                                    <input class="form-check-input ms-auto mt-1" type="checkbox"
                                                        id="indiv{{ $client->id }}" wire:change="change({{$client->id}}, false, {{$client->status}})"
                                                        value = {{$client->status}} name="input">
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach ($corporate_clients as $client)
                                    <tr wire:key="item-{{ $client->id }}">
                                        <td class="text-center">
                                            <img src="../assets/img/small-logos/logo-corporate.svg"
                                                class="avatar avatar-sm" alt="corporate">
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $client->name }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $client->username }}</p>
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $client->phone }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $client->tariff->title }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $client->balance }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $client->status->title }}</span>
                                        </td>
                                        <td class="text-center">
                                            @if ($client->status->title === 'active')
                                                <div class="form-check form-switch ps-6">
                                                    <input class="form-check-input ms-auto mt-1" type="checkbox"
                                                        id="corp{{ $client->id }}" checked wire:change="change({{$client->id}}, true, {{$client->status}})"
                                                        value = {{$client->status}} name="input">
                                                </div>
                                            @else
                                                <div class="form-check form-switch ps-6">
                                                    <input class="form-check-input ms-auto mt-1" type="checkbox"
                                                        id="corp{{ $client->id }}" wire:change="change({{$client->id}}, true, {{$client->status}})"
                                                        value = {{$client->status}} name="input">
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
