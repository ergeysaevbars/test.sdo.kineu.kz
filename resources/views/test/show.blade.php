@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <b>Тест: </b>{{ $test->name_test  }} <i>({{ $test->type->display_name }})</i>
            <a href="{{ route('questions.create', $test) }}" class="btn btn-sm btn-success float-right">Добавить
                вопрос</a>
        </div>
        <div class="card-body">
            @if(\Illuminate\Support\Facades\Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ \Illuminate\Support\Facades\Session::get('error') }}
                </div>
                <br>
            @endif

            @forelse($test->questions as $question)
                <div class="card-body">
                    <a class="btn btn-sm btn-primary float-right" href="{{ route('questions.edit', [$test, $question->id]) }}">
                        Редактировать
                    </a>
                    <p class="card-text"><b>Вопрос № {{ $loop->iteration }}.</b> {!! $question->vopros !!}</p>
                    @foreach([1 => 'a', 'b', 'c', 'd', 'e'] as $key => $litera)
                        <p class="card-text">{{ $litera }})
                            <small class="text-muted">{!! $question->{"otvet$key"} !!}</small>
                            @if($key == $question->prav_otvet)
                                <small class="text-muted"><b><i>(Верный ответ)</i></b></small>
                            @endif
                        </p>
                    @endforeach
                    <form class="float-right" action="{{ route('questions.destroy', [$test, $question]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Удалить</button>
                    </form>
                </div>
                <hr>
            @empty
                <h5>Тест не содержит вопросов</h5>
            @endforelse
        </div>
    </div>
@endsection

