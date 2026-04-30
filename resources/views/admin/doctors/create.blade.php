@extends('admin.layout')
@section('content')
    <h2>Добавить врача</h2>
    <form action="{{ route('admin.doctors.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>ФИО</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Специальность</label>
            <input type="text" name="specialty" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Описание</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection