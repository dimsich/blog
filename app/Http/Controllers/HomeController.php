<?php

namespace App\Http\Controllers;

use App\Category;
use App\Article;
use App\Http\Requests;

class HomeController extends Controller
{

    public function index()
    {
        return view('home',
            [
                'categories' => Category::all(),
                'articles' => Article::orderBy('created_at', 'desc')->paginate(3)
            ]);
    }

}