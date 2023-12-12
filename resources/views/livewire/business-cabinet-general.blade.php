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
                        @livewire('business-cabinet-edit-client', ['client' => $corporate_client])
                    </div>
                @else
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                    class="text-dark">{{ __('site.cabinet.profile_info.company_name') }}:</strong>
                                &nbsp; {{ $corporate_client->name }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                    class="text-dark">{{ __('site.cabinet.profile_info.crn') }}:</strong>
                                &nbsp; {{ $corporate_client->crn }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                    class="text-dark">{{ __('site.cabinet.profile_info.phone') }}:</strong>
                                &nbsp; {{ $corporate_client->phone }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                    class="text-dark">{{ __('site.cabinet.profile_info.email') }}:</strong>
                                &nbsp; {{ $corporate_client->e_mail }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                    class="text-dark">{{ __('site.cabinet.profile_info.address') }}:</strong>
                                &nbsp; {{ $corporate_client->address }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                    class="text-dark">{{ __('site.cabinet.profile_info.company_representative') }}:</strong>
                                &nbsp; {{ $corporate_client->contact_name }}</li>
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
                            &nbsp; {{ $corporate_client->balance }} uah</li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                class="text-dark">{{ __('site.cabinet.finances.tariff_cost') }}:</strong>
                            &nbsp; {{ $corporate_client->tariff->price }} uah</li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                class="text-dark">{{ __('site.cabinet.finances.additional_options_cost') }}:</strong>
                            &nbsp; {{ number_format($additional_options_cost, 2) }} uah</li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                class="text-dark">{{ __('site.cabinet.finances.remains') }}:
                            </strong>
                            &nbsp;
                            {{ number_format($corporate_client->balance - $corporate_client->tariff->price, 2) }} uah
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
                            &nbsp; {{ $corporate_client->username }}</li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                class="text-dark">{{ __('site.cabinet.internet_connection.providers_phone') }}:</strong>
                            &nbsp; +380443355990</li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                class="text-dark">{{ __('site.cabinet.internet_connection.providers_email') }}:
                            </strong>
                            &nbsp; info@provider.com.ua</li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                class="text-dark">{{ __('site.cabinet.internet_connection.your_personal_manager') }}:</strong>
                            &nbsp; Alisha +380443355999</li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><a
                                href="http://api.2ip.me/api-speedtest/en/" target="_blank"
                                rel="noopener noreferrer">{{ __('site.cabinet.internet_connection.test_speed') }}</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

    </div>
</div>
