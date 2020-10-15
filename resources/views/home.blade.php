@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Добро пожаловать</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <h4>Список Ваших тестов</h4>
            @forelse($tests as $test)
                <p>{{ $test->name_test }}</p>
            @empty
                Тестов не найдено
            @endforelse
        </div>
    </div>
@endsection
