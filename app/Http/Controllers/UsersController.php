<?php
namespace course\Http\Controllers;

use Illuminate\Http\Request;
use course\Http\Requests;
use course\Http\Controllers\Controller;
use course\User;
use Session;
use DB;
use Illuminate\Support\Facades\Response;

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
        
        public function usuario_logeado_xml(Request $request)
        {
            header("Access-Control-Allow-Origin: *");
            header("Allow: GET, POST, OPTIONS");
            
            $user = Session::get('user');

/*
            $xml = new \XMLWriter();
            $xml->openMemory();
            $xml->startDocument();
            $xml->startElement('user');
            
            $xml->startElement('data');
                
                foreach ($user as $nombre => $valor) {
                    $xml->writeAttribute("$nombre", $valor);
                }

                $xml->writeAttribute('id', $user->id);
                $xml->writeAttribute('name', $user->name);
                $xml->writeAttribute('email', $user->email);
                $xml->endElement();
          
            $xml->endElement();
            $xml->endDocument();
        
            $content = $xml->outputMemory();
            $xml = null;
            
            return response($content)->header('Content-Type', 'text/xml');
            */
            
            $data= DB::table('atencions')
            ->join('asignacions', function ($join) {
                $join->on('atencions.colaborador_id', '=', 'asignacions.user_id');
            })
            ->whereRaw('atencions.estado_id=1 and atencions.colaborador_id is not null and atencions.lista_id = asignacions.lista_id',[])
            ->get();
        
            $xml = new \XMLWriter();
            $xml->openMemory();
            $xml->startDocument();
            $xml->startElement('ventanillas');
                
                foreach ($data as $row) {
                    $xml->startElement('data');
                    $xml->writeAttribute("ventanilla", $row->ventanilla);
                    $xml->writeAttribute("numero", $row->numero);
                    $xml->endElement();
                }
          
            $xml->endElement();
            $xml->endDocument();
        
            $content = $xml->outputMemory();
            $xml = null;
            
            return response($content)->header('Content-Type', 'text/xml');
        
        }
        
        
        public function accesos(Request $request)
        {
            header("Access-Control-Allow-Origin: *");
            header("Allow: GET, POST, OPTIONS");
            
            return view('accesos');
        }
        
        public function buscar_user(Request $request)
        {
            header("Access-Control-Allow-Origin: *");
            header("Allow: GET, POST, OPTIONS");
            
            $email =$request->input('email');
            
            $user = User::whereRaw('email=?', [$email])->first();
            
            return $user;
        }
    
        public function actualizar_user(Request $request)
        {
            header("Access-Control-Allow-Origin: *");
            header("Allow: GET, POST, OPTIONS");
            
            $email =$request->input('email');
            $name =$request->input('name');
            $colaborador =$request->input('colaborador');
            $admin =$request->input('admin');
            
            $user = User::whereRaw('email=?', [$email])->first();
            $user->name=$name;
            $user->colaborador=$colaborador;
            $user->admin=$admin;
            $user->save();
            
            return $user;
        }
    
}

