<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateTaskStatusRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    //Index del sistema
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    //View of Create task
    public function create()
    {
        return view('tasks.create');
    }

    //Store Task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100|min:5',
            'description' => 'required|string|min:10',
            'priority' => 'required|string',
            'tags' => 'nullable|array',
        ]);

        $tags = $request->has('tags') ? preg_split('/\s+/', $request->input('tags')[0]) : [];
        Task::create([
            'user_id' => Auth::id(),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => 'pending',
            'priority' => $request->input('priority'),
            'tags' => $tags,
            // 'tags' => $request->has('tags') ? json_encode($request->input('tags')) : null,
            // 'tags' => $request->has('tags') ? json_encode(preg_split('/\s+/', $request->input('tags')[0])) : null,

        ]);

        return redirect()->route('tasks.index');
    }

    //Editar / Actualizar estatus de Tarea
    public function updateStatus(UpdateTaskStatusRequest $request, Task $task)
    {
        //Verificar la el 'name' enviiado deesde el form
        // dd($request->method(), $request->all());

        $status = $request->input('status');

        $task->status = match ($status) {
            'completed', 'in_progress', 'pending' => $status,
            default => $task->status, // Mantén el estado actual si no coincide con las opciones válidas
        };

        $task->save();

        return redirect()->route('tasks.index');
    }

    //View de editar TArea
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    //Editar tarea
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:100|min:5',
            'description' => 'required|string|min:10',
            'priority' => 'required|string',
            'tags' => 'nullable|array',
        ]);

        $tags = $request->has('tags') ? preg_split('/\s+/', $request->input('tags')[0]) : [];

        $task->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'priority' => $request->input('priority'),
            'tags' => $tags,
        ]);

        return redirect()->route('tasks.index');
    }

    //Eliminar Tarea
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
