<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function GetNews()
    {
        $apiKey = env('7d9a4c79bce34e7d9675902fee4ee16f');
        $response = Http::get('http://newsapi.org/v2/top-headlines?country=us&apiKey=7d9a4c79bce34e7d9675902fee4ee16f' . $apiKey);
        
        if ($response->successful()) {
            $newsData = $response->json()['articles'];
            return view('news', ['news' => $newsData]);
        }

        return response()->json(['error' => 'Unable to fetch news'], 500);
    }
}