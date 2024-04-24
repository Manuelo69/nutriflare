<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-cover bg-no-repeat" style="background-image: url({{ asset('assets/imagenes/inicio.jpg') }})">
    <div class="container">
        <div class="absolute top-0 left-0 p-4 shadow-md">
            <img src="{{ asset('assets/imagenes/logoNutriflare.png') }}" alt="NutriflareLogo" class="h-40">
        </div>
    </div>
</body>

</html>
