<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Social\CreateSkillRequest;
use App\Http\Requests\Social\UpdateSkillRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Social;
use Illuminate\View\View;

class SocialController extends Controller
{
    /**
     * @return View
     */
    public function index()
    : View
    {
        return view('admin.socials.index', [
            'socials' => Social::all(),
        ]);
    }

    /**
     * @return View
     */
    public function create()
    : View
    {
        return view('admin.socials.create');
    }

    /**
     * @param  CreateSkillRequest  $request
     * @return RedirectResponse
     */
    public function store(CreateSkillRequest $request)
    : RedirectResponse {
        $data = $request->validated();

        $logoName = time().'.'.request()->logo->getClientOriginalExtension();
        request()->logo->move(public_path('images'), $logoName);

        $data['logo'] = $logoName;

        if (Social::create($data)) {
            flash('Social created')->success();

            return redirect()->route('admin.socials.index');
        }

        flash('Error while social creating')->error();

        return redirect()->back()->withErrors()->withInput();
    }

    /**
     * @param  Social  $social
     * @return View
     */
    public function edit(Social $social)
    : View {
        return view('admin.socials.edit', [
            'social' => $social,
        ]);
    }

    /**
     * @param  UpdateSkillRequest  $request
     * @param  Social  $social
     * @return RedirectResponse
     */
    public function update(UpdateSkillRequest $request, Social $social)
    : RedirectResponse {
        $data = $request->validated();

        if (request()->logo) {
            $logoName = time().'.'.request()->logo->getClientOriginalExtension();
            request()->logo->move(public_path('images'), $logoName);

            $data['logo'] = $logoName;
        }

        if ($social->update($data)) {
            flash('Social edited')->success();

            return redirect()->route('admin.socials.index');
        }

        flash('Error while social editing')->error();

        return redirect()->back()->withErrors()->withInput();
    }

    /**
     * @param  Social  $social
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Social $social)
    : RedirectResponse {
        if ($social->delete()) {
            flash('Social deleted')->success();

            return redirect()->route('admin.socials.index');
        }

        flash('Error while social removing')->error();

        return redirect()->route('admin.socials.index');

    }
}
