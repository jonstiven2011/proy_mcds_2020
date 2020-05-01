<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Category;


class CategoriesExport implements FromView
{
    public function view(): View
    {
        return view('categories.excel',[
            'categories' => Category::all()
        ]);
    }
}

