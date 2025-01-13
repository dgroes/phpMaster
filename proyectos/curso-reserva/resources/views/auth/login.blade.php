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
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Bienvenido !</h5>
                                <p class="text-muted">Inicie sesión para continuar con la Reserva.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    {{-- Input de Email --}}
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('Correo Electronico') }}</label>
                                        {{-- C10 Cadenas de traducción --}}
                                        <input type="email" id="email" name="email"
                                            placeholder="Ingrese Correo electronico" value="{{ old('email') }}"
                                            class="form-control pe-5 @error('email') is-invalid @enderror" required
                                            autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- Input de contraseña --}}
                                    <div class="mb-3">
                                        <label class="form-label" for="password-input">{{ __('Contraseña') }}</label>
                                        {{-- C10 Cadenas de traducción --}}
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" id="password" name="password" placeholder="Ingrese Contraseña" class="form-control pe-5 @error('email') is-invalid @enderror" required>
                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="tooglePassword"><i class="ri-eye-fill align-middle"></i></button>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message}}</strong>
                                                </span>
                                            @enderror
                                        </div>
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
                                            type="submit">{{ __('Iniciar Sesión') }}</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                    <div class="mt-4 text-center">
                        <p class="mb-0">¿No tienes una cuenta?
                            <a href="{{ route('register') }}" class="fw-semibold text-primary text-decoration-underline">
                                Registrate </a>
                        </p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    @push('scripts')
    {{-- Script para mostrar contraseña --}}
    <script>
        document.addEventListener('DOMContentLoaded',function(){
            const tooglePasswordButton = document.querySelector('#tooglePassword');
            const passwordInput = document.querySelector('#password');

            tooglePasswordButton.addEventListener('click',function(){
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type',type);
            });
        });
    </script>
    @endpush
@endsection
