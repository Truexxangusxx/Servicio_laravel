<?php

namespace course;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    protected $fillable = [
        'user_id',
        'lista_id',
        'ventanilla'
    ];
    
    
    public function user()
    {
        return $this->belongsTo('course\User');
    }
    
    public function lista()
    {
        return $this->belongsTo('course\Lista');
    }
    
    public function toArray()
    {
        $array = parent::toArray();
        $array['user'] = $this->user;
        $array['lista'] = $this->lista;
        return $array;
    }
    
    
    
}
