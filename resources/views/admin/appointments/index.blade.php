@extends('admin.layout')
@section('content')
    <h2>Все записи пациентов</h2>
    <table class="table table-bordered mt-3">
        <tr><th>Пациент</th><th>Почта</th><th>Врач</th><th>Дата/Время</th><th>Статус</th></tr>
        @foreach($appointments as $appointment)
            <tr>
                <td>{{ $appointment->user->name }}</td>
                <td>{{ $appointment->user->email }}</td>
                <td>{{ $appointment->schedule->doctor->name }}</td>
                <td>{{ $appointment->schedule->date }} {{ $appointment->schedule->time }}</td>
                <td>{{ $appointment->status }}</td>
            </tr>
        @endforeach
    </table>
@endsection