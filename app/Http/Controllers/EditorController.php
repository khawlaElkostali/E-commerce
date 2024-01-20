<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\Editor;
use App\Http\Requests\EditorRequest;

class EditorController extends Controller
{

    public function __construct(){
        return $this->middleware('editor')->only('dashboard');
    }
    public function dashboard(){
        return view('editor.dashboard');
    }

    public function login(){
        return view('editor.login');
    }

    public function connecter(Request $request){

        $check = $request->all();
        if(Auth::guard('editor')->attempt(['email' => $check['email'], 'password' => $check['password']])){
            return to_route('editor.dashboard');
        }
        return to_route('editor.login');
    }


    public function logout(){

        Auth::guard('editor')->logout();

        return to_route('editor.login');
    }

    public function register(){
        return view('editor.register');
    }

    public function enregistrer(EditorRequest $request){

        $formfields = $request->validated();

        $formfields['password'] = Hash::make($request->password);

        Editor::create($formfields);

        return to_route('editor.login');
    }
}
