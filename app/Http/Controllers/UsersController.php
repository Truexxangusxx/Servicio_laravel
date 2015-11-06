<?php
namespace course\Http\Controllers;

use Illuminate\Http\Request;
use course\Http\Requests;
use course\Http\Controllers\Controller;
use course\User;
use Session;

class UsersController extends Controller{

        public function getIndex(Request $request){
            header("Access-Control-Allow-Origin: *");
            header("Allow: GET, POST, OPTIONS");
            
            
            
            $colaborador =$request->input('colaborador');
            
            if ($colaborador==null){
                $users = User::all();
            }
            else{
                $users = User::where('colaborador',$colaborador)->get();
            }
            
            
            return $users;
            
        }
        
        
        public function registrar(Request $request){
            header("Access-Control-Allow-Origin: *");
            header("Allow: GET, POST, OPTIONS");
            
            $result = "se registrara el usuario: ".$nombre.", con email: ".$email." y dni: ".$dni;
           
            
            return $result;
            
        }
        
        
        public function getCreate(Request $request)
        {
            header("Access-Control-Allow-Origin: *");
            header("Allow: GET, POST, OPTIONS");
            
            $nombre =$request->input('nombre');
            $dni =$request->input('dni');
            $email =$request->input('email');
            $password =$request->input('password');
            
            $user = User::create(['name' => $nombre, "dni" => $dni,'email' => $email, "password" => $password]);
            
            return $user;
        }
        
    
        public function iniciar_sesion(Request $request)
        {
            header("Access-Control-Allow-Origin: *");
            header("Allow: GET, POST, OPTIONS");
            
            $email =$request->input('email');
            $password =$request->input('password');
            
            $user = User::whereRaw('email=? and password=?', [$email,$password])->first();
            Session::put('user', $user);
            
            return $user;
        }
        
        public function cerrar_sesion(Request $request)
        {
            header("Access-Control-Allow-Origin: *");
            header("Allow: GET, POST, OPTIONS");
            
            Session::forget('user');
            
            return view('iniciar_sesion');
        }
        
        public function usuario_logeado(Request $request)
        {
            header("Access-Control-Allow-Origin: *");
            header("Allow: GET, POST, OPTIONS");
            
            return Session::get('user');
        }
        
    
}

