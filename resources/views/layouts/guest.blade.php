<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">

<div class="flex flex-col lg:flex-row h-screen">
    <div class="lg:w-[38%] h-full flex flex items-center">
        <div class="flex gap-16 absolute top-48 left-56">
            <div class="w-[52px] h-[52px] block bg-secondary rounded-md flex justify-center items-center">
                <svg width="24" height="32" viewBox="0 0 24 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.814 3.60619C1.05853 7.43015 0.31504 7.82804 0.31504 9.75892C0.31504 10.3203 0.654337 11.0613 1.18171 11.6514C1.93119 12.4903 3.49033 13.1084 12.7367 16.2317C18.6157 18.2177 23.5606 19.7977 23.7256 19.7425C24.1298 19.6077 19.1443 17.3189 15.4253 15.9315C9.60367 13.7599 9.42725 13.6402 10.7901 12.7779C11.1798 12.5313 13.2002 11.6044 15.2794 10.7182L19.0599 9.10679L20.4533 5.56732C21.2195 3.62069 22.0367 1.56726 22.2689 1.00397C22.6035 0.192738 22.6085 -0.0155035 22.2932 0.000878524C22.0745 0.01222 17.3587 1.63467 11.814 3.60619ZM0 13.0996C0 13.3655 5.13042 15.6354 9.49026 17.2985C11.8011 18.1802 13.8362 19.0485 14.013 19.2281C14.5403 19.7646 13.387 20.3732 9.35952 21.6844C7.30357 22.3536 5.51194 23.0249 5.37836 23.1758C4.94581 23.6648 1.80581 31.8199 1.98223 31.9963C2.13628 32.1504 17.7878 27.4279 21.0201 26.2519C22.5805 25.6842 23.943 24.2057 23.943 23.0797C23.943 22.6021 23.5341 21.8776 22.9191 21.2648C22.0355 20.3843 20.3963 19.7451 10.9476 16.5959C4.92628 14.5891 0 13.0158 0 13.0996Z" fill="#F0F6FA"/>
                </svg>
            </div>
            <div class="flex flex-col">
                <h2 class="font-title font-bold text-gray-200">S3D Engineering</h2>
                <span class="text-gray-600 text-sm font-medium">Espace pro</span>
            </div>
        </div>
        <div class="w-full justify-center px-56 py-48 flex flex-col gap-40">
            <h1 class="font-title text-gray-200 text-2xl font-bold">Connexion à votre espace</h1>
            {{ $slot }}
        </div>
    </div>
    <div class="lg:w-[62%] bg-primary h-full">
        img
    </div>
</div>


</body>
</html>
