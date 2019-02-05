<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;
use App\Produto;
use App\User;
use App\Produtos_vendas;
use Illuminate\Support\Facades\DB;

class ControllerOrcamento extends Controller
{
    private $venda;
    public function __construct(Venda $venda){
        $this->venda                  = $venda;
    }

    public function index()
    {
        
        $vendas = Venda::with('usuario', 'produtos')->where(function ($query) {
            $query->where('statusVenda', '=', 'Orcamento')
            ->orWhere('statusVenda', '=', 'Negociando');
        })->get();//toSql();//get(); 
          
        return view('samples.OrcamentoIndex', ['vendas' => $vendas]);
    }

    public function visualizar($id)
    {
        $vendas = $this->venda->with('usuario', 'produtos')->where('idVenda', '=', $id)->get();
        
        return view('samples.OrcamentoVisualizar', ['vendas' => $vendas]);
    }

    public function editar($id)
    {   
        $produtos                     = Produto::select('idProduto','nome','valorMedio')->get();

        //$pivos = Produtos_vendas::where('id_venda', $id)->get();

        $users                        = User::select('id','name')->get();
        //dd($users);
        $vendas                       = Venda::with('usuario',  'produtos')->where('idVenda', '=', $id)->get();
        
        

       

       return view('samples.OrcamentoEditar', ['vendas' => $vendas, 'produtos' => $produtos, 'users' => $users]);

        
    }

    public function editarSalvar(Request $request, $id)
    {   
        //dd($request->all());
        //dd($request->FkUsers);
        //traz todos os aray dos inputes e armazena em variaveis
        $produtos                     = $request->idProduto;
        $quantidade                   = $request->qtd;
        $valores                      = $request->vlProduto;
        //procurar saber se esse produto ja foi cadastrado anteriomente
        $verificacao   = Produtos_vendas::where('id_venda',  $id)
        ->where('id_produto', $produtos)
        ->exists();   
        
        //verifica se a variavel traz valor boolean true se existir retorna uma mensagem
        if( $verificacao == TRUE){
            return redirect('/sample/orcamento/editar/'.$id)->with(['error' => 'Já existe dados iguais cadastrados.Para não obter dados duplicados apague todos os produtos é insira com todos os produtos pretendidos']);
            
        }  
        if($request->valorTotal > 0){
            $dataForm = [
                "dataEntrega" => $request->dataEntrega,
                "valorTotal" => $request->valorTotal,
                "statusVenda" => $request->statusVenda,
                "entrada" => $request->entrada,
                "medidas" => $request->medidas,
                "descricao" => $request->descricao,
            ];
        }else{
            $dataForm = [
                "dataEntrega" => $request->dataEntrega,
                "statusVenda" => $request->statusVenda,
                "entrada" => $request->entrada,
                "descricao" => $request->descricao,
                "medidas" => $request->medidas,
                
            ];
        }

        $teste = "UPDATE 'vendas' SET 'FkUsers' = '2' WHERE 'vendas'.'idVenda' = 1";

        $updatenome = DB::update("update vendas set FkUsers = '{$request->FkUsers}' where idVenda = '{$id}'");
        $venda = Venda::find($id);
        $venda->update($dataForm);
        
        
        if($produtos != null){
        $attributes                   = [];
        foreach($produtos as  $index => $produ)
        {
             /// cria o array com indece da tabela
            $attributes = [
               'id_produto' => $produ,
               'qtd' => $quantidade[$index],
               'valor' => $valores[$index]
            ];
            //grava s produtos na tabela pivo
            $produto                  = $venda->produtos()->attach([$id => $attributes]);
                      
        } 
           
        }
            
           
        //$produto = $venda->produtos()->sync([$id => ['id_produto' => 1, 'qtd' => 2, 'valor' => 50 ], ['id_produto' => 2, 'qtd' => 2, 'valor' => 50 ]]);
        
        
        if($venda){
            
            return redirect('/sample/orcamento');
        }else{
            return redirect()->route('/sample/orcamento/editar/'.$id)->with(['errors' => 'Falha ao Editar']);
        }
    } 
    
