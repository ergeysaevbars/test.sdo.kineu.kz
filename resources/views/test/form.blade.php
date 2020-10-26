@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            @isset($test)
                Редактировать тест
            @else
                Создать новый тест
            @endisset
        </div>
        <div class="card-body">
            @if(\Illuminate\Support\Facades\Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ \Illuminate\Support\Facades\Session::get('error') }}
                </div>
                <br>
            @endif
            <form action="{{ isset($test) ? route('tests.update', $test) : route('tests.store') }}" method="post">
                @csrf
                @isset($test)
                    @method('PUT')
                @endisset
                <div class="form-group">
                    <label for="name">Название теста</label>
                    <input type="text" class="form-control form-control-sm @error('name_test') is-invalid @enderror"
                           id="name" name="name_test"
                           value="{{ old('name_test') ?? (isset($test) ? $test->name_test : '') }}"
                           placeholder="Введите название теста">
                    @error('name_test')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="type">Тип теста</label>
                    <select class="form-control form-control-sm @error('type_test') is-invalid @enderror" id="type"
                            name="type_test">
                        <option value="0">Выберите тип теста</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ (old('type_test') ?? isset($test) ? $test->type->id : '') == $type->id ? 'selected' : '' }}>{{ $type->display_name }}</option>
                        @endforeach
                    </select>
                    @error('type_test')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/ajax.js') }}"></script>
@endsection

