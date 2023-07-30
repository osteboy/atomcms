<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ setting('hotel_name') }} - Nitro</title>

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">

    @vite(['resources/themes/material/css/app.scss', 'resources/themes/material/js/app.js'])
</head>

<body style="overflow: hidden; height: 100vh; width: 100vw; border: none; padding: 0; margin: 0; position: absolute; left: 0; top: 0;" id="nitro-client">
    <iframe id="nitro" src="{{ sprintf('%s/index.html?sso=%s', config('habbo.client.nitro_path'), $sso) }}" style="width: 100%; height: 100%; border: none;"></iframe>

    {{-- Show disconnected message on client if the user has been disconnected --}}
    <div id="disconnected" class="h-screen w-full">
        <div class="absolute h-full w-full bg-black bg-opacity-50"></div>

        <div class="relative flex h-full w-full flex-col items-center justify-center gap-4">
            <h2 class="text-2xl text-white">
                {{ __('Whoops! It seems like you have been disconnected...') }}
            </h2>

            <div class="flex gap-x-4">
                <button
                    class="py-2 px-4 text-white rounded bg-[#eeb425] hover:bg-[#e3aa1e] border-2 border-[#cf9d15] transition ease-in-out"
                    onclick="reloadClient()">
                    {{ __('Reload client') }}
                </button>

                <a href="{{ route('me.show') }}">
                    <x-form.secondary-button>
                        {{ __('Back to website') }}
                    </x-form.secondary-button>
                </a>
            </div>
        </div>
    </div>

    <script>
        function toggleFullscreen() {
            if (document.fullscreenElement) {
                document.exitFullscreen();

                return;
            }

            document.documentElement.requestFullscreen();
        }

        function reloadClient() {
            window.location.href = window.location;
        }

        window.addEventListener('DOMContentLoaded', () => {
            function getOnlineUserCount() {
                fetch('{{ route('api.online-count') }}')
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(response) {
                        document.getElementById('online-count').innerHTML = response.data.onlineCount;
                    });
            }

            getOnlineUserCount();

            setInterval(function() {
                getOnlineUserCount();
            }, 15000);
        });
    </script>

    <script src="{{ asset('assets/js/atom.js') }}"></script>
</body>

</html>
