<?php

namespace course;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    protected $fillable = [
        'nombre',
        'codigo',
        'empresa_id'
        
    ];
    
    
    
    public function empresa()
    {
        return $this->belongsTo('course\Empresa');
    }
    
    
    public function toArray()
    {
        $array = parent::toArray();
        $array['empresa'] = $this->empresa;
        return $array;
    }
    
    
}
