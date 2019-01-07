<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Venda extends Model
{   
    //Nome da tabela.
    protected $table      = 'vendas';
    
    protected $dates = ['dataEntrega'];

    public  $timestamps   = true;

    //Primary Key da Tabela.
    protected $primaryKey = 'idVenda';

    protected $fillable = [
        'FKUsers','FKProdutos', 'qtd', 'dataEntrega', 'valorUnd',
        'desconto', 'gasto', 'taxaEntrega', 'taxaAdd', 'valorTotal',
        'statusVenda', 'entrada', 'descricao', 'medidas',
    ];

    public function usuario()
    {
        return $this->belongsTo('App\User', 'FkUsers');
         //     $this->hasOne(relacao, chave estrangeira, primary key);
         return $this->hasOne('App\User', 'FkUsers', 'idVenda');
    }
    
    public function produtos()
    {
        return $this->belongsToMany('App\Produto', 'produtos_vendas','id_venda','id_produto')->withPivot(['qtd','valor']);
    }


    public function produto()
    {
        return $this->belongsTo('App\Produto', 'FkProdutos');
    }

    public function searsh(array $data)
    {
        $pesquisa = $this->where(function ($query) use ($data) {
            if(isset($data['id'])) 
                $query->where('idVenda', $data['id']);
            if(isset($data['valorTotal'])) 
            $query->where('valorTotal', $data['valorTotal']);
            if(isset($data['dataInicial']) != NULL AND isset($data['dataFinal']) != NULL) {
                $query->whereBetween('dataEntrega', [
                    $data['dataInicial'],
                    $data['dataFinal'],
                ]);
                
            }else{
                if(isset($data['dataInicial'])) 
                $query->where('dataEntrega', '>=', $data['dataInicial']);
                if(isset($data['dataFinal'])) 
                $query->where('dataEntrega', '<=', $data['dataFinal']);
                if(isset($data['statusVenda'])) 
                $query->where('statusVenda', '=', $data['statusVenda']);
                
            }
            
        }); //->toSql();dd($pesquisa);
        
        return $pesquisa;
    }
}
