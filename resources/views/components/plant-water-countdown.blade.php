<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>

<div class="tarjeta">

    <img src="{{ asset($plantImage) }}" alt="Imagen de la planta" width="100" height="100">
    
    <div class="infoplanta">
      <p>Planta: {{ $plantName }}</p> 
    </div>

    <div class="inforiego">
      <p>Próximo riego: {{ $daysLeft }}</p> 
    </div>
    
</div>