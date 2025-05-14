<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $terbaru = Posts::latest()->take(2)->get();

        return view('index', compact('terbaru'));
    }
}
