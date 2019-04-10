<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Project\CreateProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * @return View
     */
    public function index()
    : View
    {
        return view('admin.projects.index', [
            'projects' => Project::all(),
        ]);
    }

    /**
     * @return View
     */
    public function create()
    : View
    {
        return view('admin.projects.create');
    }

    /**
     * @param  CreateProjectRequest  $request
     * @return RedirectResponse
     */
    public function store(CreateProjectRequest $request)
    : RedirectResponse {
        $data = $request->validated();

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

        $data['image'] = $imageName;

        if (Project::create($data)) {
            flash('Project created')->success();

            return redirect()->route('admin.projects.index');
        }

        flash('Error while project creating')->error();

        return redirect()->back()->withErrors()->withInput();
    }

    /**
     * @param  Project  $project
     * @return View
     */
    public function edit(Project $project)
    : View {
        return view('admin.projects.edit', [
            'project' => $project,
        ]);
    }

    /**
     * @param  UpdateProjectRequest  $request
     * @param  Project  $project
     * @return RedirectResponse
     */
    public function update(UpdateProjectRequest $request, Project $project)
    : RedirectResponse {
        $data = $request->validated();

        if (request()->image) {
            $imageName = time().'.'.request()->logo->getClientOriginalExtension();
            request()->logo->move(public_path('images'), $imageName);

            $data['image'] = $imageName;
        }

        if ($project->update($data)) {
            flash('Project edited')->success();

            return redirect()->route('admin.projects.index');
        }

        flash('Error while project editing')->error();

        return redirect()->back()->withErrors()->withInput();
    }

    /**
     * @param  Project  $project
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Project $project)
    : RedirectResponse {
        if ($project->delete()) {
            flash('Project deleted')->success();

            return redirect()->route('admin.projects.index');
        }

        flash('Error while project removing')->error();

        return redirect()->route('admin.projects.index');
    }
}
