<?php

namespace course\Http\Controllers;

use Illuminate\Http\Request;
use course\Http\Requests;
use course\Http\Controllers\Controller;
use course\Empresa;
use course\Lista;

class EmpresaController extends Controller
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
        
         $empresas = Empresa::all();
         
         return $empresas;
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
        
        $nombre =$request->input('nombre');
        $codigo =$request->input('codigo');
        $id =$request->input('id');
        
        if($id==null){
            $empresa = Empresa::create(['nombre' => $nombre, "codigo" => $codigo]);
        }
        else{
            $empresa = Empresa::find($id);
            $empresa->nombre=$nombre;
            $empresa->codigo=$codigo;
            $empresa->save();
        }
        
        return $empresa;
    }
    
    public function eliminar_empresa(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        $empresa=null;
        $msg="";
        $error=false;
        try{
            $id =$request->input('id');

            $enuso=Lista::whereRaw("empresa_id=?",[$id])->count();
            if ($enuso>0){
                $error=true;
                $msg="La empresa se encuentra en uso";
            }
            
            if ($error==false){
                $empresa = Empresa::find($id);
                $empresa->delete();    
            }
        }
        catch(\Exception $e){
            $error=true;
            $msg=$e->getMessage();
        }
        
        return ["empresa"=>$empresa, "msg"=>$msg, "error"=>$error];
    }
    
    public function editar_empresa(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        
        $id =$request->input('id');
        
        $empresa = Empresa::find($id);
        
        return view('/crear_empresa')->with('empresa', $empresa);
    }
    
    public function obtener_empresa(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        
        $id =$request->input('id');
        
        $empresa = Empresa::find($id);
        
        return $empresa;
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
        return "estamos en el show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "estamos en el edit";
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
        return "estamos en el update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "estamos en el destroy";
    }
}
