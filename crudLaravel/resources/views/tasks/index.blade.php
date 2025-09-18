@extends('tasks.layout')

@section('title','Listado de Tareas')

@section('content')
<a href="{{ route('tasks.create') }}" class="btn btn-primary btn-sm mb-3">Nueva</a>

<table class="table table-striped table-bordered align-middle">
  <thead class="table-light">
    <tr>
      <th>ID</th><th>Título</th><th>Estado</th><th>Acciones</th>
    </tr>
  </thead>
  <tbody>
  @forelse($tasks as $t)
    <tr>
      <td>{{ $t->id }}</td>
      <td>{{ $t->title }}</td>
      <td><span class="badge text-bg-secondary">{{ $t->status }}</span></td>
      <td>
        <a href="{{ route('tasks.show',$t) }}" class="btn btn-info btn-sm">Ver</a>
        <a href="{{ route('tasks.edit',$t) }}" class="btn btn-warning btn-sm">Editar</a>
        <form action="{{ route('tasks.destroy',$t) }}" method="POST" class="d-inline">
          @csrf @method('DELETE')
          <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">X</button>
        </form>
      </td>
    </tr>
  @empty
    <tr><td colspan="4" class="text-center">Sin registros</td></tr>
  @endforelse
  </tbody>
</table>

{{ $tasks->links() }}
@endsection
