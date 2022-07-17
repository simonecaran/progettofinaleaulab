<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- GoogleFont -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- Font Awesome CDN -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS e Script per Bladewind -->

    <link href="{{ asset('bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- CSS Livewire -->
    @livewireStyles
    <!-- Favicon -->
    <link rel="icon" href="{{ url('./presto-favicon.png') }}">
    <!-- CDN SwiperCSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <!-- CSS Custom -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>{{$title ?? 'Presto.it'}}</title>
</head>
<body>
    <!-- Script Bladewind HELPER obbligatoriamente qui -->
    <script src="{{ asset('bladewind/js/helpers.js') }}"></script>  

    <!-- Notifiche -->
    <x-bladewind.notification position="bottom right"/>
    @if(session()->has('message'))
    <script>
        showNotification('Success', "{{Session::get('message')}}", 'success', 3);
    </script>
    @endif

    <x-spinner />
    <x-navbar/>
    <div>
        {{$slot}}
    </div>
    <x-footer/>

    <!-- JS Livewire -->
    @livewireScripts
    <!-- CDN SwiperJS -->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <!-- JS Custom -->
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>