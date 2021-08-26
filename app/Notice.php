<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'subtitulo', 'conteudo', 'fonte', 'url', 'data_publicacao'
    ];
}
