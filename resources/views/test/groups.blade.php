@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <b>Тест: </b>{{ $test->name_test  }} <i>({{ $test->type->display_name }})</i>
            <a href="{{ route('test.groups.add', $test) }}" class="btn btn-sm btn-success float-right">Добавить группу</a>
        </div>
        <div class="card-body">

        </div>
    </div>
@endsection

