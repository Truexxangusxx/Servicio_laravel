<?php

namespace course\Http\Controllers;

use Illuminate\Http\Request;
use course\Http\Requests;
use course\Http\Controllers\Controller;
use course\User;
use Illuminate\Support\Facades\Mail;
use course\Atencion;
use course\Lista;
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
        
        
        $data = array(
        'codigo' => $atencion->codigo,
        'usuario' => $usuario,
        );
    
        Mail::send('mails.test', $data, function ($message) use ($usuario) {
            $message->to($usuario->email)->subject('codigo de generacion');
        });
        
        
        $result = "se envió un correo a: ".$usuario->email;
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
            
            
            Session::put('atencion', $atencion->toArray());
            $array=$atencion->toArray();
            $array['predecesores'] = $predecesores;
            return $array;
        }
        
    }

    public function obtener_sesion(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        $atencion=Session::get('atencion');
        return $request->session()->get('atencion');
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
