<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12 col-xl-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-0">{{ __('site.cabinet.profile_info.header') }}</h6>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="#">
                                <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="{{ __('site.action.edit_profile') }}"
                                    wire:click="showEditInfoPage"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @if ($editInfoPageShow)
                    <div class="card-body p-3">
                        @livewire('personal-cabinet-edit-client', ['client' => $individual_client])
                    </div>
                @else
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                    class="text-dark">{{ __('site.cabinet.profile_info.first_name') }}:</strong>
                                &nbsp; {{ $individual_client->first_name }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                    class="text-dark">{{ __('site.cabinet.profile_info.last_name') }}:</strong>
                                &nbsp; {{ $individual_client->last_name }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                    class="text-dark">{{ __('site.cabinet.profile_info.phone') }}:</strong>
                                &nbsp; {{ $individual_client->phone }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                    class="text-dark">{{ __('site.cabinet.profile_info.email') }}:</strong>
                                &nbsp; {{ $individual_client->e_mail }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                    class="text-dark">{{ __('site.cabinet.profile_info.address') }}:</strong>
                                &nbsp; {{ $individual_client->address }}</li>
                        </ul>

                    </div>
                @endif
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">{{ __('site.cabinet.finances.header') }}</h6>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                class="text-dark">{{ __('site.cabinet.finances.balance') }}:</strong>
                            &nbsp; {{ $individual_client->balance }} uah</li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                class="text-dark">{{ __('site.cabinet.finances.tariff_cost') }}:</strong>
                            &nbsp; {{ $individual_client->tariff->price }} uah</li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                class="text-dark">{{ __('site.cabinet.finances.additional_options_cost') }}:</strong>
                            &nbsp; {{ number_format($additional_options_cost, 2) }} uah</li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                class="text-dark">{{ __('site.cabinet.finances.remains') }}:
                            </strong>
                            &nbsp;
                            {{ number_format($individual_client->balance - $individual_client->tariff->price - $additional_options_cost, 2) }}
                            uah
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">{{ __('site.cabinet.internet_connection.header') }}</h6>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                class="text-dark">{{ __('site.cabinet.internet_connection.my_username') }}:</strong>
                            &nbsp; {{ $individual_client->username }}</li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                class="text-dark">{{ __('site.cabinet.internet_connection.providers_phone') }}:</strong>
                            &nbsp; +380443355990</li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                class="text-dark">{{ __('site.cabinet.internet_connection.providers_email') }}:
                            </strong>
                            &nbsp; info@provider.com.ua</li>
                    </ul>
                </div>

            </div>
        </div>

    </div>
</div>
