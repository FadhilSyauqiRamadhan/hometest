@extends('layouts.app')

@section('content')
    <h2>My To-Do List</h2>
    <p class="page-description">
        Tambahkan tugas baru, tandai sebagai selesai, atau hapus yang sudah tidak diperlukan.
    </p>

    {{-- Form tambah tugas --}}
    <form method="POST" action="{{ route('tasks.store') }}" style="margin-top:8px;">
        @csrf
        <div style="display:flex; gap:10px; align-items:center;">
            <input
                type="text"
                name="title"
                placeholder="Contoh: belajar materi mini project Laravel"
                required
            >
            <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        </div>
        @error('title')
            <div class="error">{{ $message }}</div>
        @enderror
    </form>

    {{-- List tugas --}}
    <ul class="task-list">
        @forelse ($tasks as $task)
            <li class="task-item {{ $task->is_done ? 'task-done' : '' }}">
                <div>
                    <div class="task-title">{{ $task->title }}</div>
                    <div class="task-meta">
                        {{ $task->created_at->format('d M Y, H:i') }}
                        &nbsp;·&nbsp;
                        @if($task->is_done)
                            <span class="status-pill status-done">Selesai</span>
                        @else
                            <span class="status-pill status-todo">Belum selesai</span>
                        @endif
                    </div>
                </div>

                <div class="task-actions">
                    <form method="POST" action="{{ route('tasks.toggle', $task) }}">
                        @csrf
                        <button type="submit" class="btn btn-outline btn-sm">
                            {{ $task->is_done ? 'Undo' : 'Tandai Selesai' }}
                        </button>
                    </form>

                    <form method="POST" action="{{ route('tasks.destroy', $task) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </div>
            </li>
        @empty
            <div class="empty-state">
                Belum ada tugas. Mulai dengan menambahkan satu tugas di atas.
            </div>
        @endforelse
    </ul>
@endsection
