<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use course\User;
use course\Estado;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
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
         
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++         
        User::create( [
            'name' => 'generico' ,
            'email' => 'generico@mail.com'
        ] );
        User::create( [
            'name' => 'admin' ,
            'email' => 'admin@mail.com',
            'password' => '123',
            'admin' => '1'
        ] );



        Model::reguard();
    }
}
