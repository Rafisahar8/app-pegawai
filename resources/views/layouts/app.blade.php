<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f7f9fc; }
        .container { background: #fff; border-radius: 12px; padding: 20px; box-shadow: 0 3px 10px rgba(0,0,0,0.1); }
        table th { background: #212529 !important; color: #fff; }
        .btn-primary { background-color: #4f46e5; border: none; }
        .btn-primary:hover { background-color: #4338ca; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ route('employees.index') }}">Employee App</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('employees.index') }}" class="nav-link {{ request()->is('employees*') ? 'active fw-bold' : '' }}">
                            Employees
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('departments.index') }}" class="nav-link {{ request()->is('departments*') ? 'active fw-bold' : '' }}">
                            Departments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('positions.index') }}" class="nav-link {{ request()->is('positions*') ? 'active fw-bold' : '' }}">
                            Jabatan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('attendances.index') }}" class="nav-link {{ request()->is('attendances*') ? 'active fw-bold' : '' }}">
                            Attendance
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('salaries.index') }}" class="nav-link {{ request()->is('salaries*') ? 'active fw-bold' : '' }}">
                            Salaries
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
