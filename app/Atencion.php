<?php

namespace course;

use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    protected $fillable = ['user_id', 'lista_id', 'modo','codigo','colaborador_id','posicion'];
}