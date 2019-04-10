<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Experience\CreateExperienceRequest;
use App\Http\Requests\Experience\UpdateExperienceRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Experience;
use Illuminate\View\View;

class ExperienceController extends Controller
{
    /**
     * @return View
     */
    public function index()
    : View
    {
        return view('admin.experiences.index', [
            'experiences' => Experience::all(),
        ]);
    }

    /**
     * @return View
     */
    public function create()
    : View
    {
        return view('admin.experiences.create');
    }

    /**
     * @param  CreateExperienceRequest  $request
     * @return RedirectResponse
     */
    public function store(CreateExperienceRequest $request)
    : RedirectResponse {
        $data = $request->validated();

        $logoName = time().'.'.request()->logo->getClientOriginalExtension();
        request()->logo->move(public_path('images'), $logoName);

        $data['logo'] = $logoName;

        if (Experience::create($data)) {
            flash('Experience created')->success();

            return redirect()->route('admin.experiences.index');
        }

        flash('Error while experience creating')->error();

        return redirect()->back()->withErrors()->withInput();
    }

    /**
     * @param  Experience  $experience
     * @return View
     */
    public function edit(Experience $experience)
    : View {
        return view('admin.experiences.edit', [
            'experience' => $experience,
        ]);
    }

    /**
     * @param  UpdateExperienceRequest  $request
     * @param  Experience  $experience
     * @return RedirectResponse
     */
    public function update(UpdateExperienceRequest $request, Experience $experience)
    : RedirectResponse {
        $data = $request->validated();

        if (request()->logo) {
            $logoName = time().'.'.request()->logo->getClientOriginalExtension();
            request()->logo->move(public_path('images'), $logoName);

            $data['logo'] = $logoName;
        }

        if ($experience->update($data)) {
            flash('Experience edited')->success();

            return redirect()->route('admin.experiences.index');
        }

        flash('Error while experience editing')->error();

        return redirect()->back()->withErrors()->withInput();
    }

    /**
     * @param  Experience  $experience
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Experience $experience)
    : RedirectResponse {
        if ($experience->delete()) {
            flash('Experience deleted')->success();

            return redirect()->route('admin.experiences.index');
        }

        flash('Error while experience removing')->error();

        return redirect()->route('admin.experiences.index');
    }
}
