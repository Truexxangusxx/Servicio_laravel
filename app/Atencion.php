<?php

namespace course;

use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    protected $fillable = ['user_id', 'lista_id', 'modo','codigo','colaborador_id','posicion','numero','estado_id','updated_at','fecha_generado','fecha_asignado','fecha_atendido','fecha_ausente','telefono'];
    
    
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