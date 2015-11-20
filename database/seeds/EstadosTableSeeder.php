<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use course\Estado;
  
class EstadosTableSeeder extends Seeder {
    public function run() {
        
        Estado::truncate(); 
        
        Estado::create( [
            'nombre' => 'En espera' ,
        ] );
        
        Estado::create( [
            'nombre' => 'Atendido' ,
        ] );
        
        Estado::create( [
            'nombre' => 'Ausente' ,
        ] );
    }
}