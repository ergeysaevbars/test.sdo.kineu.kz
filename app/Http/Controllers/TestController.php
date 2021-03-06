<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestsRequest;
use App\Models\Speciality;
use App\Models\Test;
use App\Models\TestsType;
use Carbon\Carbon;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Mockery\Exception;

class TestController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Test::class, 'test');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tests = Auth::user()->tests()->orderBy('id', 'desc')->with('type')->get();
        return view('test.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $specialities = Speciality::query()->orderBy('name')->get();
        $types = TestsType::query()->where('id', '<>', 4)->get();
        return view('test.form', compact('types', 'specialities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TestsRequest $request
     * @return RedirectResponse
     */
    public function store(TestsRequest $request)
    {
        try {
            $test = new Test($request->only('name_test', 'type_test'));
            $test->user_id = Auth::id();
            $test->load_date = Carbon::now()->toDateTimeString();

            if (!$test->save()) {
                Session::flash('error', "Произошла ошибка при сохранении теста. Пожалуйста попробуйте позже");

                Log::error("Произошла ошибка при сохранении теста. Пожалуйста попробуйте позже", [
                    'name_test' => $request->get('name_test'),
                    'type_test' => $request->get('name_test'),
                    'user_id'   => Auth::id(),
                ]);

                return redirect()->back();
            }
        } catch (Exception $e) {
            Session::flash('error', "Произошла ошибка при сохранении теста. Пожалуйста попробуйте позже");

            Log::error("Произошла ошибка при сохранении теста. Пожалуйста попробуйте позже", [
                'name_test' => $request->get('name_test'),
                'type_test' => $request->get('name_test'),
                'user_id'   => Auth::id(),
            ]);

            return redirect()->back();
        }

        return redirect()->route('tests.show', $test->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return @return \Illuminate\Contracts\View\View
     */
    public function show(Test $test)
    {
        return view('test.show', compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        $types = TestsType::query()->where('id', '<>', 4)->get();
        return view('test.form', compact('test', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TestsRequest  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(TestsRequest $request, Test $test)
    {
        try {
            $test->name_test = $request->get('name_test');
            $test->type_test = $request->get('type_test');

            if (!$test->save()) {
                Session::flash('error', "Произошла ошибка при редактировании теста. Пожалуйста попробуйте позже");

                Log::error("Произошла ошибка при редактировании теста. Пожалуйста попробуйте позже", [
                    'name_test' => $request->get('name_test'),
                    'type_test' => $request->get('name_test'),
                    'user_id'   => Auth::id(),
                ]);

                return redirect()->back();
            }
        } catch (\Exception $e) {
            Session::flash('error', "Произошла ошибка при редактировании теста. Пожалуйста попробуйте позже");

            Log::error("Произошла ошибка при редактировании теста. Пожалуйста попробуйте позже", [
                'name_test' => $request->get('name_test'),
                'type_test' => $request->get('name_test'),
                'user_id'   => Auth::id(),
            ]);

            return redirect()->back();
        }

        return redirect()->route('tests.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }

    public function groups(Test $test)
    {
        $specialities = Speciality::query()->with('groups')->get();
        return view('test.groups', compact('test', 'specialities'));
    }
}
