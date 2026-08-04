@extends('layouts.admin')

@section('title', 'Editar Proyecto')

@section('content')
    <h2 class="text-xl font-semibold mb-4">Editar proyecto: {{ $project->title }}</h2>

    <form action="{{ route('admin.projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.projects._form')
    </form>
@endsection