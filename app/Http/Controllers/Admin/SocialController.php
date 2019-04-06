<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Social;

class SocialController extends Controller
{
    public function index()
    {
        return view('admin.socials.index', [
            'socials' => Social::all(),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Social $social)
    {
        //
    }

    public function edit(Social $social)
    {
        //
    }

    public function update(Request $request, Social $social)
    {
        //
    }

    public function destroy(Social $social)
    {
        //
    }
}