    public function deletarProduto(Request $request, $id)
    {   

        $venda = Venda::find($id);
        $valores = $request->produto;
        
        $venda->produtos()->detach([$valores]);

        //$response = array("success" => true);
        $vendas   = Venda::with('usuario',  'produtos')->where('idVenda', '=', $id)->get();

        
       


       foreach ($vendas as  $venda) {

        $resultado= "<form id='form-tabela'>
                    <table class='table' >
                        <input id='id' type='hidden' value='{$venda->idVenda}' name='id'>
                      <thead>
                      <p>Selecione somente um item por vez para deletar ou editar</p>
                        <tr>
                        <th scope='col'>#</th>
                        <th scope='col'>Produto</th>
                        <th scope='col'>Quantidade</th>
                        <th scope='col'>Gastos</th>
                        <th scope='col'>Taxa de Entrega</th>
                        <th scope='col'>Taxa Adicionais</th>
                        <th scope='col'>Deletar</th>
                        </tr>
                      </thead>";
          
          
            foreach ($venda->produtos as $value){
                
                    $resultado .= "<div class='tabela-produtos'>
                    <tbody id='produtos'>
                    <tr>                  
                        <td>{$value->idProduto}</td>
                        <td>{$value->nome}</td>
                        <td>
                            <input type='number' class='form col-3' name='qtd' value='{$value->pivot->qtd}' id='qtd' disabled style='width: 100%;padding: 0;'>
                            <button type='button' value='editar modal' id='bnt-editar-qtd' class='btn btn-default btn-sm' data-toggle='modal' data-target='#qtdModal' data-qtd='{$value->pivot->qtd}' data-idproduto='{$value->pivot->id_produto}' data-idpivo='{$value->pivot->id}' data-idvenda='{$value->pivot->id_venda}'><span class='fas fa-pen-square fa-2x'></span></button>
                        </td>
                        <td>
                           
                            <input type='text' class='form col-4' name='gasto' value='{$value->pivot->gasto}' id='input-gasto' disabled style='width: 100%;padding: 0;'>
                            <button type='button' value='editar modal' id='bnt-editar-gasto' class='btn btn-default btn-sm' data-toggle='modal' data-target='#gastoModal' data-qtd='' data-idproduto='{$value->pivot->id_produto}' data-idpivo='{$value->pivot->id}' data-idvenda='{$value->pivot->id_venda}' data-gasto='{$value->pivot->gasto}'><span class='fas fa-pen-square fa-2x'></span></button>
                        </td>
                        <td>
                            
                            <input tye='number' class='form col-4' name='taxaEntrega' value='{$value->pivot->taxaEntrega}' id='input-taxaEntrega' disabled style='width: 100%;padding: 0;'>
                            <button type='button' value='editar modal' id='bnt-editar-taxaEntrega' class='btn btn-default btn-sm' data-toggle='modal' data-target='#taxaEntregaModal'  data-idproduto='{$value->pivot->id_produto}' data-idpivo='{$value->pivot->id}' data-idvenda='{$value->pivot->id_venda}' data-taxa-entrega='{$value->pivot->taxaEntrega}'><span class='fas fa-pen-square fa-2x'></span></button>
                        </td>
                        <td>
                            <!--Editando modal Taxa Adicionais-->
                            <input type='number' class='form col-4' name='taxaAdd' value='{$value->pivot->taxaAdd}' id='input-taxaAdd' disabled style='width: 100%;padding: 0;'>
                            <button type='button' value='editar modal' id='bnt-editar-taxaAdd' class='btn btn-default btn-sm' data-toggle='modal' data-target='#taxaAddModal'  data-idproduto='{{$value->pivot->id_produto}}' data-idpivo='{{$value->pivot->id}}' data-idvenda='{{$value->pivot->id_venda}}' data-taxa-add='{{$value->pivot->taxaAdd}}'><span class='fas fa-pen-square fa-2x'></span></button>
                        </td>
                        <td><input type='checkbox' name='checks[]' value='{$value->idProduto}' id='pro'></td>
                    </tr>             
                      </tbody>
                      </div>";     
              
                }
            }
          
          
          
            $resultado .= "</table>
                  <div class='text-right'>
                      <input type='submit' id='deletar' class='btn btn-danger' value='Deletar'>
                    </div>
                  </form>";


    
        return $resultado;
    }

