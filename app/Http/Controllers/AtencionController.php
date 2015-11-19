<?php

namespace course\Http\Controllers;

use Illuminate\Http\Request;
use course\Http\Requests;
use course\Http\Controllers\Controller;
use course\User;
use Illuminate\Support\Facades\Mail;
use course\Atencion;
use course\Lista;
use course\Asignacion;
use Session;

class AtencionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        
        
        $user_id =$request->input('user_id');
        $lista_id =$request->input('lista_id');
        $modo =$request->input('modo');
        
        $usuario = User::find($user_id);
        
        $atencion = Atencion::create(['user_id' => $user_id, "lista_id" => $lista_id
        ,'modo' => $modo]);
        
        
        $codigo=$atencion->id.date("d").date("i");
        
        
        $atencion->codigo = $codigo;
        $atencion->save();
        
        
        
        switch ($modo) {
            case "correo":
                $data = array(
                'codigo' => $atencion->codigo,
                'usuario' => $usuario,
                );
            
                Mail::send('mails.test', $data, function ($message) use ($usuario) {
                    $message->to($usuario->email)->subject('codigo de generacion');
                });
                
                $result = "Se envió un correo a: ".$usuario->email;        
                break;
            case "imprimir":
                
                $atencion->posicion = Atencion::whereRaw('numero is not null and lista_id = ?', [$atencion->lista_id])->count()+1;
                $atencion->save();
                
                $lista = Lista::find( $atencion->lista_id);
                $atencion->numero=$lista->codigo.$atencion->posicion;
                $atencion->estado_id=1;//estado 1 es en espera
                $atencion->save();
                $result = $atencion->numero;
                
                break;
        }
        
        
        
        if ($modo=="correo"){
            
        }
        else{
            
        }
        
        
        $request->session()->put('atencion', $atencion);
        return $result;
    }

    public function generar_ticket(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        
        $user_id =$request->input('user_id');
        $codigo =$request->input('codigo');
        
        
        $atencion = Atencion::whereRaw('user_id = ? and codigo = ?', [$user_id,$codigo])->get()->first();
        
        if ($atencion == null){
            Session::put('atencion', $atencion);
            return $atencion;
        }
        else{
            if ($atencion->posicion == null){
                $atencion->posicion = Atencion::whereRaw('numero is not null and lista_id = ?', [$atencion->lista_id])->count()+1;
                $atencion->save();
                
                $lista = Lista::find( $atencion->lista_id);
                $atencion->numero=$lista->codigo.$atencion->posicion;
                $atencion->estado_id=1;//estado 1 es en espera
                $atencion->save();
                
            }
            
            //estado_id=1 es en espera
            $predecesores = Atencion::whereRaw('estado_id = 1 and posicion < ? and lista_id = ?', [$atencion->posicion,$atencion->lista_id])->count();
            
            
            $array=$atencion->toArray();
            $array['predecesores'] = $predecesores;
            $array['tiempo'] = ($predecesores*5)." minutos";
            Session::put('atencion', $array);
            return $array;
        }
        
    }

    public function obtener_sesion(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        $atencion=Session::get('user');
        return Session::get('user');//$request->session()->get('user');
    }
    
    public function obtener_sesion_atencion(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        
        return Session::get('atencion');
    }
    
    
    public function obtener_lista(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        
        $lista_id=$request->input('lista_id');
        $user_id=$request->input('user_id');
        
        $atenciones = Atencion::whereRaw('lista_id=? and estado_id=1',[$lista_id])->take(4)->get();
        $atenciones[0]->colaborador_id=$user_id;
        $atenciones[0]->save();
        
        return $atenciones;
    }
    
    public function atender_atencion(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        
        $id=$request->input('id');
        $estado_id=$request->input('estado_id');
        
        $atencion = Atencion::find($id);
        $atencion->estado_id=$estado_id;
        $atencion->save();
        
        return $atencion;
    }
    
    public function ultimo_atendido(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        
        $lista_id=$request->input('lista_id');
        $user_id=$request->input('user_id');
        
        $atenciones = Atencion::whereRaw('lista_id=? and estado_id<>1',[$lista_id])->orderBy('id', 'desc')->first();
        
        return $atenciones;
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
