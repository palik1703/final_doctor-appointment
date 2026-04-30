@extends('admin.layout')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Список врачей</h2>
        <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary">Добавить врача</a>
    </div>
    <table class="table table-bordered">
        <tr><th>ID</th><th>ФИО</th><th>Специальность</th><th>Действия</th></tr>
        @foreach($doctors as $doctor)
            <tr>
                <td>{{ $doctor->id }}</td>
                <td>{{ $doctor->name }}</td>
                <td>{{ $doctor->specialty }}</td>
                <td>
                    <a href="{{ route('admin.doctors.edit', $doctor) }}" class="btn btn-warning btn-sm">Ред.</a>
                    <form action="{{ route('admin.doctors.destroy', $doctor) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Удалить?')">Удал.</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection