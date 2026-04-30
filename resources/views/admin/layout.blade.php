<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Панель Администратора</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Админ Панель</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.doctors.index') }}">Врачи</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.schedules.index') }}">Расписание</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.appointments.index') }}">Записи пациентов</a></li>
                </ul>
                <a href="/" class="btn btn-outline-light btn-sm">На сайт</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>