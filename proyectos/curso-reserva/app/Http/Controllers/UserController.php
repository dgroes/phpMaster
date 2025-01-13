<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::with('role')->get();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        // Obtener todos los roles para el campo seleccionable
        $roles = Role::all();

        //Devolver la vista de creación de usuarios con los roles disponibles
        return view('usuarios.create', compact('roles'));
    }
    public function store(Request $request){
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'teléfono' => 'required|string|max:15',
            'rol_id' => 'required|integer',
            'email' => 'required|email|unique:users',
            // 'password' => 'required|string|max:8|in:password',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')){
            $fotoPath = $request->file('foto')->store('fotos', 'public');
        }

        user::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'teléfono' => $request->teléfono,
            'email' => $request->email,
            'rol_id' => $request->rol_id,
            'password' => Hash::make('password'),
            'foto' => $fotoPath,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Registro creado correctamente');
    }

    public function edit($id){
        $usuario = User::findOrFail($id); // Buscar el usuario por su ID
        $roles = Role::all(); // Obtener todos los roles para el campo seleccionable

        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'teléfono' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email,'.$id, // Validar que el email sea único, excepto para el usuario actual
            'rol_id' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $usuario = User::findOrFail($id); // Buscar el usuario por su ID

        $fotoPath = $usuario->foto;
        if ($request->hasFile('foto')){
            $fotoPath = $request->file('foto')->store('fotos', 'public');
            $usuario->foto = $fotoPath;
        }

        $usuario->update([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'teléfono' => $request->teléfono,
            'email' => $request->email,
            'rol_id' => $request->rol_id,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Registro actualizado correctamente');
    }

    public function destroy($id){
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Registro eliminado correctamente');
    }
}
