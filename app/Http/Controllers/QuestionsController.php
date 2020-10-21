<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use App\Models\Test;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function create(Test $test)
    {
        return view('questions.form', compact('test'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  QuestionRequest  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request, Test $test)
    {
        $questions = $test->questions;

        if ($questions->isEmpty()) {
            $nom_vop_disc = 1;
        } else {
            $nom_vop_disc = $questions->last()->nom_vop_disc + 1;
        }

        try {
            $question = new Question([
                'id_test' => $test->id,
                'vopros' => strip_tags($request->get('vopros'), '<img><sub><sup>'),
                'otvet1' => strip_tags($request->get('otvet1'), '<img><sub><sup>'),
                'otvet2' => strip_tags($request->get('otvet2'), '<img><sub><sup>'),
                'otvet3' => strip_tags($request->get('otvet3'), '<img><sub><sup>'),
                'otvet4' => strip_tags($request->get('otvet4'), '<img><sub><sup>'),
                'otvet5' => strip_tags($request->get('otvet5'), '<img><sub><sup>'),
                'prav_otvet' => strip_tags($request->get('prav_otvet'), '<img><sub><sup>'),
            ]);

            $question->nom_vop_disc = $nom_vop_disc;

            if (!$question->save()) {
                Session::flash('error', "Произошла ошибка при попытке создания вопроса. Пожалуйста попробуйте позже.");
            }
        } catch (Exception $e) {
            Log::error("Произошла ошибка при попытке создания вопроса.", [
                'request' => $request->except('_token'),
                'user_id' => Auth::id(),
                'test_id' => $test->id,
                'message' => $e->getMessage(),
                'code'    => $e->getCode(),
                'trace'   => $e->getTrace(),
            ]);

            Session::flash('error', "Произошла ошибка при попытке создания вопроса. Пожалуйста попробуйте позже.");
        }
        return redirect()->route('tests.show', $test);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
