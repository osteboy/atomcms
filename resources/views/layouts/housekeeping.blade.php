<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="AtomhK - Housekeeping for Atom CMS">
    <meta name="author" content="Object Retros">
    <meta name="keyword" content="Atom HK, Atom Housekeeping, Habbo HK, Habbo housekeeping, habbo, retros">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ setting('hotel_name') }} - @stack('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('assets/css/housekeeping/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/housekeeping/housekeeping.css') }}" rel="stylesheet">

    @vite('resources/themes/' . setting('theme') . '/js/app.js')
</head>
<body>
<x-housekeeping.navigation />

<div class="wrapper d-flex flex-column min-vh-100 bg-light bg-opacity-50 dark:bg-transparent">
    <x-housekeeping.header />

    <main class="body flex-grow-1 px-3">
        <div class="container-lg mt-4">
            {{ $slot }}
        </div>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="{{ asset('assets/js/housekeeping/coreui.bundle.min.js') }}"></script>

@stack('javascript')
<script>
    function showConfirmationModal(button, actionType) {
        const modal = document.getElementById('confirmationModal');
        const actionUrl = button.getAttribute('data-action-url');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        const modalConfirm = modal.querySelector('#confirmationModalConfirm');

        const coreuiModal = new coreui.Modal(modal);
        coreuiModal.show();

        modalConfirm.onclick = function() {
            const method = button.getAttribute('data-method');

            axios({
                method: method,
                url: actionUrl,
                data: {_token: csrfToken}
            })
            .then(function(response) {
                console.log(response);
                window.location.reload();
            })
            .catch(function(error) {
                console.log(error);
                coreuiModal.hide();
            });
        };

        switch (actionType) {
            case 'deleteUser':
                modal.querySelector('.modal-title').textContent = 'Delete User';
                modal.querySelector('.modal-body').textContent = 'Are you sure you want to delete this user?';
                break;
            case 'banUser':
                modal.querySelector('.modal-title').textContent = 'Ban User';
                modal.querySelector('.modal-body').textContent = 'Are you sure you want to ban this user?';
                break;
        }
    }
</script>
</body>
</html>
