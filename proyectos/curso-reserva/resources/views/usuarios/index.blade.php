@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Mantenimiento de Usuarios</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Usuarios</a></li>
                        <li class="breadcrumb-item active">Mantenimiento</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Listado de usuarios</h5>
                </div>
                <div class="card-body">
                    <a href="{{ route('usuarios.create') }}" class="btn btn-primary waves-effect waves-light">Nuevo
                        Registro</a>
                    <br>
                    <br>
                    <table id="usuariosTable" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Correo Electrónico</th>
                                <th>Teléfono</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->nombres }}</td>
                                    <td>{{ $usuario->apellidos }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ $usuario->teléfono }}</td>
                                    <td>{{ $usuario->role->name }}</td> {{-- C13 Relaciones en views --}}
                                    <td>
                                        {{-- Editar --}}
                                        <a href="{{ route('usuarios.edit', $usuario->id) }}"
                                            class="btn btn-warning btn-sm">Editar</a>

                                        {{-- Eliminar --}}
                                        <button type="buttom" class="btn btn-danger btn-sm"
                                            onclick="confirmarEliminacion({{ $usuario->id }})">
                                            Eliminar
                                        </button>
                                        <form id="delete-form-{{ $usuario->id }}"
                                            action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        {{-- Tablas dinamicas --}}
        <script>
            $(document).ready(function() {
                $('#usuariosTable').DataTable();
            })
        </script>

        {{-- Mensaje de éxito dinamico con Toastify --}}
        @if (session('success'))
            {
            <script>
                Toastify({
                    text: "{{ session('success') }}",
                    duration: 3000,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    },
                }).showToast();
            </script>
            }
        @endif

        {{-- Alerta de confirmación de eliminación --}}
        <script>
            function confirmarEliminacion(usuarioId) {
                Swal.fire({
                    title: "¿Estás Seguro?",
                    text: "No podrás revertir esta acción!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, Eliminar!",
                    cancelButtonText: "Cancelar",
                }).then((result) => {
                    if (result.isConfirmed) {
                       document.getElementById('delete-form-' + usuarioId).submit();
                    }
                });
            }
        </script>
    @endpush
