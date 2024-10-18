<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    // use SoftDeletes, Timestamp;

    protected $table = 'produtos';

    protected $fillable = [
        'imagem',
        'nome',
        'sku',
        'valor',
        'quantidade',
        'unidade_medida_id',
        'categoria_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }

    public function unidadeMedida()
    {
        return $this->belongsTo(UnidadeMedida::class, 'unidade_medida_id', 'id');
    }
}
