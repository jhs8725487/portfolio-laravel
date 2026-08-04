@extends('layouts.admin')

@section('title', 'Nuevo Proyecto')

@section('content')
    <h2 class="text-xl font-semibold mb-4">Nuevo proyecto</h2>

    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf
        @include('admin.projects._form')
    </form>
@endsection