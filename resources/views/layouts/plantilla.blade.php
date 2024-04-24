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
        <div class="flex p-4 h-40">
            <img src="{{ asset('assets/imagenes/logoNutriflare.png') }}" alt="NutriflareLogo" class="flex h-28 w-28">
        </div>
        <div class="">

        </div>
        <div>

        </div>
    </div>
</body>

</html>
