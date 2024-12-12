<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MovimentacaoEstoque extends Model
{
    use HasFactory;

    // Define a tabela associada ao model (opcional, se o nome da tabela for diferente do padrão)
    protected $table = 'movimentacoes_estoque';

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = ['item_id','tipo','quantidade'];

    /**
     * Relacionamento com o model ItemEstoque.
     * Uma movimentação pertence a um item de estoque.
     */
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
