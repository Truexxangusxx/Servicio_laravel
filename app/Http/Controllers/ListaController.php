<?php

namespace course\Http\Controllers;

use Illuminate\Http\Request;
use course\Http\Requests;
use course\Http\Controllers\Controller;
use course\Lista;


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
        
        $nombre =$request->input('nombre');
        $codigo =$request->input('codigo');
        $empresa_id =$request->input('empresa_id');
        
        $lista = Lista::create(['nombre' => $nombre, "codigo" => $codigo, "empresa_id" => $empresa_id]);
        
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
