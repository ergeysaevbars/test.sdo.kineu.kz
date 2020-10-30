<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use App\Models\Test;
use Illuminate\Http\Request;

class SpecialitiesController extends Controller
{
    public function index(Test $test)
    {
        return view('test.groups', compact('test'));
    }

    public function add(Test $test)
    {
        $specialities = Speciality::query()->orderBy('name')->get();
        return view('test.add-group', compact('specialities', 'test'));
    }

    public function groups(Speciality $speciality)
    {
        return response()->json($speciality->groups(), 200);
    }

    public function store(Test $test, Request $request)
    {
        $validated = $request->validate([
            'group' => ['required', 'integer', 'min:1']
        ], [
            'required' => "Не выбрана группа",
            'integer'  => "Некорректно указана группа",
            'min'      => "Некорректно указана группа",
        ]);


    }
}
