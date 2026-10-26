<?php
namespace App\Http\Middleware;

use App\Models\Tracker;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisit
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        $queryString = $request->getQueryString();
        Tracker::create([
            'page'         => $request->path(),
            'ip'           => $request->ip() ?? '127.0.0.1',
            'status'       => $response->getStatusCode(),
            'search_query' => $queryString ?: 'Без параметрів',
            'visited_at'   => now(),
        ]);

        return $response;
    }
}
