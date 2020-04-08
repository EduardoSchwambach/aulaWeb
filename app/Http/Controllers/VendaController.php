<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cliente;
use App\Usuario;
use App\Venda;

class VendaController extends Controller
{

    function registroVenda(){
        $clientes = Cliente::all();
        $usuarios = Usuario::all();
        return view("registra_venda",["cs" => $clientes], [ "us" => $usuarios ]);
    }
    
    function adicionarVenda(Request $req){
    	$descricao = $req->input('descricao');
    	$valorTotal = $req->input('valorTotal');
        $cliente = $req->input('id_cliente');
        $vendedor = $req->input('id_usuario');

    	$venda = new Venda();
    	$venda->descricao = $descricao;
    	$venda->valor = $valorTotal;
    	$venda->id_cliente = $cliente;
        $venda->id_usuario = $vendedor;

    	if ($venda->save()){
    		$msg = "Venda $descricao adicionada com sucesso.";
    	} else {
    		$msg = "Venda não foi registrada.";
    	}

        return view("resultado", [ "mensagem" => $msg]);
    }
}
