@extends('layouts.estrutura')

@section('titulo', 'Login | Crud Usuários')

@section('conteudo')

    <section class="principal-overlay">
        <div class="principal-box">
            <h3 class="titulo">Entre para usar o sistema.</h3>
            <form method="post">
                @csrf
                <input type="email" id="email" name="email" required
                placeholder="E-mail">
                <input type="password" id="password" name="password" required
                placeholder="Senha">
                <button class="entrar">Entrar</button>
                @include('partials.mensagem')        
            </form>  
        </div>
    </section>
    <script>
        
        document.addEventListener('DOMContentLoaded', function() {

        var botoes = document.querySelectorAll('button.entrar');

        for (var s = 0; s < botoes.length; s++) {
            (function(index) {
            var formulario = botoes[index].closest('form');

                botoes[index].removeAttribute('disabled');
                botoes[index].innerText = 'Entrar';

            formulario.addEventListener('submit', function(event) {
                botoes[index].setAttribute('disabled', 'disabled');
                botoes[index].innerText = 'Entrando...';
            });
            })(s);
        }
        });
    </script>

@endsection