@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <header class="container">
        <h1>Bienvenido al Gestor de Tareas Personales</h1>
        <p class="lead">
            Esta es una aplicación diseñada para ayudarte a organizar tus tareas diarias y mantenerte al día con tus
            objetivos personales.
        </p>
    </header>

    <section class="container">
        <h2>¿Qué puedes hacer con esta aplicación?</h2>
        <ul>
            <li><strong>Registro y acceso seguro:</strong> Crea una cuenta y accede de manera segura a tus datos.</li>
            <li><strong>Gestión de tareas:</strong> Agrega, edita y elimina tareas de forma rápida y sencilla.</li>
            <li><strong>Estilo ligero y moderno:</strong> La interfaz está diseñada con <a href="https://picocss.com"
                    target="_blank">Pico.css</a> para una experiencia agradable.</li>
        </ul>
    </section>

    <section class="container">
        <h2>Cómo empezar</h2>
        <p>
            Si eres nuevo, regístrate para comenzar a gestionar tus tareas. Si ya tienes una cuenta, inicia sesión para
            acceder a tu lista de tareas.
        </p>
        {{--  <a href="{{ route('register') }}" class="button">Regístrate</a>
        <a href="{{ route('login') }}" class="button">Inicia Sesión</a>
 --}}
        @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                @auth
                    <a href="{{ url('/tasks') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif

    </section>

    <section class="container">
        <h2>Sobre el Proyecto</h2>
        <p>
            Este gestor de tareas es un proyecto básico creado para aprender Laravel y Breeze, y explorar cómo integrar
            frameworks de CSS como Pico.css.
            Es ideal para desarrolladores que buscan entender el flujo de trabajo de Laravel mientras trabajan con
            herramientas modernas y ligeras.
        </p>
    </section>
@endsection
