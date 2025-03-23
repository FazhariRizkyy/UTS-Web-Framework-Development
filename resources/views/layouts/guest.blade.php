<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    {{-- Jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .select2-container .select2-selection--single {
            width: 100% !important;
            background-color: #f9fafb;
            border: 1px solid #d1d5db !important;
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
            height: 43px;
            border-radius: 0.4rem;
            color: #1f2937;
        }

        .select2-container .select2-selection--single .select2-selection__arrow {
            top: 20% !important;
            right: 8px;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            font-size: 14px !important;
            top: -2px;
            left: -6px;
            position: relative;
            color: #1f2937;
        }

        .select2-search__field {
            font-size: 14px !important;
            border-radius: 0.5rem;
        }

        .select2-results {
            font-size: 14px !important;
            border-radius: 0px 10px 0px 10px;
        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(".js-example-placeholder-single").select2({
            placeholder: "Pilih...",
            allowClear: true,
            width: '100%'
        });
    </script>
</body>

</html>
