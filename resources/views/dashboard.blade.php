<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Личный кабинет пациента') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Кнопка только для Администратора -->
                    @if(Auth::user()->role === 'admin')
                    <div class="mb-6 pb-6 border-b border-gray-200">
                        <h3 class="text-lg font-bold mb-3 text-purple-700">Управление клиникой:</h3>
                        <a href="{{ route('admin.doctors.index') }}" class="inline-block bg-purple-600 text-white px-6 py-2 rounded hover:bg-purple-700 font-semibold" style="text-decoration: none;">
                            ⚙️ Войти в Панель Администратора
                        </a>
                    </div>
                    @endif
                    <h3 class="text-lg font-bold mb-4">Мои предстоящие приемы:</h3>

                    @if($appointments->isEmpty())
                    <p class="text-gray-500">У вас пока нет активных записей к врачам.</p>
                    <a href="{{ route('home') }}" class="mt-3 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 text-decoration-none">Записаться к врачу</a>
                    @else
                    <table class="min-w-full bg-white border">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Врач</th>
                                <th class="py-2 px-4 border-b">Специальность</th>
                                <th class="py-2 px-4 border-b">Дата и время</th>
                                <th class="py-2 px-4 border-b">Статус</th>
                                <th class="py-2 px-4 border-b">Действие</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $appointment)
                            <tr class="text-center">
                                <td class="py-2 px-4 border-b">{{ $appointment->schedule->doctor->name }}</td>
                                <td class="py-2 px-4 border-b">{{ $appointment->schedule->doctor->specialty }}</td>
                                <td class="py-2 px-4 border-b">{{ $appointment->schedule->date }} в {{ $appointment->schedule->time }}</td>
                                <td class="py-2 px-4 border-b">
                                    @if($appointment->status == 'active')
                                    <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded border border-green-400">Активна</span>
                                    @else
                                    <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded border border-red-400">Отменена</span>
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b">
                                    @if($appointment->status == 'active')
                                    <form action="{{ route('appointments.destroy', $appointment) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600" onclick="return confirm('Вы уверены, что хотите отменить запись?')">Отменить</button>
                                    </form>
                                    @else
                                    -
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>