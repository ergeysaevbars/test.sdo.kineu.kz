@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <b>Тест: </b>{{ $test->name_test  }} <i>({{ $test->type->display_name }})</i>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif

            <form action="{{ route('test.groups.store', $test) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="spec">Специальность</label>
                    <select class="form-control form-control-sm" id="spec" name="spec">
                        <option value="0">Выберите специальность</option>
                        @foreach($specialities as $speciality)
                            <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="group">Группа</label>
                    <select class="form-control form-control-sm" id="group" name="group">
                    </select>
                </div>
                <button class="btn btn-sm btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/ajax.js') }}"></script>
@endsection

