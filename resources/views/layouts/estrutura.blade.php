<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>

    {{-- Estilo principal --}}
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    {{-- Fontes Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&display=swap" rel="stylesheet">

    {{-- jQuery cdn --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <header class="header-container">
        <section class="header-content">
            <p class="logo">Crud<strong>&nbsp;Usuários</strong></p>
            <nav class="nav-content">
                <ul class="nav" id="nav">
                    <li>
                        <a href="{{ route('cadastrar') }}">Cadastrar</a>
                    </li>
                    @if(!Auth::user())
                    <li>
                        <a href="{{ route('loginView') }}">Login</a>
                    </li>
                    @endif
                    @if(Auth::user())
                    <li>
                        <a href="{{ route('usuariosView') }}">Usuários</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}">
                        <svg width="164" height="140" viewBox="0 0 164 140" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 70V140H30.5H61V130V120H41H21V70V20H41H61V10V0H30.5H0V70ZM102.493 23.007L95.539 30.014L110.507 45.007L125.475 60H87.737H50V70V80H87.737H125.475L110.498 95.002L95.521 110.004L102.684 117.167L109.847 124.33L115.674 119.269C124.816 111.327 164 71.286 164 69.886C164 68.461 111.782 16 110.364 16C109.859 16 106.317 19.153 102.493 23.007Z"/>
                            </svg>                            
                            Sair
                        </a>
                    </li>
                    @endif
                </ul>
                @if(Auth::user())
                <span class="user"><img src="{{ asset('/img/icones/perfil.svg') }}" alt="">Olá,&nbsp;<strong>{{ Auth::user()->nome }}</strong></span>
                @endif
                <input id="hamburguer" type="checkbox" style="display: none;">
                <label for="hamburguer" class="hamburguer">
                    <div id="menu"></div>
                </label>
            </nav>      
        </section>
    </header>
    <script>
        document.getElementById("menu").addEventListener("click", function () {
            document.getElementById("nav").classList.toggle("abrir-menu");
        });
    </script>

    @yield('conteudo')
</html>