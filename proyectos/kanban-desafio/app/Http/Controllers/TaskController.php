<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    //Index del sistema
    public function index()
    {
        // $tasks = Task::where('user_id', auth()->id());
        $tasks = Task::all();
        return view('dashboard', compact('tasks'));
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|string',
            'tags' => 'nullable|array',
        ]);

        Task::create([
            'user_id' => Auth::id(), // Asegúrate de obtener el ID del usuario autenticado
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => false,
            'priority' => $request->input('priority'),
            'tags' => $request->input('tags'),
        ]);

    //    Task::create($request->all());
        return redirect()->route('tasks.index');
    }
}
