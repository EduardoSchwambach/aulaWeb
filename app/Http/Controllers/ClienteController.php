<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class clienteController extends Controller
{
    function telaCadastroCliente(){
    	return view("tela_cadastro_cliente");
    }

    function telaAlteracaoCliente($id){
        $cliente = Cliente::find($id);

        return view("tela_alterar_cliente", [ "u" => $cliente ]);
    }

    function adicionarCliente(Request $req){
    	$nome = $req->input('nome');
    	$endereco = $req->input('endereco');

    	$cliente = new Cliente();
    	$cliente->nome = $nome;
    	$cliente->endereco = $endereco;

    	if ($cliente->save()){
    		$msg = "Cliente $nome adicionado com sucesso.";
    	} else {
    		$msg = "Cliente não foi cadastrado.";
    	}

        return view("resultado", [ "mensagem" => $msg]);
    }

    function alterarCliente(Request $req, $id){
        $cliente = cliente::find($id);

        $nome = $req->input('nome');
        $endereco = $req->input('endereco');

        $cliente->nome = $nome;
        $cliente->endereco = $endereco;
        if ($cliente->save()){
            $msg = "Cliente $nome alterado com sucesso.";
        } else {
            $msg = "Cliente não foi alterado.";
        }

        return view("resultado", [ "mensagem" => $msg]);
    }

    function excluirCliente($id){
        $cliente = cliente::find($id);

        if ($cliente->delete()){
            $msg = "Cliente $id excluído com sucesso.";
        } else {
            $msg = "Cliente não foi excluído.";
        }

        return view("resultado", [ "mensagem" => $msg]);
    }

    function listarCliente(){
        $clientes = cliente::all();

        return view("listaCliente", [ "us" => $clientes ]);
    }
}
