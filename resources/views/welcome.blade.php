<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Запись к врачу</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">МедЦентр</a>
            <div>
                @auth
                <a href="{{ route('dashboard') }}" class="text-white text-decoration-none">Личный кабинет</a>
                @else
                <a href="{{ route('login') }}" class="text-white text-decoration-none me-3">Войти</a>
                <a href="{{ route('register') }}" class="text-white text-decoration-none">Регистрация</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4">Наши специалисты</h2>
        <!-- Блок фильтрации -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <form action="{{ route('home') }}" method="GET" class="d-flex align-items-center">
                    <label class="me-3 fw-bold">Найти специалиста:</label>
                    <select name="specialty" class="form-select w-auto me-3">
                        <option value="">Все специальности</option>
                        @foreach($specialties as $specialty)
                        <option value="{{ $specialty }}" {{ request('specialty') == $specialty ? 'selected' : '' }}>
                            {{ $specialty }}
                        </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Показать</button>
                    @if(request('specialty'))
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary ms-2">Сбросить</a>
                    @endif
                </form>
            </div>
        </div>
        <div class="row">
            @foreach($doctors as $doctor)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $doctor->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $doctor->specialty }}</h6>
                        <p class="card-text">{{ Str::limit($doctor->description, 50) }}</p>
                        <a href="{{ route('doctors.show', $doctor) }}" class="btn btn-outline-primary">Посмотреть расписание</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>