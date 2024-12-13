<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
// use Illuminate\View\View;

class TaskController extends Controller
{
    //Mostrar Lista de tareas creadas por el usuario
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')
            ->paginate(20);
        return view('tasks.index', compact('tasks'));
    }

    //Ir a la view de creación 
    public function create()
    {
        return view('tasks.create');
    }

    //
    public function store(StoreTaskRequest $request)
    {
        // Agregar el user_id del usuario autenticado
        $task = Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => auth()->id(), // Obtiene el ID del usuario autenticado
            'completed' => false, // Si quieres un valor predeterminado para 'completed'
        ]);

        return redirect()->route('tasks.index');
    }

    //Visualización de las Task para mostrar en tasks/index.blade
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }
    

    //Dirigir a la view del Task Edit
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    //Edición de una task
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => ['require', 'min:5', 'max:100'],
            'desctiption' => 'required',
        ]);

        $task->update($request->all());
        return redirect()->route('tasks.index');
    }
}
