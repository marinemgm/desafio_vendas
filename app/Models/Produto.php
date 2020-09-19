<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'descricao',
        'estoque',
        'preco',
        'fabricante_id'
    ];

    public function fabricante()
    {
        return $this->belongsTo(Fabricante::class);
    }
}
