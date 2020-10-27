@extends('adminlte::page')

@section('title', 'COPAM AGENDA')

@section('content_header')
    <h1 class="m-0 text-dark">Listagem por Nome e Endereço</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="endereco" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CEP</th>
                                <th>Logradouro</th>
                                <th>Número</th>
                                <th>Complemento</th>
                                <th>Bairro</th>
                                <th>UF</th>
                                <th>Cidade</th>
                                <th>Editar</th>
                                <th>Deletar</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->endereco->cep }}</td>
                                <td>{{ $cliente->endereco->logradouro }}</td>
                                <td>{{ $cliente->endereco->numero }}</td>
                                <td>{{ $cliente->endereco->complemento }}</td>
                                <td>{{ $cliente->endereco->bairro->nome }}</td>
                                <td>{{ $cliente->endereco->bairro->cidade->UF }}</td>
                                <td>{{ $cliente->endereco->bairro->cidade->nome }}</td>
                                <td><a href="{{ route('client.edit',['client' => $cliente->id_cliente]) }}" class="btn btn-primary" style="color: white">Editar</a></td>
                                <td><form method="post" action="/client/{{$cliente->id_cliente}}">
                                    @csrf
                                    @method("delete")
                                    <button class="btn btn-danger" href="">Excluir</button>
                                </form></td>
                                </tr>
                                @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>CEP</th>
                                <th>Logradouro</th>
                                <th>Número</th>
                                <th>Complemento</th>
                                <th>Bairro</th>
                                <th>UF</th>
                                <th>Cidade</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
<script>
    $(document).ready(function() {
        $('#endereco').DataTable({
            language:{
"sEmptyTable": "Nenhum registro encontrado",
"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
"sInfoFiltered": "(Filtrados de _MAX_ registros)",
"sInfoPostFix": "",
"sInfoThousands": ".",
"sLengthMenu": "Mostrar _MENU_ resultados por página",
"sLoadingRecords": "Carregando...",
"sProcessing": "Processando...",
"sZeroRecords": "Nenhum registro encontrado",
"sSearch": "Pesquisar",
"oPaginate": {
    "sNext": "Próximo",
    "sPrevious": "Anterior",
    "sFirst": "Primeiro",
    "sLast": "Último"
},
"oAria": {
    "sSortAscending": ": Ordenar colunas de forma ascendente",
    "sSortDescending": ": Ordenar colunas de forma descendente"
},
"select": {
    "rows": {
        "_": "Selecionado %d linhas",
        "0": "Nenhuma linha selecionada",
        "1": "Selecionado 1 linha"
    }
},
"buttons": {
    "copy": "Copiar para a área de transferência",
    "copyTitle": "Cópia bem sucedida",
    "copySuccess": {
        "1": "Uma linha copiada com sucesso",
        "_": "%d linhas copiadas com sucesso"
    }
}
}
        });
    });

</script>

@endsection
