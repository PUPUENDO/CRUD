@extends('tasks.layout')
@section('title','Detalle Tarea')
@section('content')
<a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-sm mb-3">Volver</a>

<div class="card">
  <div class="card-body">
    <h5>{{ $task->title }}</h5>
    <p class="text-muted mb-1"><strong>Estado:</strong> {{ $task->status }}</p>
    <p>{{ $task->description ?: 'Sin descripción' }}</p>
    <small class="text-muted">Creada: {{ $task->created_at->format('d/m/Y H:i') }} | Actualizada: {{ $task->updated_at->format('d/m/Y H:i') }}</small>
  </div>
  <div class="card-footer">
    <a href="{{ route('tasks.edit',$task) }}" class="btn btn-warning btn-sm">Editar</a>
    <form action="{{ route('tasks.destroy',$task) }}" method="POST" class="d-inline">@csrf @method('DELETE')
      <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Eliminar</button>
    </form>
  </div>
</div>
@endsection
