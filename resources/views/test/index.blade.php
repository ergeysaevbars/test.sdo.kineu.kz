@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Список Ваших тестов
        </div>
        <div class="card-body">
            <h4>Список Ваших тестов</h4>
            <table class="table table-sm table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Тест</th>
                    <th scope="col">Тип</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($tests as $test)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $test->name_test }}</td>
                        <td>{{ $test->type->display_name }}</td>
                        <td>
                            <a href="{{route('tests.show', $test)}}" class="btn btn-sm btn-success">Открыть</a>
                            <a href="{{route('tests.edit', $test)}}" class="btn btn-sm btn-warning">Редактировать</a>
                            <a href="{{route('test.groups', $test)}}" class="btn btn-sm btn-primary">Редактировать</a>
                        </td>
                    </tr>
                @empty
                    Тестов не найдено
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

