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
use Carbon\Carbon;
use DateTime;
use DB;

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
        $error=false;
        $msg="";
        $user_loged_id=0;
        
        $lista_id =$request->input('lista_id');
        if ($request->input('user_id')==null){
            $user_id=User::whereRaw('email=?', ['generico@mail.com'])->first()->id;
        }
        else{
            $user_id=$request->input('user_id');

            if($user_id==User::whereRaw('email=?', ['generico@mail.com'])->first()->id){
                $user_loged_id=0;
            }
            else{
                $user_loged_id=$user_id;    
            }
        }
        
        if ($request->input('modo')==null){
            $modo="imprimir_generico";
        }
        else{
            $modo=$request->input('modo');    
        }
        
        
        $cantidad_tickets=Atencion::whereRaw('user_id=? and created_at>=curdate()',[$user_loged_id])->get()->count();
        if ($cantidad_tickets>3){
            $error=true;
            $msg="Solo se permiten generar un maximo de 4 tickets por dia";
        }
        
        if ($error){
            $result=$msg;    
            $atencion=null;
        }
        else{
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
                    $atencion->fecha_generado=Carbon::now();
                    $atencion->estado_id=1;//estado 1 es en espera
                    $atencion->save();
                    $result = $atencion->numero;
                    
                    break;
                case "imprimir_generico":
                    
                    $codigo=$atencion->id.date("d").date("i");
                    $atencion->codigo = $codigo;
                    $atencion->save();
                    
                    $atencion->posicion = Atencion::whereRaw('numero is not null and lista_id = ?', [$atencion->lista_id])->count()+1;
                    $atencion->save();
                    
                    $lista = Lista::find( $atencion->lista_id);
                    $atencion->numero=$lista->codigo.$atencion->posicion;
                    $atencion->fecha_generado=Carbon::now();
                    $atencion->estado_id=1;//estado 1 es en espera
                    $atencion->nombre=$request->input('nombre');
                    $atencion->dni=$request->input('dni');
                    $atencion->telefono=$request->input('telefono');
                    $atencion->save();
                    $result = $atencion->numero;
                    
                    break;
                case "sms":
                    
                    $result = $atencion->codigo;
                    
                    break;
                case "sms_generico":
                    
                    $codigo=$atencion->id.date("d").date("i");
                    $atencion->codigo = $codigo;
                    $atencion->save();
                    
                    $atencion->posicion = Atencion::whereRaw('numero is not null and lista_id = ?', [$atencion->lista_id])->count()+1;
                    $atencion->save();
                    
                    $lista = Lista::find( $atencion->lista_id);
                    $atencion->numero=$lista->codigo.$atencion->posicion;
                    $atencion->fecha_generado=Carbon::now();
                    $atencion->estado_id=1;//estado 1 es en espera
                    $atencion->nombre=$request->input('nombre');
                    $atencion->dni=$request->input('dni');
                    $atencion->telefono=$request->input('telefono');
                    $atencion->save();
                    $result = $atencion->numero;
                    
                    break;
            }    
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
        
        
        $atencion = Atencion::whereRaw('codigo = ?', [$codigo])->get()->first();
        
        
        if ($atencion == null){
            $atencion = Atencion::whereRaw('numero = ?', [$codigo])->get()->first();
        }
        
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
                $atencion->fecha_generado=Carbon::now();
                $atencion->estado_id=1;//estado 1 es en espera
                $atencion->save();
                
            }
            
            //estado_id=1 es en espera
            $predecesores = Atencion::whereRaw('estado_id = 1 and posicion < ? and lista_id = ? and colaborador_id is null', [$atencion->posicion,$atencion->lista_id])->count();
            
            $estimado = DB::table('atencions')->select(DB::raw('avg(TIME_TO_SEC(timediff(fecha_asignado,fecha_generado)))/60 + avg(TIME_TO_SEC(timediff(fecha_atendido,fecha_asignado)))/60 as atendido, lista_id'))->where('fecha_atendido','<>', 'null')->where('fecha_generado','<>', 'null')->where('fecha_asignado','<>', 'null')->where('lista_id','=', $atencion->lista_id)->where('created_at','>=',DB::raw('curdate()'))->get()[0]->atendido;
            if ($estimado==null){$estimado=0;}
            
            $array=$atencion->toArray();
            $array['predecesores'] = $predecesores;
            $array['tiempo'] = round($predecesores*$estimado,2)." minutos";
            Session::put('atencion', $array);
            return $array;
        }
        
    }

    public function obtener_sesion(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        
        return Session::get('user');
    }
    
    public function obtener_sesion_atencion(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        
        return Session::get('atencion');
    }
    
    
    public function obtener_lista_asignada(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        
        $lista_id=$request->input('lista_id');
        $user_id=$request->input('user_id');
        
        $atenciones = Atencion::whereRaw('lista_id=? and estado_id=1 and (colaborador_id is null or colaborador_id = ?)',[$lista_id,$user_id])->take(4)->get();
        /*if (count($atenciones)>0){
            $atenciones[0]->colaborador_id=$user_id;
            $atenciones[0]->save();
        }*/
        
        return $atenciones;
    }
    
    public function asignar_atencion(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        
        $lista_id=$request->input('lista_id');
        $user_id=$request->input('user_id');
        
        $atenciones = Atencion::whereRaw('lista_id=? and estado_id=1 and (colaborador_id is null or colaborador_id = ?)',[$lista_id,$user_id])->take(4)->get();
        if (count($atenciones)>0){
            $atenciones[0]->colaborador_id=$user_id;
            $atenciones[0]->fecha_asignado=Carbon::now();
            $atenciones[0]->save();
        }
        
        return $atenciones[0];
    }
    
    public function atender_atencion(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        
        $id=$request->input('id');
        $estado_id=$request->input('estado_id');
        
        $atencion = Atencion::find($id);
        $atencion->estado_id=$estado_id;
        if ($estado_id==2){$atencion->fecha_atendido=Carbon::now();}
        if ($estado_id==3){$atencion->fecha_ausente=Carbon::now();}
        $atencion->save();
        
        return $atencion;
    }
    
    public function ultimo_atendido(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        
        $lista_id=$request->input('lista_id');
        $user_id=$request->input('user_id');
        
        $atenciones = Atencion::whereRaw('lista_id=? and estado_id<>1 and colaborador_id=?',[$lista_id,$user_id])->orderBy('id', 'desc')->first();
        
        return $atenciones;
    }
    
    public function reporte_1()
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        
        
        $result = DB::table('atencions')->select(DB::raw('SEC_TO_TIME(avg(TIME_TO_SEC(timediff(fecha_asignado,fecha_generado)))) as asignado, SEC_TO_TIME(avg(TIME_TO_SEC(timediff(fecha_atendido,fecha_asignado)))) as atendido, sum(1) as cantidad'),'colaborador_id','users.name')->join('users', 'atencions.colaborador_id', '=', 'users.id')->where('fecha_atendido','<>', 'null')->where('fecha_generado','<>', 'null')->where('fecha_asignado','<>', 'null')->groupBy('colaborador_id')->get();
        $result2 = DB::table('atencions')->select(DB::raw('users.name as label, sum(1) as data'))->join('users', 'atencions.colaborador_id', '=', 'users.id')->where('fecha_atendido','<>', 'null')->where('fecha_generado','<>', 'null')->where('fecha_asignado','<>', 'null')->groupBy('colaborador_id')->get();
        
        return ["reporte1"=>$result,"reporte2"=>$result2];
    }
    
    public function cancelar_ticket(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Allow: GET, POST, OPTIONS");
        
        $error=false;
        try{
            $atencion_id=$request->input('atencion_id');
            $atencion=Atencion::find($atencion_id);
                
            if ($atencion->estado_id=1 and $atencion->colaborador_id==null){
                $atencion->delete();
                Session::put('atencion', null);
                $msg="Ticket eliminado";
            }
            else{
                $msg="No se pudo eliminar el ticket";
            }
        }
        catch (\Exception $e){
            $error=true;
            $msg=$e->getMessage();
        }     
        
        return ["atencion"=>Session::get('atencion'), "msg"=>$msg, "error"=>$error];
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
