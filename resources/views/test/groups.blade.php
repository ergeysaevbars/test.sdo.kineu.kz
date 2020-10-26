@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <b>Тест: </b>{{ $test->name_test  }} <i>({{ $test->type->display_name }})</i>
        </div>
        <div class="card-body">
            @if(\Illuminate\Support\Facades\Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ \Illuminate\Support\Facades\Session::get('error') }}
                </div>
                <br>
            @endif

            @foreach($specialities as $speciality)
                <h5>{{ $speciality->name }}</h5>
                @foreach($speciality->groups as $group)
                    <h6>{{ $group->spec_name . ' ' . $group->spec_forma . ' ' . $group->spec_year . ' ' . $group->groupName() }}</h6>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection

