@extends('admin.layout')
@section('content')
<div class="mb-3">
    <a href="{{ route('admin.doctors.index') }}" class="btn btn-secondary btn-sm">Назад к списку</a>
</div>

<h2>Редактировать врача</h2>

<form action="{{ route('admin.doctors.update', $doctor) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>ФИО</label>
        <input type="text" name="name" class="form-control" value="{{ $doctor->name }}" required>
    </div>

    <div class="mb-3">
        <label>Специальность</label>
        <input type="text" name="specialty" class="form-control" value="{{ $doctor->specialty }}" required>
    </div>

    <div class="mb-3">
        <label>Описание</label>
        <!-- Обратите внимание, что у textarea нет атрибута value, текст пишется между тегами -->
        <textarea name="description" class="form-control">{{ $doctor->description }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">Обновить данные</button>
</form>
@endsection