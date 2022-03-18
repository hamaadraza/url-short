<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $urls = Url::all();
        return view('dashboard', compact('urls'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $url = new Url;
        $url->destination = $request->destination;
        $url->slug = \Str::random(5); // Use of laravel helper
        $url->save();

        return redirect()->back(); 


    }

    public function storeApi(Request $request)
    {
        //
        $url = new Url;
        $url->destination = $request->destination;
        $url->slug = \Str::random(5); // Use of laravel helper
        $url->save();

        $url->shortend_url = 'http://127.0.0.1:8000/'.$url->slug;

         return response()->json($url);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function direct($slug)
    {
        //
        $url = Url::where('slug', $slug)->firstOrFail();
        return redirect($url->destination);
    }


}
