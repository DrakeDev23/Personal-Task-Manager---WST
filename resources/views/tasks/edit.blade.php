@extends('layouts.app')

@section('content')
<div class="panel">
    <div class="header">
        <div>
            <h2>Edit task</h2>
            <div class="muted">Modify task details</div>
        </div>
        <div class="actions">
            <a href="{{ route('tasks.index') }}" class="btn ghost">Back</a>
        </div>
    </div>

    <form method="POST" action="{{ route('tasks.update', $task) }}" style="margin-top:20px">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div>
                <label>Task name</label>
                <input type="text" name="task_name" value="{{ $task->task_name }}" required>
            </div>
            <div>
                <label>Due date</label>
                <input type="date" name="due_date" value="{{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') : '' }}">
            </div>
            <div class="full-width">
                <label>Description</label>
                <textarea name="description" rows="4">{{ $task->description }}</textarea>
            </div>
        </div>
        <div style="margin-top:20px">
            <button type="submit" class="btn">Update task</button>
        </div>
    </form>
</div>
@endsection