    public function QtdProduto(Request $request, $id)
    {
       // dd($request->all());
        $dataFormqtd = [
            "qtd" => $request->qtd,
        ];


            $pivo =  Produtos_vendas::find($request->id);
            $valorBanco = $pivo->valor;
            $decontoBanco = $pivo->desconto;                
            $gastoBanco = $pivo->gasto;
            $taxaEntregaBanco = $pivo->taxaEntrega;
            $taxaAddBanco = $pivo->taxaAdd;
            $valorTotal = $valorBanco *  $request->qtd;

            $resultadovalor = ($valorTotal + $gastoBanco + $taxaEntregaBanco + $taxaAddBanco - $decontoBanco );

            $venda = Venda::find($id);
            
            $dataFormtotal = [
                "valorTotal" => $resultadovalor,
            ];

            $total = $venda->update($dataFormtotal);
            $update = $pivo->update($dataFormqtd);

            

            $vendas = Venda::with('usuario',  'produtos')->where('idVenda', '=', $id)->get();
            foreach ($vendas as  $venda) {
        
            $resultado = "<form id='form-tabela'>                
                    
            <table class='table' >
                <thead>
                <p>Selecione somente um item por vez para deletar ou editar</p>
                <tr>
                <th scope='col'>#</th>
                <th scope='col'>Produto</th>
                <th scope='col'>Quantidade</th>
                <th scope='col'>Gastos</th>
                <th scope='col'>Taxa de Entrega</th>
                <th scope='col'>Taxa Adicionais</th>
                <th scope='col'>Deletar</th>
                </tr>
                </thead>";

                foreach ($venda->produtos as $value){
                
                    $resultado .= "<div class='tabela-produtos'>
                <tbody id='produtos'>
                <tr>                  
                    <td>{$value->idProduto}</td>
                    <td>{$value->nome}</td>
                    <td>
                        <input type='number' class='form col-3' name='qtd' value='{$value->pivot->qtd}' id='qtd' disabled style='width: 100%;padding: 0;'>
                        <button type='button' value='editar modal' id='bnt-editar-qtd' class='btn btn-default btn-sm' data-toggle='modal' data-target='#qtdModal' data-qtd='{$value->pivot->qtd}' data-idproduto='{$value->pivot->id_produto}' data-idpivo='{$value->pivot->id}' data-idvenda='{$value->pivot->id_venda}'><span class='fas fa-pen-square fa-2x'></span></button>
                    </td>
                    <td>
                       
                        <input type='text' class='form col-4' name='gasto' value='{$value->pivot->gasto}' id='input-gasto' disabled style='width: 100%;padding: 0;'>
                        <button type='button' value='editar modal' id='bnt-editar-gasto' class='btn btn-default btn-sm' data-toggle='modal' data-target='#gastoModal' data-qtd='' data-idproduto='{$value->pivot->id_produto}' data-idpivo='{$value->pivot->id}' data-idvenda='{$value->pivot->id_venda}' data-gasto='{$value->pivot->gasto}'><span class='fas fa-pen-square fa-2x'></span></button>
                    </td>
                    <td>
                        
                        <input tye='number' class='form col-4' name='taxaEntrega' value='{$value->pivot->taxaEntrega}' id='input-taxaEntrega' disabled style='width: 100%;padding: 0;'>
                        <button type='button' value='editar modal' id='bnt-editar-taxaEntrega' class='btn btn-default btn-sm' data-toggle='modal' data-target='#taxaEntregaModal'  data-idproduto='{$value->pivot->id_produto}' data-idpivo='{$value->pivot->id}' data-idvenda='{$value->pivot->id_venda}' data-taxa-entrega='{$value->pivot->taxaEntrega}'><span class='fas fa-pen-square fa-2x'></span></button>
                    </td>
                    <td>
                        <!--Editando modal Taxa Adicionais-->
                        <input type='number' class='form col-4' name='taxaAdd' value='{$value->pivot->taxaAdd}' id='input-taxaAdd' disabled style='width: 100%;padding: 0;'>
                        <button type='button' value='editar modal' id='bnt-editar-taxaAdd' class='btn btn-default btn-sm' data-toggle='modal' data-target='#taxaAddModal'  data-idproduto='{{$value->pivot->id_produto}}' data-idpivo='{{$value->pivot->id}}' data-idvenda='{{$value->pivot->id_venda}}' data-taxa-add='{{$value->pivot->taxaAdd}}'><span class='fas fa-pen-square fa-2x'></span></button>
                    </td>
                    <td><input type='checkbox' name='checks[]' value='{$value->idProduto}' id='pro'></td>
                </tr>";     
                    
                }
                }                   
                
                $resultado .= "</tbody>
                </div>
            </table>
                <div class='text-right'>
                    <input type='submit' class='btn btn-danger' value='Deletar'>
                </div>
            </form>";

                if($update){
                    return $resultado;//redirect('/sample/orcamento');
                }else{
                    return $resultado;//redirect('/sample/orcamento');
                }

        
    }


