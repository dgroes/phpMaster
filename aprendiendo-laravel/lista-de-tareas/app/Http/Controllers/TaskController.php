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
        $tasks = Task::orderBy('created_at', 'desc')->where('user_id', auth()->id())
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
        // Los datos ya están validados automáticamente por el Form Request
        Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => auth()->id(), // Usuario autenticado
            'completed' => false, // Por defecto la tarea no está completada
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarea creada exitosamente.');
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
    public function update(StoreTaskRequest $request, Task $task)
    {
        // Verificar la acción enviada desde el formulario
        if ($request->input('action') === 'markAsComplete') {
            $task->update(['completed' => 1]);
            return redirect()->route('tasks.index')->with('success', 'Tarea marcada como completada.');
        }

        if ($request->input('action') === 'markAsPending') {
            $task->update(['completed' => 0]);
            return redirect()->route('tasks.index')->with('success', 'Tarea marcada como pendiente.');
        }

        // Actualizar los demás campos de la tarea
        $task->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada correctamente.');
    }



    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
