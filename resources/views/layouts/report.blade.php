@extends('layouts.app')

@section('title', 'Relatório')

@section('content')
<div class="main-content">
    <h1>@yield('title')</h1>
    <button type="button" class="btn btn-info">Exportar</button>
    @yield('table')
</div>
@endsection
