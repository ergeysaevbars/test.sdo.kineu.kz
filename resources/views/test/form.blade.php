@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Создать новый тест
        </div>
        <div class="card-body">
            <form action="{{ route('tests.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Название теста</label>
                    <input type="text" class="form-control form-control-sm" id="name" name="name_test">
                </div>
                <div class="form-group">
                    <label for="type">Тип теста</label>
                    <select class="form-control form-control-sm" id="type" name="type_test">
                        <option value="0">Выберите тип теста</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->display_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="speciality">Специальность</label>
                    <select class="form-control form-control-sm" id="speciality" name="speciality">
                        <option value="0">Выберите специальность</option>
                        @foreach($specialities as $speciality)
                            <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div id="table-groups">
                    {{-- Здесь будут Доступные группы выбранной специальности --}}
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Создать</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/ajax.js') }}"></script>
@endsection

