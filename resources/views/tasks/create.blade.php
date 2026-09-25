@extends('layouts.app')

@section('content')
<div class="panel">
    <div class="header">
        <div>
            <h2>Create task</h2>
            <div class="muted">Add a new task to your list</div>
        </div>
        <div class="actions">
            <a href="{{ route('tasks.index') }}" class="btn ghost">Back</a>
        </div>
    </div>

    <form method="POST" action="{{ route('tasks.store') }}" style="margin-top:20px">
        @csrf
        <div class="form-row">
            <div>
                <label>Task name</label>
                <input type="text" name="task_name" required>
            </div>
            <div>
                <label>Due date</label>
                <input type="date" name="due_date">
            </div>
            <div class="full-width">
                <label>Description</label>
                <textarea name="description" rows="4"></textarea>
            </div>
        </div>
        <div style="margin-top:20px">
            <button type="submit" class="btn">Save task</button>
        </div>
    </form>
</div>
@endsection