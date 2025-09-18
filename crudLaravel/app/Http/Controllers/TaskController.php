<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() {
        $tasks = Task::latest()->paginate(10);
        return view('tasks.index', compact('tasks'));
    }
    public function create() {
        return view('tasks.create');
    }
    public function store(Request $request) {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
            'status'=>'required|in:pendiente,progreso,completada'
        ]);
        Task::create($data);
        return redirect()->route('tasks.index')->with('success','Creada.');
    }
    public function show(Task $task) {
        return view('tasks.show', compact('task'));
    }
    public function edit(Task $task) {
        return view('tasks.edit', compact('task'));
    }
    public function update(Request $request, Task $task) {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
            'status'=>'required|in:pendiente,progreso,completada'
        ]);
        $task->update($data);
        return redirect()->route('tasks.index')->with('success','Actualizada.');
    }
    public function destroy(Task $task) {
        $task->delete();
        return redirect()->route('tasks.index')->with('success','Eliminada.');
    }
}
