<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;

class AdminController extends Controller
{
    public function __construct(){
        return $this->middleware('admin')->only('dashboard');
    }
    public function dashboard(){
        return view('admin.index');

    }
    public function login(){
        return view('admin.login');
    }

    public function connecter(Request $request){

        $check = $request->all();

        if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])){
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return to_route('Home');
    }

    public function register(){
        return view('admin.register');
    }

    public function enregistrer(AdminRequest $request){

        $formfields = $request->validated();

        $formfields['password'] = Hash::make($request->password);

        Admin::create($formfields);

        return to_route('admin.login');
    }
}
