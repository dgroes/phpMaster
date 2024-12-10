<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
// use Illuminate\View\View;

class TaskController extends Controller
{
    //Mostrar Lista de tareas creadas por el usuario
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'descs')
            ->paginate(20);
        return view('tasks.index', compact('tasks'));
    }

    //Creación de una Task
    public function create(){
        return view('tasks.create');
    }
}
