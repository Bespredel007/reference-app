<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainingRequest;

class TrainingController extends Controller
{
    public function index()
    {
        $clubTitle = 'Спорт клуб «Dungeon Gym»';
        return view('site.training', ['clubTitle' => $clubTitle]);
    }
    public function store(TrainingRequest $request)
    {
        $data = $request->validated();
        return view('site.training-confirm', $data);
    }
}
