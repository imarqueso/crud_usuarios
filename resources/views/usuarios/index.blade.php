@extends('layouts.estrutura')

@section('titulo', 'Usuários | Crud Usuários')
@section('pagina', 'Usuários')

@section('conteudo')

<section class="usuarios-container">
    <div class="usuarios-content">
        @include('partials.mensagem')  
        <div class="usuarios-box">
            <h3>Usuários cadastrados</h3>
            <table id="dataTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Telefone 1</th>
                        <th>Telefone 2</th>
                        <th>Data Cadastro</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        @if ($usuario->login == "admin") 
                        @else
                        <tr>
                            <td>{{$usuario->id}}</td>
                            <td>{{$usuario->nome}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>{{ $usuario->telefone1 ? $usuario->telefone1 : 'Telefone 1 não informado.' }}</td>
                            <td>{{ $usuario->telefone2 ? $usuario->telefone2 : 'Telefone 2 não informado.' }}</td>
                            <td>{{\Carbon\Carbon::parse($usuario->created_at)->format('d/m/Y')}}</td>
                            <td>
                                <div class="td-excluir">
                                    <span class="excluir">
                                        <img src="{{ asset('/img/icones/excluir.svg') }}">
                                    </span>
                                    <form method="post"
                                    action="/usuarios/{{$usuario->id}}/excluir"
                                    enctype="multipart/form-data" class="modal-excluir">
                                        @csrf
                                        <button type="submit" class="btn-excluir">Excluir</button>
                                        <span class="btn-cancelar">Cancelar</span>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>       

<script>
    var btnExcluir = document.querySelectorAll("span.excluir");
    var btnCancelar = document.querySelectorAll("span.btn-cancelar");
    var modalExcluir = document.querySelectorAll("form.modal-excluir");

    btnExcluir.forEach(function(item, index) {
        item.addEventListener("click", function() {
            modalExcluir[index].classList.toggle('abrir-excluir'); 
        });
    });

    btnCancelar.forEach(function(item, index) {
        item.addEventListener("click", function() {
            modalExcluir[index].classList.remove('abrir-excluir'); 
        });
    });
</script>

@endsection