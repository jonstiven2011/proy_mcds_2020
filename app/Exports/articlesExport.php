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
        
        if(Auth::user()->role == 'admin'){
            $articles = Article::paginate(8);
        }else if(Auth::user()->role == 'editor'){
            $articles = Article::where('user_id', '=', Auth::user()->id)->paginate(8);
        }
        return view('articles.excel',[
            //'users' => User::all(),
            'articles' => $articles,
			'categories' => Category::all(),
            'articles' => Article::all()
        ]);
    }
}

