@extends('tasks.layout')
@section('title','Crear Tarea')
@section('content')
<a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-sm mb-3">Volver</a>

@if($errors->any())
  <div class="alert alert-danger p-2">
    <ul class="mb-0">
      @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
  </div>
@endif

<form method="POST" action="{{ route('tasks.store') }}">
@csrf
  <div class="mb-3">
    <label class="form-label">Título</label>
    <input name="title" class="form-control" value="{{ old('title') }}">
  </div>
  <div class="mb-3">
    <label class="form-label">Descripción</label>
    <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Estado</label>
    <select name="status" class="form-select">
      @foreach(['pendiente','progreso','completada'] as $s)
        <option value="{{ $s }}">{{ ucfirst($s) }}</option>
      @endforeach
    </select>
  </div>
  <button class="btn btn-success btn-sm">Guardar</button>
</form>
@endsection
