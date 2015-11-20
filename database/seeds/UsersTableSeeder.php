<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use course\User;
  
class UsersTableSeeder extends Seeder {
    public function run() {
        
        User::create( [
            'nombre' => 'generico' ,
            'email' => 'generico@mail.com'
        ] );
        
    }
}