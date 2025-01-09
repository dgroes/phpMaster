@extends('layouts.guest')

@section('content')
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
                            <a href="index.html" class="d-inline-block auth-logo">
                                <img src="assets/images/logo-light.png" alt="" height="20">
                            </a>
                        </div>
                        <p class="mt-3 fs-15 fw-medium">Curso de sistema de Reservas - Dgroes</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Crear Nueva Cuenta !</h5>
                                <p class="text-muted">Registrese para continuan con la Reserva.</p>
                            </div>
                            <div class="p-2 mt-4"> {{-- C11 Multipart Form Data --}}
                                <form class="needs-validation" method="POST" action="{{ route('register') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    {{-- Input de Nombres --}}
                                    <div class="mb-3">
                                        <label for="nombres" class="form-label">{{ __('Nombres') }} <span
                                                class="text-danger">*</span> </label>
                                        {{-- C10 Cadenas de traducción --}}
                                        <input type="text" id="nombres" name="nombres"
                                            placeholder="Ingrese sus Nombres" value="{{ old('nombres') }}"
                                            class="form-control pe-5 @error('nombres') is-invalid @enderror" required
                                            autofocus>
                                        @error('nombres')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- Input de Apellidos --}}
                                    <div class="mb-3">
                                        <label for="apellidos" class="form-label">{{ __('Apellidos') }}
                                            <span class="text-danger">*</span> </label>
                                        {{-- C10 Cadenas de traducción --}}
                                        <input type="text" id="apellidos" name="apellidos"
                                            placeholder="Ingrese sus Apellidos" value="{{ old('apellidos') }}"
                                            class="form-control pe-5 @error('apellidos') is-invalid @enderror" required>
                                        @error('apellidos')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- Input de Teléfono --}}
                                    <div class="mb-3">
                                        <label for="teléfono" class="form-label">{{ __('Teléfono') }} <span
                                                class="text-danger">*</span> </label>
                                        {{-- C10 Cadenas de traducción --}}
                                        <input type="number" id="teléfono" name="teléfono"
                                            placeholder="Ingrese su teléfono" value="{{ old('teléfono') }}"
                                            class="form-control pe-5 @error('teléfono') is-invalid @enderror" required>
                                        @error('teléfono')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- Input de Email --}}
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('Correo Electronico') }}  <span class="text-danger">*</span> </label></label>
                                        {{-- C10 Cadenas de traducción --}}
                                        <input type="email" id="email" name="email"
                                            placeholder="Ingrese Correo electronico" value="{{ old('email') }}"
                                            class="form-control pe-5 @error('email') is-invalid @enderror" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- Input de Foto --}}
                                    <div class="mb-3">
                                        <label for="foto" class="form-label">{{ __('Foto (Opcional)') }}</label>
                                        {{-- C10 Cadenas de traducción --}}
                                        <input type="file" id="foto" name="foto"
                                            placeholder="Ingrese Correo electronico" value="{{ old('foto') }}"
                                            class="form-control pe-5 @error('foto') is-invalid @enderror">
                                        @error('foto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- Input de contraseña --}}
                                    <div class="mb-3">
                                        <label class="form-label" for="password">{{ __('Contraseña') }} <span class="text-danger">*</span> </label></label>
                                        <input type="password" id="password" name="password"
                                            placeholder="Ingrese Contraseña"
                                            class="form-control pe-5 @error('password') is-invalid @enderror" required>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

                                     {{-- Input de confirmar contraseña --}}
                                     <div class="mb-3">
                                        <label class="form-label" for="password-confirm">{{ __('Confirmar Contraseña') }} <span class="text-danger">*</span> </label></label>
                                        <input type="password" id="password-confirm" name="password_confirmation"
                                            placeholder="Ingrese nuevamente la Contraseña" class="form-control pe-5 @error('password-confirm') is-invalid @enderror" required>
                                    </div>

                                    {{-- Recuerdame --}}
                                    {{-- <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="auth-remember-check">
                                        <label class="form-check-label" for="auth-remember-check">Remember
                                            me</label>
                                    </div> --}}

                                    <div class="mt-4">
                                        <button class="btn btn-success w-100"
                                            type="submit">{{ __('Registrate') }}</button>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>

                    <div class="mt-4 text-center">
                        <p class="mb-0">¿Ya tienes una cuenta?
                            <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-underline">
                                Iniciar sesión </a>
                        </p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
@endsection


{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
 --}}
