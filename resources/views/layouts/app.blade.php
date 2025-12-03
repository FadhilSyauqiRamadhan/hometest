<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple To-Do List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-gradient: linear-gradient(135deg, #1d3557, #457b9d);
            --card-bg: #ffffff;
            --accent: #457b9d;
            --accent-soft: rgba(69,123,157,0.08);
            --danger: #e63946;
            --text-main: #1f2933;
            --text-muted: #6b7280;
            --radius-lg: 18px;
            --shadow-soft: 0 18px 35px rgba(15,23,42,0.18);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--bg-gradient);
        }

        .shell {
            width: 100%;
            max-width: 760px;
        }

        .card {
            background: var(--card-bg);
            border-radius: var(--radius-lg);
            padding: 24px 28px 26px;
            box-shadow: var(--shadow-soft);
            border: 1px solid rgba(15,23,42,0.08);
        }

        .app-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
            gap: 16px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-logo {
            width: 34px;
            height: 34px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--accent-soft);
            color: var(--accent);
            font-weight: 700;
            font-size: 18px;
        }

        .brand-title {
            font-size: 19px;
            font-weight: 600;
            color: var(--text-main);
            letter-spacing: 0.03em;
        }

        .brand-sub {
            font-size: 12px;
            color: var(--text-muted);
        }

        .user-info {
            text-align: right;
            font-size: 13px;
        }

        .user-name {
            font-weight: 500;
            color: var(--text-main);
        }

        .user-caption {
            color: var(--text-muted);
            font-size: 12px;
        }

        .logout-form button {
            margin-top: 6px;
        }

        h2 {
            margin: 0 0 14px;
            font-size: 20px;
            font-weight: 600;
            color: var(--text-main);
        }

        p {
            margin: 0;
        }

        .page-description {
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 18px;
        }

        /* Forms */
        label {
            font-size: 13px;
            font-weight: 500;
            color: var(--text-main);
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px 11px;
            border-radius: 10px;
            border: 1px solid #dde1eb;
            margin-top: 4px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.18s, box-shadow 0.18s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 2px rgba(69,123,157,0.18);
        }

        .field-group {
            margin-bottom: 14px;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 14px;
            border-radius: 999px;
            border: none;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: transform 0.12s ease, box-shadow 0.12s ease, background 0.15s ease;
            white-space: nowrap;
        }

        .btn-primary {
            background: var(--accent);
            color: #f9fafb;
            box-shadow: 0 10px 18px rgba(37, 99, 235, 0.27);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 16px 26px rgba(37, 99, 235, 0.30);
        }

        .btn-outline {
            background: transparent;
            color: var(--text-main);
            border: 1px solid rgba(148,163,184,0.7);
        }

        .btn-outline:hover {
            background: rgba(148,163,184,0.08);
        }

        .btn-danger {
            background: var(--danger);
            color: #f9fafb;
            box-shadow: 0 10px 18px rgba(220, 38, 38, 0.28);
        }

        .btn-danger:hover {
            transform: translateY(-1px);
            box-shadow: 0 16px 26px rgba(220, 38, 38, 0.32);
        }

        .btn-sm {
            padding: 6px 11px;
            font-size: 12px;
        }

        .link {
            color: var(--accent);
            text-decoration: none;
            font-weight: 500;
        }

        .link:hover {
            text-decoration: underline;
        }

        .error {
            color: var(--danger);
            font-size: 12px;
            margin-top: 4px;
        }

        /* Tasks list */
        .task-list {
            list-style: none;
            padding-left: 0;
            margin-top: 18px;
        }

        .task-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 11px;
            border-radius: 12px;
            border: 1px solid #edf0f6;
            background: #f9fafb;
            margin-bottom: 8px;
        }

        .task-title {
            font-size: 14px;
            color: var(--text-main);
        }

        .task-done .task-title {
            text-decoration: line-through;
            color: var(--text-muted);
        }

        .task-meta {
            font-size: 11px;
            color: var(--text-muted);
            margin-top: 2px;
        }

        .task-actions {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            border-radius: 999px;
            padding: 2px 8px;
            font-size: 11px;
            font-weight: 500;
        }

        .status-done {
            background: rgba(34,197,94,0.08);
            color: #16a34a;
        }

        .status-todo {
            background: rgba(148,163,184,0.16);
            color: #4b5563;
        }

        .empty-state {
            font-size: 13px;
            color: var(--text-muted);
            padding: 10px 4px 4px;
        }

        /* Small screen tweaks */
        @media (max-width: 520px) {
            .card {
                padding: 18px 16px 20px;
            }

            h2 {
                font-size: 18px;
            }

            .task-actions {
                flex-direction: column;
                align-items: flex-end;
            }

            .shell {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="shell">
        <div class="card">
            <div class="app-header">
                <div class="brand">
                    <div class="brand-logo">✓</div>
                    <div>
                        <div class="brand-title">Manajemen Tugas</div>
                        <div class="brand-sub">Simple To-Do List with Laravel</div>
                    </div>
                </div>

                @auth
                    <div class="user-info">
                        <div class="user-name">{{ auth()->user()->username }}</div>
                        <div class="user-caption">Sedang login</div>
                        <form action="{{ route('logout') }}" method="POST" class="logout-form">
                            @csrf
                            <button type="submit" class="btn btn-outline btn-sm">Logout</button>
                        </form>
                    </div>
                @endauth
            </div>

            @yield('content')
        </div>
    </div>

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ session("success") }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: '{{ session("error") }}',
                showConfirmButton: true
            });
        </script>
    @endif
</body>
</html>
