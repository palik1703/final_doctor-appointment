@extends('admin.layout')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Управление расписанием</h2>
        <a href="{{ route('admin.schedules.create') }}" class="btn btn-primary">Добавить слот</a>
    </div>
    <table class="table table-bordered">
        <tr><th>Врач</th><th>Дата</th><th>Время</th><th>Доступен</th><th>Действие</th></tr>
        @foreach($schedules as $schedule)
            <tr>
                <td>{{ $schedule->doctor->name }}</td>
                <td>{{ $schedule->date }}</td>
                <td>{{ $schedule->time }}</td>
                <td>{{ $schedule->is_available ? 'Да' : 'Нет' }}</td>
                <td>
                    <form action="{{ route('admin.schedules.destroy', $schedule) }}" method="POST">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection