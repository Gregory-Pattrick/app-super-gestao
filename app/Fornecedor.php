<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    #traits
    use SoftDeletes;

    protected $table = 'fornecedores';
    protected $fillable = [
        'nome',
        'site',
        'uf',
        'email'
    ];
}
