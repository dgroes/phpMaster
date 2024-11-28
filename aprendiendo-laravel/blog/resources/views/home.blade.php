@extends('layouts.app')

@section('title', 'Laravel 🅰️')
{{-- Laravel 11⭐ --}}
{{-- @endsection --}}

@push('css')
    <style>
        body {
            background-color: rgb(115, 110, 167);
        }
    </style>
@endpush

@push('css')
    <style>
        body {
            color: rgb(35, 204, 255);
        }
    </style>
@endpush

@section('content')
    {{-- <x-app-layout> --}}
    <div class="max-w-4xl mx-auto px-4">

        <x-alert2 type="info" class="mb-4">
            <x-slot name="title">
                Titulo
            </x-slot>
            Contenido de la alerta
        </x-alert2>
        <p>Hola mundo {{ time() }}</p>

    </div>
    {{-- </x-app-layout> --}}

@endsection
