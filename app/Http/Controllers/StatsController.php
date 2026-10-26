<?php

namespace App\Http\Controllers;

use App\Models\Tracker;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function pages(Request $request)
    {
        $type = $request->query('type', 'page');
        if (!in_array($type, ['page', 'ip', 'search_query'], true)) {
            abort(400, 'Невідомий тип групування.');
        }

        $rows = Tracker::query()
            ->whereNotNull($type)
            ->where($type, '!=', '')
            ->selectRaw("{$type}, count(*) as hits, max(visited_at) as last_visit")
            ->groupBy($type)
            ->orderByDesc('hits')
            ->get();

        return view('stats.pages', compact('rows', 'type'));
    }

    public function detail(Request $request)
    {
        $type = $request->query('type', 'page');
        $item = $request->query('item');

        // ДОДАНО 'search_query' до дозволених типів фільтрації
        if (!in_array($type, ['page', 'ip', 'search_query'], true)) {
            abort(400, 'Невідомий тип фільтрації.');
        }

        $rows = Tracker::query()
            ->when($item, fn ($query, $value) => $query->where($type, $value))
            ->orderByDesc('visited_at')
            ->paginate(15)
            ->withQueryString();

        return view('stats.detail', compact('rows', 'type', 'item'));
    }
}
