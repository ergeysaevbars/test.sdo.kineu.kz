@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <b>Тест: </b>{{ $test->name_test  }} <i>({{ $test->type->display_name }})</i>
            <span class="float-right">
                @isset($question)
                    Форма редактирования вопроса
                @else
                    Форма добавления нового вопроса
                @endisset
            </span>
        </div>
        <div class="card-body">
            @error('prav_otvet')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror

            <form action="{{ isset($question) ? route('questions.update', [$test, $question]) : route('questions.store', $test) }}"
                  method="post">
                @csrf
                @isset($question)
                    @method('PUT')
                @endisset
            <!-- Вопрос -->
                <div class="form-group">
                    <label for="vopros">Вопрос</label>
                    <textarea class="textarea @error('vopros') is-invalid @enderror" name="vopros" id="vopros">
                        {{ old('vopros') ?? (isset($question) ? $question->vopros : '') }}
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
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="prav_otvet" id="otvet{{ $i }}"
                                   value="{{ $i }}" {{ (old('prav_otvet') ?? (isset($question) ? $question->prav_otvet : '')) == $i ? 'checked' : '' }}>
                            <label class="form-check-label" for="otvet{{ $i }}">Ответ {{ $i }}</label>
                        </div>
                        <textarea class="textarea @if($errors->has("otvet$i")) is-invalid @endif" name="otvet{{ $i }}"
                                  id="otvet{{ $i }}">
                        {{ old("otvet$i") ?? (isset($question) ? $question->{"otvet$i"} : '') }}
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

