<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function home()
    {

        if(Auth::check()){
            $tasks = Task::where('id_usuario', Session::get('id'))->get();
            return view('user.home', [
                'tasks' => $tasks,
            ]);
        }

        return view('user.login');
    }

    public function login(Request $request)
    {

        if(!filter_var($request -> email, FILTER_VALIDATE_EMAIL)){
            return redirect() -> back() -> withErrors(['O email informado é inválido!']);
        }

        $credentials = [
            'email' => $request -> email,
            'password' => $request -> senha
        ];

        $email = $request->email;

        $user = User::where('email', '=', $email)->first()->id;

        if(Auth::attempt($credentials)){
            Session::put(['id' => $user]);
            return redirect() -> route('users.home');
        }

        return redirect() -> back() -> withErrors(['Email/senha incorretos!']);

    }

    public function store(Request $request)
    {
        $user = new User();

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            return redirect() -> back() -> withErrors(['O email informado é inválido!']);
        } else {
            $user -> email = $request -> email;
        }

        if($request -> senha == null || $request -> nome == null){
            return redirect() -> back() -> withErrors(['Preenha todos os campos!']);
        } else {
            $user -> password = Hash::make($request -> senha);
            $user -> nome = $request -> nome;
        }

        $user -> save();

        return redirect() -> route('users.home');
    }

    public function create()
    {
        return view('user.cadastro');
    }

    public function logout()
    {
        Auth::logout();

        return redirect() -> route('users.home');
    }

}
