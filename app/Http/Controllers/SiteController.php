<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntryRequest;
use App\Http\Requests\TrainingRequest;

class SiteController extends Controller
{
    public function say(string $message = 'Привіт')
    {
        return view('site.say', ['message' => $message]);
    }

    public function entry()
    {
        return view('site.entry');
    }

    public function entryStore(EntryRequest $request)
    {
        return view('site.entry-confirm', $request->validated());
    }

    // --- Індивідуальне завдання ---
    public function training()
    {
        $clubTitle = 'Спорт клуб «Dungeon Gym»';
        return view('site.training', ['clubTitle' => $clubTitle]);
    }

    public function trainingStore(TrainingRequest $request)
    {
        $data = $request->validated();
        return view('site.training-confirm', $data);
    }
}
