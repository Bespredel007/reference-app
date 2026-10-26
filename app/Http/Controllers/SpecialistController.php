<?php

namespace App\Http\Controllers;

use App\Models\Specialist;
use App\Models\Tracker;
use App\Http\Requests\SpecialistRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function top()
    {
        $specialists = Specialist::all();
        $views = Tracker::query()
            ->select('page', DB::raw('count(*) as total_views'))
            ->where('page', 'like', 'specialists/%')
            ->groupBy('page')
            ->pluck('total_views', 'page');

        $specialists->each(function ($specialist) use ($views) {
            $path = 'specialists/' . $specialist->id;
            $specialist->views_count = $views->get($path, 0);
        });

        $topSpecialists = $specialists->sortByDesc('views_count')->values();

        return view('specialists.top', compact('topSpecialists'));
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
