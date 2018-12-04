<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;
//use Mpdf;
use Mpdf\Mpdf;

class ControllerRelatorio extends Controller
{
    public function relatorioPDF(Request $request, Venda $venda)
    {
        $dataForm = $request->except('_token');
        $vendas = $venda->searsh($dataForm)->with('usuario', 'produto')->where('statusVenda', '=', 'Fechado')->get();
        

        $mpdf = new Mpdf();
        $receita = 0;
        $despesa = 0;
        $pagina = ob_get_clean();
        $pagina = utf8_encode($pagina);
        $pagina .= '<style type="text/css">
        .tabela-center {}
        .tg  {border-collapse:collapse;border-spacing:0;border-color:#aabcfe;}
        .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#669;background-color:#e8edff;}
        .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#039;background-color:#b9c9fe;}
        .tg .tg-hmp3{background-color:#D2E4FC;text-align:center;vertical-align:top;text-align:center;}
        .tg .tg-baqh{text-align:center;vertical-align:top}
        .tg .tg-mb3i{background-color:#D2E4FC;text-align:right;vertical-align:top}
        .tg .tg-lqy6{text-align:center;vertical-align:top}
        .tg .tg-0lax{text-align:center;vertical-align:top}
        </style>
        <div class="tabela-center">
        <table class="tg">
          <tr>
            <th width="100%" class="tg-baqh" colspan="6">Relatorio de Vendas Fechadas </th>
          </tr>
          <tr>
            <td width="5%" class="tg-hmp3">#</td>
            <td class="tg-hmp3">Cliente</td>
            <td class="tg-hmp3">Produto</td>
            <td class="tg-hmp3">Data da Entrega</td>
            <td class="tg-hmp3">Despesa</td>
            <td class="tg-hmp3">Receita</td>
          </tr>
          ';
          
          foreach($vendas as $venda){
          $receita = $receita + $venda->valorTotal;
          $despesa = $despesa + $venda->produto->gastoMedio;
          $pagina .= '<tr>
            <td class="tg-0lax">'.$venda->idVenda.'</td>
            <td class="tg-0lax">'.$venda->usuario->name.'</td>
            <td class="tg-lqy6">'.$venda->produto->nome.'</td>
            <td class="tg-lqy6">'.$venda->dataEntrega->format('d/m/Y').'</td>
            <td class="tg-lqy6">R$:'.$venda->produto->gastoMedio.'</td>
            <td class="tg-lqy6">R$:'.$venda->valorTotal.'</td>
          </tr>'; }
          
        $receita = number_format($receita, 2, ',', '.');
        $despesa = number_format($despesa, 2, ',', '.');

        $pagina .= '
        <tr>
            <th  class="tg-baqh" colspan="4">Total </th>
            <th  class="tg-baqh" >R$:'.$despesa.'</th>
            <th  class="tg-baqh" >R$:'.$receita.'</th>
        </tr>
        </table>
        </div>';
        $arquivo = "Relatorio.pdf";
        $mpdf->allow_charset_conversion = true;
        $mpdf->AddPage('L');
        $mpdf->WriteHTML($pagina);
        $mpdf->Output($arquivo, 'I');
        exit();

    }
}
