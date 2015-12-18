<?php

namespace course\Http\Controllers;

use Illuminate\Http\Request;
use course\Http\Requests;
use course\Http\Controllers\Controller;
use course\Lista;
use course\Asignacion;
use course\Atencion;


class ListaController extends Controller
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
        
        
        $empresa_id =$request->input('empresa_id');
        
        if ($empresa_id==null){
            $listas = Lista::all();
        }
        else{
            $listas = Lista::where('empresa_id',$empresa_id)->get();
        }
        
        
         
         return $listas->toArray();
    }
    
    public function postIndex(Request $request)
    {
        //header("Access-Control-Allow-Origin: *");
        //header("Allow: GET, POST, OPTIONS");
        
        $empresa_id =$request->input('empresa_id');
        
        if ($empresa_id==null){
            $listas = Lista::all();
        }
        else{
            $listas = Lista::where('empresa_id',$empresa_id)->get();
        }
         
         return $listas->toArray();
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
        
        $id =$request->input('id');
        $nombre =$request->input('nombre');
        $codigo =$request->input('codigo');
        $empresa_id =$request->input('empresa_id');
        
        if($id==null){
            $lista = Lista::create(['nombre' => $nombre, "codigo" => $codigo, "empresa_id" => $empresa_id]);
        }
        else{
            $lista = Lista::find($id);
            $lista->nombre=$nombre;
            $lista->codigo=$codigo;
            $lista->empresa_id=$empresa_id;
            $lista->save();
        }
        
        
        return $lista;
    }

    public function eliminar_lista(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        
        $id =$request->input('id');
        $msg="";
        $error=false;
        
        $enuso=Asignacion::whereRaw('lista_id=?',[$id])->count()+Atencion::whereRaw('lista_id=?',[$id])->count();
        
        try{
            if ($enuso>0){
                $error=true;
                $msg="La Linea se encuentra en uso";
            }
            
            if ($error==false){
                $lista = Lista::find($id);
                $lista->delete();    
            }
        }
        catch(\Exception $e){
            $error=true;
            $msg=$e->getMessage();
        }
        
        return ["lista"=>$lista, "msg"=>$msg, "error"=>$error];
    }
    
    public function editar_lista(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        
        $id =$request->input('id');
        
        $lista = Lista::find($id);
        
        return view('/crear_lista')->with('lista', $lista);
    }
    
    public function obtener_lista(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        
        $id =$request->input('id');
        
        $lista = Lista::find($id);
        
        return $lista;
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
