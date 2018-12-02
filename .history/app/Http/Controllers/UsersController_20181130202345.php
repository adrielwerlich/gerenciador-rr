<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function edit() {
        return view('meu-perfil')->with('user', auth()->user());
    }

    public function fetchUsers() {
        
    }
}
