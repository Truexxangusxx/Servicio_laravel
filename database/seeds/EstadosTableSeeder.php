<?php

use Illuminate\Database\Seeder;
use course\Estado;
  
class EstadoTableSeeder extends Seeder {
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