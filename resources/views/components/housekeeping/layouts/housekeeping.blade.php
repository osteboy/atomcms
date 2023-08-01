<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title  -->
    <title>{{ setting('hotel_name') }} - @stack('title')</title>
    <meta name="description" content="Atom Housekeeping. The ultimate housekeeping for your retro.">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&amp;display=swap" rel="stylesheet">

    <!-- Favicon  -->
    <link rel="icon" href="src/img/favicon.png">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('scripts')
</head>

<body class="font-sans text-base font-normal text-gray-600 dark:text-gray-400 dark:bg-gray-900 flex min-h-screen flex-col">
<!-- wrapper -->
<div x-data="{ open: false }" class="wrapper overflow-x-hidden bg-gray-100 dark:bg-gray-900 dark:bg-opacity-40">
    <x-housekeeping.navigation.sidebar />

    <div x-bind:aria-expanded="open" :class="{ 'ltr:ml-64 ltr:-mr-64 md:ltr:ml-0 md:ltr:mr-0 rtl:mr-64 rtl:-ml-64 md:rtl:mr-0 md:rtl:ml-0': open, 'ltr:ml-0 ltr:mr-0 md:ltr:ml-64 rtl:mr-0 rtl:ml-0 md:rtl:mr-64': !(open) }" class="flex flex-col ltr:ml-64 rtl:mr-64 min-h-screen transition-all duration-500 ease-in-out">
        <!-- Navbar -->
            <x-housekeeping.navigation.top />
        <!-- End Navbar -->

        <main class="pt-20 p-4">
            {{ $slot }}
        </main>

        <footer class="bg-white dark:bg-gray-800 p-6 shadow-sm mt-auto w-full text-center">
            &copy {{ date('Y') }}  {{ __('Atom Housekeeping. Made by Object') }}
        </footer>
    </div>
</div>



<script src="{{ asset('/assets/housekeeping/vendors/flatpickr/dist/flatpickr.min.js') }}"></script><!-- input date -->
<script src="{{ asset('/assets/housekeeping/vendors/flatpickr/dist/plugins/rangePlugin.js') }}"></script><!-- input range date -->
<script src="{{ asset('/assets/housekeeping/vendors/@yaireo/tagify/dist/tagify.min.js') }}"></script><!-- input tags -->
<script src="{{ asset('/assets/housekeeping/vendors/pristinejs/dist/pristine.min.js') }}"></script><!-- form validation -->
<script src="{{ asset('/assets/housekeeping/vendors/simple-datatables/dist/umd/simple-datatables.js') }}"></script><!--sort table-->

<!-- Minify Global javascript (for production purpose) -->
<script src="{{ asset('/assets/housekeeping/dist/js/scripts.js') }}"></script>
<script src="{{ asset('/assets/housekeeping/vendors/chart.js/dist/chart.min.js') }}"></script><!-- charts -->

<!-- chart config -->
<script src="{{ asset('/assets/housekeeping/js/chart/cms.js') }}"></script>

<!--start::Vendor javascript (only on this page)-->
<script src="{{ asset('/assets/housekeeping/vendors/jsvectormap/dist/js/jsvectormap.min.js') }}"></script><!-- vector map -->
<script src="{{ asset('/assets/housekeeping/vendors/jsvectormap/dist/maps/world.js') }}"></script><!-- world vector map -->
<!--end::Vendor javascript (only on this page)-->
<!--start::Call vendor ( initialize vendor javascript )-->
<script src="{{ asset('/assets/housekeeping/js/vendor.js') }}"></script>
</body>
</html>
