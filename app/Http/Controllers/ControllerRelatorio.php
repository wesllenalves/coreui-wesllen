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
        $vendas = $venda->searsh($dataForm)->where('statusVenda', '=', 'Fechado')->get();
        

        $mpdf = new Mpdf();
        $pagina = '<html>
        <head></head>
        <body>
        <p>Olá sou um arquivo pdf</p>
        </body>
        </html>';
        $arquivo = "Relatorio.pdf";

        $mpdf->WriteHTML($pagina);
        $mpdf->Output($arquivo, 'I');

    }
}
