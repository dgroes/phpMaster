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
                    <a href="{{route('usuarios.create')}}" class="btn btn-primary waves-effect waves-light">Nuevo Registro</a>
                    <br>
                    <br>
                     <table id="usuariosTable"
                         class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
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
                                        <a href="#">Editar</a>
                                        <a href="#">Eliminar</a>
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
    <script>
        $(document).ready(function(){
            $('#usuariosTable').DataTable();
        })
    </script>
@endpush
