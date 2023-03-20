<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Constants;

class ProjectController extends Controller
{
    public function index()
    {
        return view('admin.project.index');
    }

    public function create()
    {
        $status = Constants::PROJECT_STATUS;
        $types = Constants::PROJECT_TYPE;
        return view('admin.project.create', compact('status', 'types'));
    }

    public function save(Request $request)
    {
        try {
            return redirect(route('admin.project.index'))->with('message', 'Project Added Successfully!');
        } catch(\Exception $e) {
            return redirect(route('admin.project.create'))->with('error', "Oops an error occurred!</br>".$e->getMessage());
        }
    }

    public function edit(Project $project)
    {
        $status = Constants::PROJECT_STATUS;
        $types = Constants::PROJECT_TYPE;
        return view('admin.project.edit', compact('project', 'status', 'types'));
    }

    public function update(Request $request, $project)
    {
        try {
            return redirect(route('admin.project.index'))->with('message', 'Project Updated Successfully!');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', "Oops an error occurred!</br>".$e->getMessage());
        }
    }
}
