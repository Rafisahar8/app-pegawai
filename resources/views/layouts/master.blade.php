<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'App Pegawai')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>@yield('page-title', 'App Pegawai')</h1>
    <nav style="background-color: #2c2f33; padding: 10px;">
        <ul style="list-style: none; display: flex; justify-content: center; gap: 30px; margin: 0; padding: 0;">
            <li><a href="{{ route('employees.index') }}" style="color: white; text-decoration: none;">Employees</a></li>
            <li><a href="{{ route('departments.index') }}" style="color: white; text-decoration: none;">Department</a></li>
            <li><a href="{{ route('attendances.index') }}" style="color: white; text-decoration: none;">Attendance</a></li>
            <li><a href="{{ route('positions.index') }}" style="color: white; text-decoration: none;">Jabatan</a></li>
            <li><a href="{{ route('salaries.index') }}" style="color: white; text-decoration: none;">Salaries</a></li>
      
        </ul>
    </nav>
</header>
<main>
    @yield('content')
</main>
<footer>
    <p>&copy; {{ date('Y') }} App Pegawai</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>