<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    protected $table = 'item';
    protected $fillable = ['nome', 'ativo', 'quantidade'];

    /**
     * Relacionamento com o model MovimentacaoEstoque.
     * Um item pode ter várias movimentações.
     */
    public function movimentacoes()
    {
        return $this->hasMany(MovimentacaoEstoque::class, 'item_id');
    }
}
