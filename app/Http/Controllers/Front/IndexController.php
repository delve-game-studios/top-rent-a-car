<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Image;

class IndexController extends Controller
{
    public function index()
    {
        $images = Image::orderBy('id', 'DESC')->limit(6)->get();
        return view('front.index', compact('images'));
    }
}
