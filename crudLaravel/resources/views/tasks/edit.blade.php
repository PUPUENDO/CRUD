@extends('tasks.layout')
@section('title','Editar Tarea')
@section('content')
<a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-sm mb-3">Volver</a>

@if($errors->any())
  <div class="alert alert-danger p-2">
    <ul class="mb-0">
      @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
  </div>
@endif

<form method="POST" action="{{ route('tasks.update',$task) }}">
@csrf @method('PUT')
  <div class="mb-3">
    <label class="form-label">Título</label>
    <input name="title" class="form-control" value="{{ old('title',$task->title) }}">
  </div>
  <div class="mb-3">
    <label class="form-label">Descripción</label>
    <textarea name="description" class="form-control" rows="3">{{ old('description',$task->description) }}</textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Estado</label>
    <select name="status" class="form-select">
      @foreach(['pendiente','progreso','completada'] as $s)
        <option value="{{ $s }}" @selected($task->status==$s)>{{ ucfirst($s) }}</option>
      @endforeach
    </select>
  </div>
  <button class="btn btn-primary btn-sm">Actualizar</button>
</form>
@endsection
