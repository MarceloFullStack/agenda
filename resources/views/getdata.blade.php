<style>
    .botao-modal{
        display: flex;
    }
    .botao-modal a{
        margin-right: 5px;
    }
</style>
<div class="card">
    <div class="card-body">
      <h5 class="card-title"><strong>Cliente</strong></h5>
      <p class="card-text">Nome: {{ $cliente->nome }} <br>
        Tipo de Pessoa: {{ $cliente->tipo_pessoa }} <br>
        {{ $cliente->tipo_pessoa == "Juridica" ? "CNPJ: " : "CPF: " }} {{ $cliente->cpf_cnpj }}
    </p>
      <h5 class="card-title"><strong>Contato</strong></h5>
      <p class="card-text">E-mail: {{ $cliente->contato->email }} <br>
        Telefone: {{ $cliente->contato->ddd . $cliente->contato->telefone }} <br>

    </p>
      <h5 class="card-title"><strong>Endereço</strong></h5>
      <p class="card-text">CEP: {{ $cliente->endereco->cep }} <br>
        Cidade: {{ $cliente->endereco->bairro->cidade->nome }} <br>
        Estado: {{ $cliente->endereco->bairro->cidade->UF }} <br>
        Logradouro: {{ $cliente->endereco->logradouro }} <br>
        Número: {{ $cliente->endereco->numero }} <br>
        Complemento: {{ $cliente->endereco->complemento }} <br>

    </p>
    <div class="botao-modal">
        <a href="{{ route('client.edit',['client' => $cliente->id_cliente]) }}" class="btn btn-warning" style="color: white">Editar</a>
    <form method="post" action="/client/{{$cliente->id_cliente}}">
        @csrf
        @method("delete")
        <button class="btn btn-danger" href="">Excluir</button>
    </form>
    </div>
    </div>
  </div>
