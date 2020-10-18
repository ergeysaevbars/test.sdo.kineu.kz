<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestsRequest;
use App\Models\Speciality;
use App\Models\Test;
use App\Models\TestsType;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $test = new Test($request->only('name_test', 'type_test'));
        $test->user_id = Auth::id();
        $test->load_date = Carbon::now()->toDateTimeString();
        $test->save();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        //
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

    public function groups(Speciality $speciality)
    {
        return view('test.groups', compact('speciality'));
    }
}
