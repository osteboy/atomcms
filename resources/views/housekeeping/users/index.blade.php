<x-housekeeping-layout>
    @push('title', 'Users')

    <div class="row">
        <div class="col-xl-12">
            <x-housekeeping.content-table>
                <x-slot:title>
                    All users
                </x-slot:title>

                <x-slot:header>
                    <th></th>
                    <th>User</th>
                    <th>Motto</th>
                    <th>E-mail</th>
                    <th>Rank</th>
                    <th>Last login</th>
                    <th>Actions</th>
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

                        <td>
                            <div class="text-nowrap">
                                {{ $user->motto }}
                            </div>
                        </td>

                        <td>
                            <div class="text-nowrap">
                                {{ $user->mail }}
                            </div>
                        </td>

                        <td>
                            <div class="text-nowrap">
                                {{ $user->permission->rank_name }}
                            </div>
                        </td>

                        <td>
                            {{ $user->last_login->diffForHumans() }}
                        </td>

                        <td class="d-flex gap-2">
                            <button class="btn btn-outline-success" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Edit user">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>

                            <button class="btn btn-outline-info" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Ban user" data-action-url="{{ route('hk.users.ban', $user) }}" data-action="ban" data-action-type="banUser" data-method="post">
                                <i class="fa-solid fa-ban"></i>
                            </button>

                            <a href="{{ route('impersonate', $user->id) }}" target="_blank">
                                <button class="btn btn-outline-dark"  data-coreui-toggle="tooltip" data-coreui-placement="top" title="Impersonate user">
                                    <i class="fa-solid fa-user-secret"></i>
                                </button>
                            </a>

                            <button class="btn btn-outline-danger" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Delete user" data-action-url="{{ route('hk.users.delete', $user) }}" data-action="delete" data-action-type="deleteUser" data-method="delete">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach

                <x-slot:footer>
                    {{ $users->links('pagination::bootstrap-5') }}
                </x-slot:footer>

                <x-housekeeping.confirmation-modal id="confirmationModal" title="Confirm" message="" cancelText="Cancel" confirmText="Confirm" />
            </x-housekeeping.content-table>
        </div>
    </div>

    @push('javascript')
        <script>
            const tooltipTriggerList = document.querySelectorAll('[data-coreui-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new coreui.Tooltip(tooltipTriggerEl));

            document.querySelectorAll('[data-action="delete"]').forEach(function(button) {
                button.addEventListener('click', function() {
                    showConfirmationModal(button, button.getAttribute('data-action-type'));
                });
            });

            document.querySelectorAll('[data-action="ban"]').forEach(function(button) {
                button.addEventListener('click', function() {
                    showConfirmationModal(button, button.getAttribute('data-action-type'));
                });
            });
        </script>
    @endpush
</x-housekeeping-layout>
