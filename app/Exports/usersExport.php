<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\User;


class UsersExport implements FromView
{
    public function view(): View
    {
        return view('users.excel',[
            'users' => User::all()
        ]);
    }
}