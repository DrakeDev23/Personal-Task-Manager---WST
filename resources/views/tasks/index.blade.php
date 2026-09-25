@extends('layouts.app')

@section('content')
<div class="panel">
    <div class="header">
        <div>
            <h2>My tasks</h2>
            <div class="muted">You have {{ $tasks->count() }} tasks</div>
        </div>
        <div class="actions">
            <a class="btn" href="{{ route('tasks.create') }}">Add task</a>
        </div>
    </div>

    <div style="margin-top:20px">
        @if($tasks->isEmpty())
            <div class="empty">No tasks yet — add a task to get started.</div>
        @else
            <div class="tasks-list">
                @foreach($tasks as $task)
                    <div class="task-row">
                        <div>
                            <div class="task-name">{{ $task->task_name }}</div>
                            <div class="task-desc">{{ Str::limit($task->description, 100) }}</div>
                        </div>
                        <div class="task-due">{{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') : '—' }}</div>
                        <div>
                            <span class="badge {{ strtolower($task->status) == 'pending' ? 'pending' : 'completed' }}">{{ $task->status }}</span>
                        </div>
                        <div class="actions">
                            <a class="link-like" href="{{ route('tasks.edit', $task) }}">Edit</a>
                            <form class="inline" method="POST" action="{{ route('tasks.toggle', $task) }}">@csrf<button class="link-like" type="submit">{{ $task->status === 'Pending' ? 'Complete' : 'Reopen' }}</button></form>
                            <form class="inline" method="POST" action="{{ route('tasks.destroy', $task) }}">@csrf @method('DELETE')<button class="danger-link" type="submit">Delete</button></form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection