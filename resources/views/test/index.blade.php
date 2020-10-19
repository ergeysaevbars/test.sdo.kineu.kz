@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Список Ваших тестов
        </div>
        <div class="card-body">
            <h4>Список Ваших тестов</h4>
            @forelse($tests as $test)
                <p><a href="{{route('tests.show', $test)}}" class="btn btn-sm btn-link">{{ $test->name_test }}</a></p>
            @empty
                Тестов не найдено
            @endforelse
        </div>
    </div>
@endsection

