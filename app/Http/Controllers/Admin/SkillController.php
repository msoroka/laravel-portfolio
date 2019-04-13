<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Skill\CreateSkillRequest;
use App\Http\Requests\Skill\UpdateSkillRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Skill;
use Illuminate\View\View;

class SkillController extends Controller
{
    /**
     * @return View
     */
    public function index()
    : View
    {
        return view('admin.skills.index', [
            'skills' => Skill::all(),
        ]);
    }

    /**
     * @return View
     */
    public function create()
    : View
    {
        return view('admin.skills.create');
    }

    /**
     * @param  CreateSkillRequest  $request
     * @return RedirectResponse
     */
    public function store(CreateSkillRequest $request)
    : RedirectResponse {
        $data = $request->validated();

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

        $data['image'] = $imageName;

        if (Skill::create($data)) {
            flash('Skill created')->success();

            return redirect()->route('admin.skills.index');
        }

        flash('Error while skill creating')->error();

        return redirect()->back()->withErrors()->withInput();
    }

    /**
     * @param  Skill  $skill
     * @return View
     */
    public function edit(Skill $skill)
    : View {
        return view('admin.skills.edit', [
            'skill' => $skill,
        ]);
    }

    /**
     * @param  UpdateSkillRequest  $request
     * @param  Skill  $skill
     * @return RedirectResponse
     */
    public function update(UpdateSkillRequest $request, Skill $skill)
    : RedirectResponse {
        $data = $request->validated();

        if (request()->image) {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);

            $data['image'] = $imageName;
        }

        if ($skill->update($data)) {
            flash('Skill edited')->success();

            return redirect()->route('admin.skills.index');
        }

        flash('Error while skill editing')->error();

        return redirect()->back()->withErrors()->withInput();
    }

    /**
     * @param  Skill  $skill
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Skill $skill)
    : RedirectResponse {
        if ($skill->delete()) {
            flash('Skill deleted')->success();

            return redirect()->route('admin.skills.index');
        }

        flash('Error while skill removing')->error();

        return redirect()->route('admin.skills.index');

    }
}
