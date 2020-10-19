@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <b>Тест: </b>{{ $test->name_test  }} <i>({{ $test->type->display_name }})</i>
            <span class="float-right">Форма добавления нового вопроса</span>
        </div>
        <div class="card-body">
            <!-- Вопрос -->
            Вопрос
            <textarea name="question" class="textarea" name="question"></textarea>
            <!-- Вопрос -->
        </div>
    </div>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        CKEDITOR.replaceClass = "textarea";
    </script>
@endsection

