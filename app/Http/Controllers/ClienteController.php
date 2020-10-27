<?php

namespace App\Http\Controllers;

use App\Model\Bairro;
use App\Model\Cidade;
use App\Model\Cliente;
use App\Model\Contato;
use App\Model\Endereco;
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::all();

        return view('home', compact('clientes'));

    }
    public function nomeTelefone()
    {
        $clientes = Cliente::all();

        return view('listar-nome-telefone', compact('clientes'));

    }
    public function nomeEndereco()
    {
        $clientes = Cliente::all();

        return view('listar-nome-endereco', compact('clientes'));

    }

    public function create()
    {
        //
    }

    public function store(ClienteRequest $request)
    {
        $data = $request->All();
        Cliente::clientStore($data);
        return redirect()->route('client.index');

    }

    public function show(Cliente $cliente)
    {
        //
    }

    public function edit($id)
    {
        $cliente = Cliente::where('id_cliente', $id)->first();
        return view('formulario-edicao', compact('cliente'));
    }

    public function update(ClienteRequest $request, $id)
    {
        $editar = Cliente::where('id_cliente', $id)->first();
        $editar->update($request->all());

        return redirect()->route('client.index');
    }

    public function destroy($id)
    {
        $deletar = Cliente::where('id_cliente', $id)->first();
        $deletar->delete();
        return back();

    }

    public function getdata(Request $request){
        $id_cliente = $request->id_cliente;
        $cliente = Cliente::where('id_cliente',$id_cliente)->first();

        return view('getdata',compact('cliente'));
    }
}
