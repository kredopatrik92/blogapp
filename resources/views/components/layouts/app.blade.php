<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased m-0">
        <div class="min-h-screen bg-white w-full m-0 relative overflow-hidden">
            <livewire:layout.navigation />

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>


        @livewire('wire-elements-modal')
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

        <footer class="bg-[#171E21] w-full px-4 lg:px-0">
            <div class="w-full lg:w-7xl max-w-7xl mx-auto flex flex-col items-center lg:items-start">
                <div class="flex flex-col lg:flex-row gap-8 lg:gap-64 pt-12 lg:pt-24 pb-16 lg:pb-32">
                    <div class="flex flex-col gap-8">
                        <div class="w-auto">
                            <img  src="{{url('/images/logo-footer.png')}}" alt="logo">
                        </div>

                        <div class="flex flex-col gap-4">
                            <div class="flex gap-2 items-start">
                                <img class="mt-1" src="{{url('/images/location.svg')}}" >
                                <p class="font-[400] text-[16px] text-[#94A3B8]">
                                    Door 15, 2nd Fl., Ebro-Dakudao Bldg., <br>
                                    San Pedro, St. Davao City 8000, Philippines
                                </p>
                            </div>
                            <div class="flex gap-2 items-start">
                                <img src="{{url('/images/mail.svg')}}" >
                                <a href="mailto:hello@webteractive.co" class="font-[400] text-[16px] text-[#94A3B8]">
                                    hello@webteractive.co
                                </a>
                            </div>
                            <div class="flex gap-2 items-start">
                                <img src="{{url('/images/phone.svg')}}" >
                                <p class="font-[400] text-[16px] text-[#94A3B8]">
                                    (082) 322 6940
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-16">
                        <div class="flex flex-col gap-8">
                            <h2 class="satoshi font-[700] text-[20px] text-[#FFFFFF]">Links</h2>
                            <div class="flex flex-col gap-2">
                                <a href="#" class="inter font-[400] text-[16px] text-[#94A3B8]">Contents</a>
                                <a href="#" class="inter font-[400] text-[16px] text-[#94A3B8]">Jobs</a>
                                <a href="#" class="inter font-[400] text-[16px] text-[#94A3B8]">Privacy Policy</a>
                                <a href="#" class="inter font-[400] text-[16px] text-[#94A3B8]">Github</a>
                            </div>
                        </div>
                        <div class="flex flex-col gap-8">
                            <h2 class="satoshi font-[700] text-[20px] tracking-[1.5%] text-[#FFFFFF]">Social Media</h2>
                            <div class="flex gap-4 items-center">
                                <a href="#">
                                    <img src="{{url('/images/facebook.svg')}}" alt="">
                                </a>
                                <a href="#">
                                    <img src="{{url('/images/instagram.svg')}}" alt="">
                                </a>
                                <a href="#">
                                    <img src="{{url('/images/twitter.svg')}}" alt="">
                                </a>
                                <a href="#">
                                    <img src="{{url('/images/linkedin.svg')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-7xl max-w-7xl border-t-[0.5px] border-[#94A3B880] p-4">
                    <p class="inter text-[12px] font-[300] text-[#94A3B8]">Copyright 2024. Webteractive Software Development Services.All rights reserved.</p>
                </div>
            </div>
        </footer>
    </body>


</html>
