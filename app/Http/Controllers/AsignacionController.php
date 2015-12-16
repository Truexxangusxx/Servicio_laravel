<?php

namespace course\Http\Controllers;

use Illuminate\Http\Request;
use course\Http\Requests;
use course\Http\Controllers\Controller;
use course\Asignacion;

class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        
        $asignacions = Asignacion::all();
         
        return $asignacions->toArray();
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
        
        $error=false;
        $msg="";
        $user_id =$request->input('user_id');
        $lista_id =$request->input('lista_id');
        $ventanilla =$request->input('ventanilla');



        $ventanilla_asignada=Asignacion::whereRaw('user_id=? and ventanilla is not null', [$user_id])->count();
        $ventanilla_diferente=Asignacion::whereRaw('user_id=? and ventanilla = ?', [$user_id, $ventanilla])->count();

        if ($ventanilla_asignada>0){
            if ($ventanilla_diferente>0){
                $error=false;
            }
            else{
                $error=true;
                $msg="El usuario no se puede asignar a dos ventanillas distintas";
            }
        }
        else{
            $error=false;
        }
        
        if (Asignacion::whereRaw('user_id=? and lista_id=?', [$user_id,$lista_id])->count()>0)
        {
            $error=true;
            $msg="No se puede asignar el colaborador a la misma linea dos veces";
        }
        
        if ($error==false){
            $asignacion = Asignacion::create(['lista_id' => $lista_id, "user_id" => $user_id, "ventanilla" => $ventanilla]);
        }
        else{
            $asignacion = null;
        }
        
        
        return ["asignacion"=>$asignacion,"error"=>$error,"msg"=>$msg];
    }


    public function listas_por_user(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        
        
        $user_id =$request->input('user_id');
        
        $asignaciones = Asignacion::whereRaw('user_id=?', [$user_id])->get();
        
        $array = [];
        
        foreach ($asignaciones as $asignacion){ 
            $array[count($array)] = $asignacion->lista;
        }
        
         
        return $array;
    }
    
    public function eliminar_asignacion(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        
        $id =$request->input('id');
        $asignacion=Asignacion::find($id);
        $asignacion->delete();
        
        $asignacions = Asignacion::all();
         
        return $asignacions->toArray();
    }
    
    public function editar_asignacion(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        
        $id =$request->input('id');
        $asignacion=Asignacion::find($id);
         
        return view('asignar_colaborador');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
