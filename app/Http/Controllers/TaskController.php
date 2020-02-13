<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    public function create()
    {
        return view('task.create');
    }

    public function new(Request $request)
    {
        $task = new Task();

        if($request -> titulo == null){
            return redirect() -> back() -> withErrors(['Preencha o campo!']);
        } else {
            $task -> id_usuario = $request -> id_usuario;
            $task -> titulo = $request -> titulo;
        }

        $task -> save();

        return redirect() -> route('users.home');
    }

    public function showEndForm()
    {
        $tasks = Task::where('id_usuario', Session::get('id'))->where('finalizada', '=', 0)->get();

        return view('task.end', ['tasks' => $tasks]);
    }

    public function end(Request $request)
    {
        $id = $request -> id;

        Task::where('id', $id)->update(array('finalizada' => 1));

        return redirect() -> route('users.home');
    }

    public function showDestroyForm()
    {
        $tasks = Task::where('id_usuario', Session::get('id'))->get();


        return view('task.destroy', ['tasks' => $tasks]);
    }

    public function delete(Request $request)
    {
        if($request->id == null){
            return redirect() -> back() -> withErrors(['Finalize antes de excluir!']);
        }

        $task = Task::where('id', '=', $request->id)->first();

        $task -> delete();

        return redirect() -> route('users.home');
    }
}
