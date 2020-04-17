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
        if (session()->has("login")){
            $clientes = Cliente::all();
            $usuarios = Usuario::all();
            return view("registra_venda",["cs" => $clientes], [ "us" => $usuarios ]);
        }else{
            return redirect()->route('tela_login');
        }
    }
    
    function adicionarVenda(Request $req){
        if (session()->has("login")){ 
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
        }else{
            return redirect()->route('tela_login');
        }
    }

    function vendasPorUsuario($id){
        if (session()->has("login")){
            /* $id = id do usuario */
            $usuario = Usuario::find($id);
            
            return view('lista_vendas', ["usuario" => $usuario]);
        }else{
            return redirect()->route('tela_login');
        }
    }

    function comprasPorCliente($id){
        if (session()->has("login")){
            /* $id = id do cliente */
            $cliente = Cliente::find($id);
            $usuarios = Usuario::all();
            
            return view('lista_compras', ["cliente" => $cliente], [ "us" => $usuarios ]);
        }else{
            return redirect()->route('tela_login'); 
        }
    }

}
