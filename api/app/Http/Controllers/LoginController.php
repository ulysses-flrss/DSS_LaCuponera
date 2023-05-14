<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function store(Request $request) {
        $credentials = Validator::validate($request->all(),[
            'correo' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::guard('admin')->attempt(['correo' => $credentials['correo'], 'password' => $credentials['password'], 'cod_rol' => 'ADM'])) { // Admin
            $request->session()->regenerate();
        } else if (Auth::guard('admin_empresa')->attempt(['correo' => $credentials['correo'], 'password' => $credentials['password'], 'cod_rol' => 'ADM_O'])) { // Admin empresa ofertante
            $request->session()->regenerate();
        } else if (Auth::guard('empleado')->attempt(['correo' => $credentials['correo'], 'password' => $credentials['password'], 'cod_rol' => 'EMP'])) { // Empleado
            $request->session()->regenerate();  
        }
    }
}
