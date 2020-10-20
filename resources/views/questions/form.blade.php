@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <b>Тест: </b>{{ $test->name_test  }} <i>({{ $test->type->display_name }})</i>
            <span class="float-right">Форма добавления нового вопроса</span>
        </div>
        <div class="card-body">
            <form action="{{ route('questions.store', $test) }}" method="post">
                @csrf
                <!-- Вопрос -->
                <div class="form-group">
                    <label for="vopros">Вопрос</label>
                    <textarea class="textarea @error('vopros') is-invalid @enderror" name="vopros" id="vopros">
                        {{ old('vopros') }}
                    </textarea>
                    @error('vopros')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- Вопрос -->

                <!-- Ответы -->
                @for ($i = 1; $i <= 5; $i++)
                    <div class="form-group">
                        <label for="otvet{{ $i }}">Ответ {{ $i }}</label>
                        <textarea class="textarea @if($errors->has("otvet$i")) is-invalid @endif" name="otvet{{ $i }}"
                                  id="otvet{{ $i }}">
                        {{ old("otvet$i") }}
                    </textarea>
                        @if ($errors->has("otvet$i"))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first("otvet$i") }}</strong>
                            </span>
                        @endif
                    </div>
                @endfor
                <!-- Ответы -->

                <button class="btn btn-sm btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        CKEDITOR.replaceClass = "textarea";
    </script>
@endsection

