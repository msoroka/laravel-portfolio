<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function homepage()
    : View
    {
        return view('index', [
            'title'  => 'msoroka - Software Developer',
            'brand'  => 'msoroka.dev',
            'skills' => Skill::all(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminDashboard()
    : View
    {
        return view('admin.index');
    }
}
