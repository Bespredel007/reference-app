<?php
namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;
class NewsController extends Controller
{
    public function index(Request $request)
    {
        $lang = $request->query('lang', 'uk');
        $newsList = News::with('translations')->get();

        return view('news.index', compact('newsList', 'lang'));
    }

}


