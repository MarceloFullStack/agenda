@extends('adminlte::page')

@section('title', 'COPAM AGENDA')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
@endsection
@section('content_header')
    <h1 class="m-0 text-dark">Lista de clientes </h1>


@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="clientes" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Tipo de Pessoa</th>
                                <th>CPF/CNPJ</th>
                                <th>Email</th>
                                <th>DDD</th>
                                <th>Telefone</th>
                                <th>CEP</th>
                                <th>Logradouro</th>
                                <th>Número</th>
                                <th>Complemento</th>
                                <th>Bairro</th>
                                <th>Exibir</th>
                                <th>Editar</th>
                                <th>Deletar</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->nome }}</td>
                                    <td>{{ $cliente->tipo_pessoa }}</td>
                                    <td>{{ $cliente->cpf_cnpj }}</td>
                                    <td>{{ $cliente->email }}</td>
                                    <td>{{ $cliente->contato->ddd }}</td>
                                    <td>{{ $cliente->contato->telefone }}</td>
                                    <td>{{ $cliente->endereco->cep }}</td>
                                    <td>{{ $cliente->endereco->logradouro }}</td>
                                    <td>{{ $cliente->endereco->numero }}</td>
                                    <td>{{ $cliente->endereco->complemento }}</td>
                                    <td>{{ $cliente->endereco->bairro->nome }}</td>
                                    <td><button class="btn btn-success" type="button" data-toggle="modal"
                                            data-target="#myModal"
                                            onclick="showDtails({{ $cliente->id_cliente }})">Exibir</button></td>

                                    {{-- <td><a
                                            href="{{ route('client.show', ['client' => $cliente->id_cliente]) }}"
                                            class="btn btn-success" style="color: white">Exibir</a></td>
                                    --}}
                                    <td><a href="{{ route('client.edit', ['client' => $cliente->id_cliente]) }}"
                                            class="btn btn-primary" style="color: white">Editar</a></td>
                                    <td>
                                        <form method="post" action="/client/{{ $cliente->id_cliente }}">
                                            @csrf
                                            @method("delete")
                                            <button class="btn btn-danger" href="">Excluir</button>
                                        </form>
                                    </td>
                                    {{-- <td><a
                                            href="{{ route('client.destroy', ['cliente' => $cliente->id_cliente]) }}"
                                            class="btn btn-danger" style="color: white">Deletar</a></td>
                                    --}}
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>Tipo de Pessoa</th>
                                <th>CPF/CNPJ</th>
                                <th>Email</th>
                                <th>DDD</th>
                                <th>Telefone</th>
                                <th>CEP</th>
                                <th>Logradouro</th>
                                <th>Número</th>
                                <th>Complemento</th>
                                <th>Bairro</th>
                                <th>exibir</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLable">Agenda de Clientes <b>COPAM</b></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
    <script>
        function showDtails(id_cliente) {
            $.ajax({
                url: '{{ route('getdata') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    id_cliente: id_cliente
                },
                success: function(data) {

                    $('.modal-body').html(data)
                },
            });
        }

    </script>
    <!-- Modal -->
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $('#clientes').DataTable({
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
    <script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
@endsection
