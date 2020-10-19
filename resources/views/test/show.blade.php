@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <b>Тест: </b>{{ $test->name_test  }} <i>({{ $test->type->display_name }})</i>
            <a href="{{ route('questions.create', $test) }}" class="btn btn-sm btn-success float-right">Добавить вопрос</a>
        </div>
        <div class="card-body">
            @forelse($test->questions as $question)
            @empty
                <h5>Тест не содержит вопросов</h5>
            @endforelse
        </div>
    </div>
@endsection

