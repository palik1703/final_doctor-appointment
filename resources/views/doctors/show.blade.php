<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>{{ $doctor->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <a href="/" class="btn btn-secondary mb-3">Назад</a>
        <div class="card shadow-sm p-4">
            <h2>{{ $doctor->name }}</h2>
            <h5 class="text-muted">{{ $doctor->specialty }}</h5>
            <p>{{ $doctor->description }}</p>

            <h4 class="mt-4">Доступные слоты для записи:</h4>
            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <h4 class="mt-4 mb-3">Свободное время для записи:</h4>

            @forelse($schedules as $date => $slots)
            <div class="mb-4">
                <h5 class="text-primary border-bottom pb-2">📅 {{ \Carbon\Carbon::parse($date)->translatedFormat('d F Y') }} ({{ \Carbon\Carbon::parse($date)->translatedFormat('l') }})</h5>
                <div class="d-flex flex-wrap gap-2 mt-3">
                    @foreach($slots as $schedule)
                    @auth
                    <form action="{{ route('appointments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
                        <button type="submit" class="btn btn-outline-success">
                            🕒 {{ \Carbon\Carbon::parse($schedule->time)->format('H:i') }}
                        </button>
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary">
                        🕒 {{ \Carbon\Carbon::parse($schedule->time)->format('H:i') }}
                    </a>
                    @endauth
                    @endforeach
                </div>
            </div>
            @empty
            <div class="alert alert-info">
                К сожалению, у данного врача сейчас нет свободного времени для записи.
            </div>
            @endforelse
        </div>
    </div>
</body>

</html>