<x-housekeeping-layout>
    @push('title', 'Dashboard')

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body p-4 pb-0 d-flex justify-content-between align-items-start" style="height:180px;">
                    <div>
                        <div class="fs-4 fw-semibold">{{ $registeredUsers }}</div>
                        <div>Users</div>
                    </div>

                    <svg style="height:150px;width: 150px; margin-top: -10px; opacity: 10%;"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path
                            d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body p-4 pb-0 d-flex justify-content-between align-items-start" style="height:180px;">
                    <div>
                        <div class="fs-4 fw-semibold">{{ $vipUsers }}</div>
                        <div>VIP users</div>
                    </div>

                    <svg style="height:150px;width: 150px; margin-top: -10px; opacity: 10%;"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path
                            d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4 ">
                <div class="card-body p-4 pb-0 d-flex justify-content-between align-items-start" style="height:180px;">
                    <div>
                        <div class="fs-4 fw-semibold">{{ $furnitureInCatalog }}</div>
                        <div>items in the catalog</div>
                    </div>

                    <svg style="height:150px;width: 150px; margin-top: -10px; opacity: 10%;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <x-housekeeping.content-table>
                <x-slot:title>
                    Recent users
                </x-slot:title>

                <x-slot:header>
                    <th></th>
                    <th>User</th>
                    <th class="text-center"></th>
                    <th>Motto</th>
                    <th>Last login</th>
                    <th></th>
                </x-slot:header>

                @foreach($users as $user)
                    <tr class="align-middle">
                        <td class="text-center">
                            <div class="avatar avatar-md">
                                <img
                                    src="{{ setting('avatar_imager') }}/{{ $user->look }}&direction=2&head_direction=3&gesture=sml&action=wav&headonly=1"
                                    alt="{{ $user->username }}">
                                <span @class([
                                    'avatar-status',
                                    'bg-success' => $user->online === '1',
                                    'bg-danger' => $user->online === '0',
                                  ])></span>
                            </div>
                        </td>

                        <td>
                            <div class="text-nowrap">
                                {{ $user->username }}
                            </div>
                            <div class="small text-medium-emphasis text-nowrap">
                                Registered: {{ $user->account_created->diffForHumans() }}
                            </div>
                        </td>

                        <td class="text-center">
                            <svg class="icon icon-xl">
                                <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-us"></use>
                            </svg>
                        </td>

                        <td>
                            <div class="d-flex justify-content-between">
                                <div class="float-end ms-1 text-nowrap">
                                    <small class="text-medium-emphasis">
                                        {{ $user->motto }}
                                    </small>
                                </div>
                            </div>
                        </td>

                        <td>
                            {{ $user->last_login->diffForHumans() }}
                        </td>
                    </tr>
                @endforeach

                <x-slot:footer>
                    {{ $users->links('pagination::bootstrap-5') }}
                </x-slot:footer>
            </x-housekeeping.content-table>

        </div>

        <div class="col-xl-6">
            <x-housekeeping.content-table>
                <x-slot:title>
                    Recent chatlogs
                </x-slot:title>

                <x-slot:header>
                    <th></th>
                    <th>User</th>
                    <th class="text-center"></th>
                    <th>Message</th>
                    <th>Room</th>
                    <th>Sent</th>
                </x-slot:header>

                @foreach($chats as $chat)
                    <tr class="align-middle">
                        <td class="text-center">
                            <div class="avatar avatar-md">
                                <img
                                    src="{{ setting('avatar_imager') }}/{{ $chat->user?->look }}&direction=2&head_direction=3&gesture=sml&action=wav&headonly=1"
                                    alt="{{ $chat->user?->username }}">
                                <span @class([
                                        'avatar-status',
                                        'bg-success' => $chat->user?->online === '1',
                                        'bg-danger' => $chat->user?->online === '0',
                                      ])></span>
                            </div>
                        </td>

                        <td>
                            <div class="text-nowrap">
                                {{ $chat->user?->username }}
                            </div>
                        </td>

                        <td class="text-center">
                            <svg class="icon icon-xl">
                                <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-us"></use>
                            </svg>
                        </td>

                        <td style="max-width: 150px;" class="truncate-text">
                            {{ $chat->message }}
                        </td>

                        <td style="max-width: 150px;" class="truncate-text">
                            {{ $chat->room?->name }}
                        </td>

                        <td>
                            {{ $chat->timestamp->diffForHumans() }}
                        </td>
                    </tr>
                @endforeach
            </x-housekeeping.content-table>
        </div>
    </div>
</x-housekeeping-layout>
