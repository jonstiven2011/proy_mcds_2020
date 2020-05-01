<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Article;
use App\Category;
use App\User;



class ArticlesExport implements FromView
{
    public function view(): View
    {
        return view('articles.excel',[
            'users' => User::all(),
			'categories' => Category::all(),
            'articles' => Article::all()
        ]);
    }
}

