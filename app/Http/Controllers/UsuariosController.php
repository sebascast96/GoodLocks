<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{
    public function index(){
        $idf = Auth::user()->fraccionamiento;
        $user = User::all()->where('fraccionamiento', $idf);
        return view('Usuarios.usuarios', compact('user'));
    }

    
    public function deleteU($id)
    {
         $BR = User::find($id); 
         $BR->delete();
         return redirect()->back();
    }
}
