<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class ControllerProduto extends Controller
{   
    private $produto;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }
    public function index(){
        $produtos = $this->produto->all();
        return view('samples.ProdutoIndex', ['produtos' => $produtos]);
    }
    
    public function adicionar(){
        
        return view('samples.Adicionar-produto');
    }
}
