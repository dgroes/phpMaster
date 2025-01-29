@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Bienvenido</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-sm-0">Bienvenido, {{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}</h4>
                <br>
                <h4 class="mb-sm-0">Es un placer tenerte de vuelta.</h4>
            </div>
        </div>
    </div>
</div>
@endsection
