<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;

        if($buscar==''){
            $persona = User::join('personas','users.id','=','personas.id')
            ->join('roles','users.idrol','=','roles.id')
            ->select('personas.id','personas.nombre','personas.tipo_documento',
            'personas.num_documento','personas.direccion','personas.telefono',
            'personas.email','users.usuario','users.password',
            'users.condicion','users.idrol','roles.nombre as rol')
            ->orderBy('personas.id','desc')->paginate(3);
        }
        else{
            $persona = User::join('personas','users.id','=','personas.id')
            ->join('roles','users.idrol','=','roles.id')
            ->select('personas.id','personas.nombre','personas.tipo_documento',
            'personas.num_documento','personas.direccion','personas.telefono',
            'personas.email','users.usuario','users.password',
            'users.condicion','users.idrol','roles.nombre as rol')
            ->orderBy('personas.id','desc')->paginate(3);
        }
    }
}

