@extends('admin.layout')
@section('content')
    <div class="mb-3">
        <a href="{{ route('admin.schedules.index') }}" class="btn btn-secondary btn-sm">Назад к расписанию</a>
    </div>

    <h2>Добавить новый слот расписания</h2>
    
    <form action="{{ route('admin.schedules.store') }}" method="POST" class="mt-4" style="max-width: 600px;">
        @csrf
        
        <div class="mb-3">
            <label class="form-label fw-bold">Выберите врача</label>
            <select name="doctor_id" class="form-select" required>
                <option value="" disabled selected>-- Нажмите, чтобы выбрать --</option>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }} ({{ $doctor->specialty }})</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label class="form-label fw-bold">Дата приема</label>
            <!-- input type="date" автоматически вызовет календарик в браузере -->
            <input type="date" name="date" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label fw-bold">Время приема</label>
            <!-- input type="time" сделает удобный выбор часов и минут -->
            <input type="time" name="time" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Создать слот</button>
    </form>
@endsection