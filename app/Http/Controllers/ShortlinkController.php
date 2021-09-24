<?php

namespace App\Http\Controllers;

use App\Models\Shortlink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ShortlinkController extends Controller
{
    public function index()
    {
        return view('welcome');
    }


    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
        ]);

        $request->exists('nsfw') ? $nsfw = $request->nsfw : $nsfw = false;

        $shortLink = Shortlink::firstOrCreate([
            'code' => Str::random(8),
            'url' => $request->url,
            'nsfw' => $nsfw
        ]);

        return redirect('home', [ 'shortlink' => $shortLink->linkData() ]);
    }

    public function show(Request $request)
    {
        $link = Shortlink::where('code', '=', $request->code)->firstOrFail();
        $link->increment('visits');
        return redirect($link->url);
    }

    public function topVisited()
    {
        $topUrls = Shortlink::all()->sortByDesc('visits')->take(100);
        return view('topUrls', ['topUrls' => $topUrls]);
    }

    public function ApiStore(Request $request)
    {
        $validator = Validator::make($request->all(), ['url' => 'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/']);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }

        $request->exists('nsfw') ? $nsfw = $request->nsfw : $nsfw = false;

        $shortLink = Shortlink::firstOrCreate([
            'code' => Str::random(8),
            'url' => $request->url,
            'nsfw' => $nsfw
        ]);

        return $shortLink->linkData();
    }

    public function ApiShowMostVisitedLinks()
    {
        $topUrls = [];
        $queryTopUrls = Shortlink::all()->sortByDesc('visits')->take(100); 
        foreach($queryTopUrls as $url){
            $topUrls [] = $url->linkData();
        }

        return $topUrls;
    }
}
