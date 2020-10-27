@extends('adminlte::page')

@section('title', 'COPAM')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
@if ($errors->any)
<ul>
    @foreach ($errors->all() as $error)
        <small><li class="alert alert-danger">{{ $error }}</li></small>
    @endforeach
</ul>
@endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form role="form" class="form" method="POST" action="{{route('client.update', $cliente->id_cliente)}}">
                        @csrf
                        @method('PUT')
                        {{-- nome cliente --}}
                        <div class="card-body">
                            <h2 class="mb-0 text-center">CADASTRO DE CLIENTES</h2>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Cliente" value="{{ $cliente->nome ?? ''}}">
                            </div>

                            {{-- pessoa juridica radio --}}
                            <label class=" control-label" for="radios">Tipo</label>
                            <div>
                                <label required="" class="radio-inline" for="radios-0">
                                    <input name="tipo_pessoa" id="tipo_pessoa" value="Fisica" {{ $cliente->tipo_pessoa == 'Fisica' ? 'checked' : '' }} type="radio" required>
                                    Física
                                </label>
                                <label class="radio-inline" for="radios-1">
                                    <input name="tipo_pessoa" id="tipo_pessoa" value="Juridica" {{ $cliente->tipo_pessoa == 'Juridica' ? 'checked' : '' }} type="radio">
                                    Júridica
                                </label>
                            </div>
                             {{-- telefone --}}
                             <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">CPF/CNPJ</i></span>
                                </div>
                                <input name="cpf_cnpj" type="text" class="form-control" placeholder="somente numeros" value="{{ $cliente->cpf_cnpj}}">
                            </div>
                            {{-- email --}}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input name="email" type="email" class="form-control" placeholder="email@email.com" value="{{ $cliente->email}}">
                            </div>

                            {{-- telefone --}}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input name="telefone" type="text" class="form-control" placeholder="XX XXXXX-XXXX" value="{{ $cliente->contato->ddd . $cliente->contato->telefone}}">
                            </div>
                            {{-- cep --}}

                            <div class="form-row align-items-center">
                                <div class="col-md-3">
                                    <label class="sr-only" for="inlineFormInputGroup"></label>
                                    <div class="input-group mb-2">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text"><strong>CEP</strong></div>
                                      </div>
                                      <input type="text" class="form-control" id="inlineFormInputGroup" name="cep" value="{{ $cliente->endereco->cep}}" >
                                      <div class="col-md-2">
                                          <button type="button" class="btn btn-primary"
                                              onclick="pesquisacep(cep.value)">Pesquisar</button>
                                      </div>
                                </div>

                            </div>


                            {{-- endereco completo --}}
                            <div class="form-row align-items-center mt-3">
                                <div class="col-md-3">
                                  <label class="sr-only" for="inlineFormInputGroup"></label>
                                  <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">Logradouro</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" name="logradouro" value="{{ $cliente->endereco->logradouro}}">
                                  </div>
                                </div>
                                <div class="col-md-1">
                                  <label class="sr-only" for="inlineFormInputGroup">Número</label>
                                  <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">Nº</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Número" name="numero" value="{{ $cliente->endereco->numero}}">
                                  </div>
                                </div>
                                <div class="col">
                                  <label class="sr-only" for="inlineFormInputGroup">Complemento</label>
                                  <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">Complemento</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Complemento" name="complemento" value="{{ $cliente->endereco->complemento}}">
                                  </div>
                                </div>
                                <div class="col">
                                  <label class="sr-only" for="inlineFormInputGroup">Bairro</label>
                                  <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">Bairro</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Bairro" name="bairro" value="{{ $cliente->endereco->bairro->nome}}">
                                  </div>
                                </div>
                                <div class="col">
                                  <label class="sr-only" for="inlineFormInputGroup">Cidade</label>
                                  <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">Cidade</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Cidade" name="cidade" value="{{ $cliente->endereco->bairro->cidade->nome}}">
                                  </div>
                                </div>
                                <div class="col">
                                  <label class="sr-only" for="inlineFormInputGroup">UF</label>
                                  <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">UF</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="UF" name="UF" value="{{ $cliente->endereco->bairro->cidade->UF}}">
                                  </div>
                                </div>
                              </div>

                              <!-- /.card-body -->

                              <div class="card-footer">
                                  <button type="submit" class="btn btn-primary">Salvar auterações</button>
                              </div>
                                </div>
                         </form>


            </div>
        </div>
    </div>
    </div>
@stop
