<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>ViaCEP | Cadastro de endereços</title>
    </head>
    <body class="app-shell text-[#1b1b18] flex p-4 sm:p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="site-header w-full lg:max-w-5xl max-w-[335px] text-sm mb-5">
           @include('menue')
        </header>
        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main class="hero-panel flex max-w-[335px] w-full flex-col-reverse lg:max-w-5xl lg:flex-row">
                <div class="hero-copy text-[13px] leading-[20px] flex-1 p-6 pb-10 lg:p-14">
                    <span class="eyebrow">Cadastro inteligente</span>
                    <h1 class="mt-3 text-3xl font-semibold tracking-tight sm:text-4xl">Seu endereço, sem complicação.</h1>
                    <p class="mt-5 max-w-md text-base leading-7">Cadastre usuários com rapidez e encontre endereços de todo o Brasil usando a API ViaCEP.</p>
                    <div class="hero-actions mt-7 flex flex-wrap gap-3">
                        <a href="{{ route('users.create') }}" class="primary-action">Cadastrar usuário <span aria-hidden="true">&rarr;</span></a>
                        <a href="{{ route('users.lista') }}" class="secondary-action">Ver usuários</a>
                    </div>
                </div>

            <div id="carouselExampleControls" class="hero-carousel carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="{{ asset('imagens/viacep.png') }}" class="d-block w-100" alt="Mapa e marcador indicando consulta de endereços pela ViaCEP">
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('imagens/viacep2.png') }}" class="d-block w-100" alt="Logo ViaCEP com chamada para consulta de CEPs no Brasil">
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('imagens/viacep3.png') }}" class="d-block w-100" alt="Ilustração tecnológica representando uma API conectada a serviços">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Imagem anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próxima imagem</span>
                </button>
            </div>
        </div>

        
    </body>
    <div>
        @include('footer')
    </div>
</html>
