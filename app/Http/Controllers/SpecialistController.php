<?php

namespace App\Http\Controllers;

use App\Models\Specialist;
use App\Http\Requests\SpecialistRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpecialistController extends Controller
{
    public function index(Request $request)
    {
        $query = Specialist::query();
        if ($request->has('specialty') && $request->specialty != '') {
            $query->where('specialty', 'like', '%' . $request->specialty . '%');
        }
        $specialists = $query->paginate(4)->withQueryString();
        return view('specialists.index', compact('specialists'));
    }
    public function create()
    {
        return view('specialists.create');
    }
    public function store(SpecialistRequest $request)
    {
        Specialist::create($request->validated());

        return redirect()->route('specialists.index');
    }
    public function show(Specialist $specialist)
    {
        return view('specialists.show', compact('specialist'));
    }
    public function edit(Specialist $specialist)
    {
        return view('specialists.edit', compact('specialist'));
    }
    public function update(SpecialistRequest $request, Specialist $specialist)
    {
        $specialist->update($request->validated());

        return redirect()->route('specialists.index');
    }
    public function destroy(Specialist $specialist)
    {
        $specialist->delete();

        return redirect()->route('specialists.index');
    }
}
