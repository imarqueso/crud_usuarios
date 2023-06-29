@extends('layouts.estrutura')

@section('titulo', 'Cadastro | Crud Usuários')

@section('conteudo')

    <section class="principal-overlay">
        <div class="principal-box">
            <h3 class="titulo">Cadastre-se para usar o sistema.</h3>
            <form method="post" action="{{ route('cadastrarUsuario') }}" enctype="multipart/form-data">
                @csrf
                <input type="text" id="nome" name="nome" required
                placeholder="Nome">
                <input type="email" id="email" name="email" required
                placeholder="E-mail">
                <input type="text" id="telefone1" name="telefone1"
                placeholder="Telefone 1">
                <input type="text" id="telefone2" name="telefone2"
                placeholder="Telefone 2">
                <input type="password" id="password" name="password" required
                placeholder="Senha">
                <button class="entrar">Cadastrar</button>
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
                botoes[index].innerText = 'Cadastrar';

            formulario.addEventListener('submit', function(event) {
                botoes[index].setAttribute('disabled', 'disabled');
                botoes[index].innerText = 'Cadastrando...';
            });
            })(s);
        }
        });
    </script>
@endsection