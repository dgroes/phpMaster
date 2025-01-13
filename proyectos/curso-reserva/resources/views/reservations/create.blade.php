@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Nueva Reserva</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Reserva</a></li>
                        <li class="breadcrumb-item active">Nueva Reserva</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Crear Nueva Reserva</h4>
                </div>

                <div class="card-body">
                    <form class="row gy-4" method="POST" action="{{ route('reservations.store') }}">
                        @csrf

                        {{-- Nombre del Usuario --}}
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="user_id" class="form-label">{{ __('Usuario') }}</label>
                                <select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id"
                                    required>
                                    <option value="" readonly>{{ __('Seleccionar un usuario')}}-</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->nombres }} {{ $user->apellidos }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Nombre del Consultor --}}
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="consultant_id" class="form-label">{{ __('Consultor') }}</label>
                                <select class="form-select @error('consultant_id') is-invalid @enderror" id="consultant_id" name="consultant_id"
                                    required>
                                    <option value="" readonly>{{ __('Seleccionar un consultor')}}-</option>
                                    @foreach ($consultants as $consultant)
                                        <option value="{{ $consultant->id }}">{{ $consultant->nombres }} {{ $consultant->apellidos }}</option>
                                    @endforeach
                                </select>
                                @error('consultant_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Fecha de la Reserva --}}
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="reservation_date" class="form-label">{{ __('Fecha de Reservación') }}</label>
                                <input type="date" class="form-control @error('reservation_date') is-invalid @enderror"
                                    id="reservation_date" name="reservation_date" value="{{ old('reservation_date') }}" required>
                                @error('reservation_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Hora de inicio la Reserva --}}
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="start_time" class="form-label">{{ __('Hora de inicio') }}</label>
                                <select class="form-select @error('start_time') is-invalid @enderror" id="start_time" name="start_time"
                                    required>
                                    <option value="" readonly>{{ __('Seleccionar una Hora')}}</option>
                                    <option value="09:00">09:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                </select>
                                @error('start_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Hora de fin de la Reserva --}}
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="end_time" class="form-label">{{ __('Hora de Fin') }}</label>
                                <input type="text" class="form-control @error('end_time') is-invalid @enderror"
                                    id="end_time" name="end_time" value="{{ old('end_time') }}" required readonly>
                                @error('end_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Estado de la Reserva --}}
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="reservation_status" class="form-label">{{ __('Estado de la Reserva') }}</label>
                                <select class="form-select @error('reservation_status') is-invalid @enderror" id="reservation_status" name="reservation_status"
                                    required>
                                    <option value="" readonly>{{ __('Seleccionar un estado')}}</option>
                                    <option value="confirmada">Confirmada</option>
                                    <option value="pendiente">Pendiente</option>
                                </select>
                                @error('reservation_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        {{-- Submit --}}
                        <div class="col-xxl-12 col-md-6">
                            <div>
                                <br>
                                <a href="{{route('reservations.index')}}" class="btn btn-danger">
                                    {{ __(('Cancelar')) }}
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar Reserva') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