    public function GastoProduto(Request $request, $id)
    {
        $dataFormgasto = [
            "gasto" => $request->gasto,
        ];

        $pivo =  Produtos_vendas::find($request->id);
        $valorBanco = $pivo->valor;
        $qtdBanco = $pivo->qtd;
        $decontoBanco = $pivo->desconto;                
        $gasto = $request->gasto;
        $taxaEntregaBanco = $pivo->taxaEntrega;
        $taxaAddBanco = $pivo->taxaAdd;

        $valorTotal = (($valorBanco  *  $qtdBanco) + $taxaEntregaBanco +  $gasto + $taxaAddBanco - $decontoBanco);
        
        $venda = Venda::find($id);
            
            $dataFormtotal = [
                "valorTotal" => $valorTotal,
        ];
            
        $update = $pivo->update($dataFormgasto);
        $total = $venda->update($dataFormtotal);
            
        
        
        
        $vendas = Venda::with('usuario',  'produtos')->where('idVenda', '=', $id)->get();
            foreach ($vendas as  $venda) {
        
            $resultado = "<form id='form-tabela'>                
                    
            <table class='table' >
                <thead>
                <p>Selecione somente um item por vez para deletar ou editar</p>
                <tr>
                <th scope='col'>#</th>
                <th scope='col'>Produto</th>
                <th scope='col'>Quantidade</th>
                <th scope='col'>Gastos</th>
                <th scope='col'>Taxa de Entrega</th>
                <th scope='col'>Taxa Adicionais</th>
                <th scope='col'>Deletar</th>
                </tr>
                </thead>";

                foreach ($venda->produtos as $value){
                
                    $resultado .= "<div class='tabela-produtos'>
                <tbody id='produtos'>
                <tr>                  
                    <td>{$value->idProduto}</td>
                    <td>{$value->nome}</td>
                    <td>
                        <input type='number' class='form col-3' name='qtd' value='{$value->pivot->qtd}' id='qtd' disabled style='width: 100%;padding: 0;'>
                        <button type='button' value='editar modal' id='bnt-editar-qtd' class='btn btn-default btn-sm' data-toggle='modal' data-target='#qtdModal' data-qtd='{$value->pivot->qtd}' data-idproduto='{$value->pivot->id_produto}' data-idpivo='{$value->pivot->id}' data-idvenda='{$value->pivot->id_venda}'><span class='fas fa-pen-square fa-2x'></span></button>
                    </td>
                    <td>
                       
                        <input type='text' class='form col-4' name='gasto' value='{$value->pivot->gasto}' id='input-gasto' disabled style='width: 100%;padding: 0;'>
                        <button type='button' value='editar modal' id='bnt-editar-gasto' class='btn btn-default btn-sm' data-toggle='modal' data-target='#gastoModal' data-qtd='' data-idproduto='{$value->pivot->id_produto}' data-idpivo='{$value->pivot->id}' data-idvenda='{$value->pivot->id_venda}' data-gasto='{$value->pivot->gasto}'><span class='fas fa-pen-square fa-2x'></span></button>
                    </td>
                    <td>
                        
                        <input tye='number' class='form col-4' name='taxaEntrega' value='{$value->pivot->taxaEntrega}' id='input-taxaEntrega' disabled style='width: 100%;padding: 0;'>
                        <button type='button' value='editar modal' id='bnt-editar-taxaEntrega' class='btn btn-default btn-sm' data-toggle='modal' data-target='#taxaEntregaModal'  data-idproduto='{$value->pivot->id_produto}' data-idpivo='{$value->pivot->id}' data-idvenda='{$value->pivot->id_venda}' data-taxa-entrega='{$value->pivot->taxaEntrega}'><span class='fas fa-pen-square fa-2x'></span></button>
                    </td>
                    <td>
                        <!--Editando modal Taxa Adicionais-->
                        <input type='number' class='form col-4' name='taxaAdd' value='{$value->pivot->taxaAdd}' id='input-taxaAdd' disabled style='width: 100%;padding: 0;'>
                        <button type='button' value='editar modal' id='bnt-editar-taxaAdd' class='btn btn-default btn-sm' data-toggle='modal' data-target='#taxaAddModal'  data-idproduto='{{$value->pivot->id_produto}}' data-idpivo='{{$value->pivot->id}}' data-idvenda='{{$value->pivot->id_venda}}' data-taxa-add='{{$value->pivot->taxaAdd}}'><span class='fas fa-pen-square fa-2x'></span></button>
                    </td>
                    <td><input type='checkbox' name='checks[]' value='{$value->idProduto}' id='pro'></td>
                </tr>";     
                    
                }
                }                   
                
                $resultado .= "</tbody>
                </div>
            </table>
                <div class='text-right'>
                    <input type='submit' class='btn btn-danger' value='Deletar'>
                </div>
            </form>";

                if($update){
                    return $resultado;//redirect('/sample/orcamento');
                }else{
                    return $resultado;//redirect('/sample/orcamento');
                }
    }
    public function TaxaEntregaProduto(Request $request, $id)
    {   
        $dataFormgasto = [
            "taxaEntrega" => $request->taxaEntrega,
        ];

        $pivo =  Produtos_vendas::find($request->id);
        $valorBanco = $pivo->valor;
        $qtdBanco = $pivo->qtd;
        $decontoBanco = $pivo->desconto;                
        $gasto = $pivo->gasto;
        $taxaEntregaBanco = $request->taxaEntrega;
        $taxaAddBanco = $pivo->taxaAdd;

        $valorTotal = (($valorBanco  *  $qtdBanco) + $taxaEntregaBanco +  $gasto + $taxaAddBanco - $decontoBanco);
        
        $venda = Venda::find($id);
            
            $dataFormtotal = [
                "valorTotal" => $valorTotal,
        ];
            
        $update = $pivo->update($dataFormgasto);
        $total = $venda->update($dataFormtotal);
            
        
        
        
        $vendas = Venda::with('usuario',  'produtos')->where('idVenda', '=', $id)->get();
            foreach ($vendas as  $venda) {
        
            $resultado = "<form id='form-tabela'>                
                    
            <table class='table' >
                <thead>
                <p>Selecione somente um item por vez para deletar ou editar</p>
                <tr>
                <th scope='col'>#</th>
                <th scope='col'>Produto</th>
                <th scope='col'>Quantidade</th>
                <th scope='col'>Gastos</th>
                <th scope='col'>Taxa de Entrega</th>
                <th scope='col'>Taxa Adicionais</th>
                <th scope='col'>Deletar</th>
                </tr>
                </thead>";

                foreach ($venda->produtos as $value){
                
                    $resultado .= "<div class='tabela-produtos'>
                <tbody id='produtos'>
                <tr>                  
                    <td>{$value->idProduto}</td>
                    <td>{$value->nome}</td>
                    <td>
                        <input type='number' class='form col-3' name='qtd' value='{$value->pivot->qtd}' id='qtd' disabled style='width: 100%;padding: 0;'>
                        <button type='button' value='editar modal' id='bnt-editar-qtd' class='btn btn-default btn-sm' data-toggle='modal' data-target='#qtdModal' data-qtd='{$value->pivot->qtd}' data-idproduto='{$value->pivot->id_produto}' data-idpivo='{$value->pivot->id}' data-idvenda='{$value->pivot->id_venda}'><span class='fas fa-pen-square fa-2x'></span></button>
                    </td>
                    <td>
                       
                        <input type='text' class='form col-4' name='gasto' value='{$value->pivot->gasto}' id='input-gasto' disabled style='width: 100%;padding: 0;'>
                        <button type='button' value='editar modal' id='bnt-editar-gasto' class='btn btn-default btn-sm' data-toggle='modal' data-target='#gastoModal' data-qtd='' data-idproduto='{$value->pivot->id_produto}' data-idpivo='{$value->pivot->id}' data-idvenda='{$value->pivot->id_venda}' data-gasto='{$value->pivot->gasto}'><span class='fas fa-pen-square fa-2x'></span></button>
                    </td>
                    <td>
                        
                        <input tye='number' class='form col-4' name='taxaEntrega' value='{$value->pivot->taxaEntrega}' id='input-taxaEntrega' disabled style='width: 100%;padding: 0;'>
                        <button type='button' value='editar modal' id='bnt-editar-taxaEntrega' class='btn btn-default btn-sm' data-toggle='modal' data-target='#taxaEntregaModal'  data-idproduto='{$value->pivot->id_produto}' data-idpivo='{$value->pivot->id}' data-idvenda='{$value->pivot->id_venda}' data-taxa-entrega='{$value->pivot->taxaEntrega}'><span class='fas fa-pen-square fa-2x'></span></button>
                    </td>
                    <td>
                        <!--Editando modal Taxa Adicionais-->
                        <input type='number' class='form col-4' name='taxaAdd' value='{$value->pivot->taxaAdd}' id='input-taxaAdd' disabled style='width: 100%;padding: 0;'>
                        <button type='button' value='editar modal' id='bnt-editar-taxaAdd' class='btn btn-default btn-sm' data-toggle='modal' data-target='#taxaAddModal'  data-idproduto='{{$value->pivot->id_produto}}' data-idpivo='{{$value->pivot->id}}' data-idvenda='{{$value->pivot->id_venda}}' data-taxa-add='{{$value->pivot->taxaAdd}}'><span class='fas fa-pen-square fa-2x'></span></button>
                    </td>
                    <td><input type='checkbox' name='checks[]' value='{$value->idProduto}' id='pro'></td>
                </tr>";     
                    
                }
                }                   
                
                $resultado .= "</tbody>
                </div>
            </table>
                <div class='text-right'>
                    <input type='submit' class='btn btn-danger' value='Deletar'>
                </div>
            </form>";

                if($update){
                    return $resultado;//redirect('/sample/orcamento');
                }else{
                    return $resultado;//redirect('/sample/orcamento');
                }
    }
    public function TaxaAddProduto(Request $request, $id)
    {
        $dataFormgasto = [
            "taxaAdd" => $request->taxaAdd,
        ];

        $pivo =  Produtos_vendas::find($request->id);
        $valorBanco = $pivo->valor;
        $qtdBanco = $pivo->qtd;
        $decontoBanco = $pivo->desconto;                
        $gasto = $pivo->gasto;
        $taxaEntregaBanco = $pivo->taxaEntrega;
        $taxaAddBanco = $request->taxaAdd;

        $valorTotal = (($valorBanco  *  $qtdBanco) + $taxaEntregaBanco +  $gasto + $taxaAddBanco - $decontoBanco);
        
        $venda = Venda::find($id);
            
            $dataFormtotal = [
                "valorTotal" => $valorTotal,
        ];
            
        $update = $pivo->update($dataFormgasto);
        $total = $venda->update($dataFormtotal);
            
        
        
        
        $vendas = Venda::with('usuario',  'produtos')->where('idVenda', '=', $id)->get();
            foreach ($vendas as  $venda) {
        
            $resultado = "<form id='form-tabela'>                
                    
            <table class='table' >
                <thead>
                <p>Selecione somente um item por vez para deletar ou editar</p>
                <tr>
                <th scope='col'>#</th>
                <th scope='col'>Produto</th>
                <th scope='col'>Quantidade</th>
                <th scope='col'>Gastos</th>
                <th scope='col'>Taxa de Entrega</th>
                <th scope='col'>Taxa Adicionais</th>
                <th scope='col'>Deletar</th>
                </tr>
                </thead>";

                foreach ($venda->produtos as $value){
                
                    $resultado .= "<div class='tabela-produtos'>
                <tbody id='produtos'>
                <tr>                  
                    <td>{$value->idProduto}</td>
                    <td>{$value->nome}</td>
                    <td>
                        <input type='number' class='form col-3' name='qtd' value='{$value->pivot->qtd}' id='qtd' disabled style='width: 100%;padding: 0;'>
                        <button type='button' value='editar modal' id='bnt-editar-qtd' class='btn btn-default btn-sm' data-toggle='modal' data-target='#qtdModal' data-qtd='{$value->pivot->qtd}' data-idproduto='{$value->pivot->id_produto}' data-idpivo='{$value->pivot->id}' data-idvenda='{$value->pivot->id_venda}'><span class='fas fa-pen-square fa-2x'></span></button>
                    </td>
                    <td>
                       
                        <input type='text' class='form col-4' name='gasto' value='{$value->pivot->gasto}' id='input-gasto' disabled style='width: 100%;padding: 0;'>
                        <button type='button' value='editar modal' id='bnt-editar-gasto' class='btn btn-default btn-sm' data-toggle='modal' data-target='#gastoModal' data-qtd='' data-idproduto='{$value->pivot->id_produto}' data-idpivo='{$value->pivot->id}' data-idvenda='{$value->pivot->id_venda}' data-gasto='{$value->pivot->gasto}'><span class='fas fa-pen-square fa-2x'></span></button>
                    </td>
                    <td>
                        
                        <input tye='number' class='form col-4' name='taxaEntrega' value='{$value->pivot->taxaEntrega}' id='input-taxaEntrega' disabled style='width: 100%;padding: 0;'>
                        <button type='button' value='editar modal' id='bnt-editar-taxaEntrega' class='btn btn-default btn-sm' data-toggle='modal' data-target='#taxaEntregaModal'  data-idproduto='{$value->pivot->id_produto}' data-idpivo='{$value->pivot->id}' data-idvenda='{$value->pivot->id_venda}' data-taxa-entrega='{$value->pivot->taxaEntrega}'><span class='fas fa-pen-square fa-2x'></span></button>
                    </td>
                    <td>
                        <!--Editando modal Taxa Adicionais-->
                        <input type='number' class='form col-4' name='taxaAdd' value='{$value->pivot->taxaAdd}' id='input-taxaAdd' disabled style='width: 100%;padding: 0;'>
                        <button type='button' value='editar modal' id='bnt-editar-taxaAdd' class='btn btn-default btn-sm' data-toggle='modal' data-target='#taxaAddModal'  data-idproduto='{{$value->pivot->id_produto}}' data-idpivo='{{$value->pivot->id}}' data-idvenda='{{$value->pivot->id_venda}}' data-taxa-add='{{$value->pivot->taxaAdd}}'><span class='fas fa-pen-square fa-2x'></span></button>
                    </td>
                    <td><input type='checkbox' name='checks[]' value='{$value->idProduto}' id='pro'></td>
                </tr>";     
                    
                }
                }                   
                
                $resultado .= "</tbody>
                </div>
            </table>
                <div class='text-right'>
                    <input type='submit' class='btn btn-danger' value='Deletar'>
                </div>
            </form>";

                if($update){
                    return $resultado;//redirect('/sample/orcamento');
                }else{
                    return $resultado;//redirect('/sample/orcamento');
                }
    }
}
