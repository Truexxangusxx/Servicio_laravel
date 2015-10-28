<?php

namespace course\Http\Controllers;

use Illuminate\Http\Request;
use course\Http\Requests;
use course\Http\Controllers\Controller;
use course\User;
use Illuminate\Support\Facades\Mail;
use course\Atencion;

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
        );
    
        Mail::send('mails.test', $data, function ($message) {
            $message->to('cmedina@electrodata.com.pe')->subject('codigo de generacion');
        });
        
        
        $result = "se envió un correo a: ".$usuario->email;
        
        return $result;
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
