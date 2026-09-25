<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taskero - Personal Task Manager</title>
    <link rel="icon" href="data:,">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@500;600&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #1C2B28;
            --paper: #FBFAF5;
            --white: #FFFFFF;
            --accent: #2F6F5E;
            --accent-dark: #234F43;
            --accent-soft: #E7F0EC;
            --line: #DEDACD;
            --muted: #70766F;
            --amber: #8A5A28;
            --amber-soft: #F3E7D8;
            --rust: #B3452F;
            --rust-soft: #F5E2DC;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            color: var(--ink);
            background: linear-gradient(160deg, #FBFAF5 0%, #F1F4EF 45%, #E7F0EC 100%);
            min-height: 100vh;
        }

        h1, h2, h3 {
            font-family: 'Fraunces', Georgia, serif;
            font-weight: 500;
            margin: 0;
            color: var(--ink);
        }

        a { color: var(--accent); }

        .muted { color: var(--muted); font-size: 14px; }

        .brand { display: flex; align-items: center; gap: 10px; }

        .logo {
            font-family: 'Fraunces', Georgia, serif;
            font-weight: 600;
            font-size: 20px;
            letter-spacing: -0.01em;
            color: var(--ink);
            text-decoration: none;
        }

        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 32px;
            background: var(--white);
            border-bottom: 1px solid var(--line);
        }

        .nav-links { display: flex; align-items: center; gap: 20px; }

        .nav-links a {
            font-size: 14px;
            font-weight: 500;
            color: var(--ink);
            text-decoration: none;
        }

        .nav-links a:hover { color: var(--accent); }

        .container { max-width: 880px; margin: 0 auto; padding: 32px 20px 60px; }

        .flash {
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 20px;
            border-left: 3px solid transparent;
        }

        .flash.success { background: var(--accent-soft); color: var(--accent-dark); border-left-color: var(--accent); }
        .flash.error { background: var(--rust-soft); color: var(--rust); border-left-color: var(--rust); }

        .auth-center {
            min-height: calc(100vh - 65px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px 20px;
        }

        .auth-card {
            width: 100%;
            max-width: 380px;
            background: var(--white);
            border: 1px solid var(--line);
            border-top: 4px solid var(--accent);
            border-radius: 10px;
            padding: 40px 36px 32px;
            box-shadow: 0 20px 40px -24px rgba(28, 43, 40, 0.25);
        }

        .auth-card .brand { margin-bottom: 28px; }

        .auth-card h2 { font-size: 26px; margin-bottom: 6px; }
        .auth-card .muted { margin-bottom: 28px; line-height: 1.5; }

        .auth-footer { margin-top: 24px; font-size: 13px; color: var(--muted); text-align: center; }
        .auth-footer a { font-weight: 600; text-decoration: none; }
        .auth-footer a:hover { text-decoration: underline; }

        .panel {
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 10px;
            padding: 28px 32px;
            box-shadow: 0 20px 40px -28px rgba(28, 43, 40, 0.2);
        }

        .header { display: flex; align-items: flex-start; justify-content: space-between; gap: 16px; }
        .header h2 { font-size: 24px; margin-bottom: 4px; }

        .actions { display: flex; align-items: center; gap: 10px; }

        .btn {
            display: inline-block;
            padding: 10px 18px;
            font-size: 14px;
            font-weight: 600;
            font-family: inherit;
            color: var(--paper);
            background: var(--accent);
            border: none;
            border-radius: 7px;
            cursor: pointer;
            text-decoration: none;
            line-height: 1.3;
            transition: background 0.15s ease;
        }

        .btn:hover { background: var(--accent-dark); color: var(--paper); }
        .btn:active { transform: translateY(1px); }

        .btn.ghost {
            background: transparent;
            color: var(--ink);
            border: 1px solid var(--line);
        }

        .btn.ghost:hover { border-color: var(--accent); color: var(--accent); }

        .login-btn { width: 100%; padding: 12px; }

        .link-like {
            background: none;
            border: none;
            padding: 0;
            font: inherit;
            font-size: 13px;
            font-weight: 500;
            color: var(--muted);
            cursor: pointer;
            text-decoration: none;
        }

        .link-like:hover { color: var(--accent); text-decoration: underline; }

        .danger-link {
            background: none;
            border: none;
            padding: 0;
            font: inherit;
            font-size: 13px;
            font-weight: 500;
            color: var(--rust);
            cursor: pointer;
        }

        .danger-link:hover { text-decoration: underline; }

        form.inline { display: inline; }

        label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            color: var(--ink);
            margin-bottom: 6px;
        }

        label:not(:first-of-type) { margin-top: 18px; }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"],
        textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 11px 13px;
            font-size: 14px;
            font-family: inherit;
            color: var(--ink);
            background: var(--paper);
            border: 1px solid var(--line);
            border-radius: 7px;
            outline: none;
            transition: border-color 0.15s ease, background 0.15s ease, box-shadow 0.15s ease;
        }

        textarea { resize: vertical; min-height: 90px; }

        input:focus, textarea:focus {
            border-color: var(--accent);
            background: var(--white);
            box-shadow: 0 0 0 3px var(--accent-soft);
        }

        .password-field { position: relative; }
        .password-field input { padding-right: 42px; }

        .eye-btn {
            position: absolute;
            right: 6px;
            top: 50%;
            transform: translateY(-50%);
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: none;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            color: var(--muted);
        }

        .eye-btn:hover { background: var(--accent-soft); color: var(--accent); }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 200px;
            gap: 4px 20px;
        }

        .form-row .full-width { grid-column: 1 / -1; }

        .tasks-list { display: flex; flex-direction: column; gap: 10px; }

        .task-row {
            display: grid;
            grid-template-columns: 1fr 110px 110px auto;
            align-items: center;
            gap: 16px;
            padding: 14px 16px;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: var(--paper);
            transition: background 0.15s ease, border-color 0.15s ease;
        }

        .task-row:hover { background: var(--white); border-color: var(--accent); }

        .task-name { font-weight: 600; font-size: 14px; }
        .task-desc { color: var(--muted); font-size: 13px; margin-top: 2px; }
        .task-due { color: var(--muted); font-size: 13px; }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .badge.pending { background: var(--amber-soft); color: var(--amber); }
        .badge.completed { background: var(--accent-soft); color: var(--accent-dark); }

        .empty {
            text-align: center;
            padding: 48px 20px;
            color: var(--muted);
            font-size: 14px;
            border: 1px dashed var(--line);
            border-radius: 8px;
        }

        @media (max-width: 640px) {
            .nav { padding: 14px 20px; }
            .header { flex-direction: column; }
            .form-row { grid-template-columns: 1fr; }
            .task-row { grid-template-columns: 1fr; gap: 6px; }
            .task-due::before { content: "Due "; }
        }
    </style>
</head>
<body>
    <nav class="nav">
        <a href="{{ url('/') }}" class="brand">
            <span class="logo">Taskero</span>
        </a>
        <div class="nav-links">
            @auth
                <a href="{{ route('tasks.index') }}">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline">@csrf<button class="link-like" type="submit">Logout</button></form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="flash success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="flash error">{{ $errors->first() }}</div>
        @endif

        <main class="content">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>