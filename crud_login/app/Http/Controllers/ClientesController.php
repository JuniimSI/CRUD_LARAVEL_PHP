<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Redirect;

class ClientesController extends Controller
{
    public function index(){
        $clientes = Cliente::get();
    	return view('clientes/lista', ['clientes' => $clientes]);
    }

    public function novo(){
    	return view('clientes/novo');
    }

    public function salvar(Request $request){
        $cliente = new Cliente();
        $cliente = $cliente->create($request->all());

        \Session::flash('mensagem_sucesso', 'Cliente cadastrado!');
        return Redirect::to('clientes');
    }

    public function atualizar($id, Request $request){
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        \Session::flash('mensagem_sucesso', 'Cliente atualizado!');

        return Redirect::to('clientes/'.$cliente->id.'/editar');
    }

    public function editar($id){
        $cliente = Cliente::findOrFail($id);
        return view('clientes/novo', ['cliente' => $cliente]);
    }

    public function deletar($id){
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        \Session::flash('mensagem_sucesso', 'Cliente deletado!');
        return Redirect::to('clientes');
    }


}
