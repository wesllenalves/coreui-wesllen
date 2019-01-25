<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/sample/relatorio/editar',
        '/sample/orcamento/OrcamentoEditar/qtd/*', // * significa que todo o resto da url entrarar na exceção
        
    ];
}
