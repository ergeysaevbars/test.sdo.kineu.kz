@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <b>Тест: </b>{{ $test->name_test  }} <i>({{ $test->type->display_name }})</i>
            <a href="{{ route('test.groups.add', $test) }}" class="btn btn-sm btn-success float-right">Добавить группу</a>
        </div>
        <div class="card-body">
            <h4>Группы, привязанные к тесту</h4>
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Группа</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($test->groups as $group)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $group->groupName() }}</td>
                    <td>
                        <form action="{{ route('test.groups.delete', [$test, $group]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Убрать</button>
                        </form>
                    </td>
                </tr>
                @empty
                    Этот тест не привязан ни к одной из групп
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

