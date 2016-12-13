<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user()) {
            $user = $request->user();
            return view('ProjectList',compact('user'));
        }
        /*
        return view('ProjectList')
            ->with('user_name','abc')
            ->with('projects_name',array('Project A','Project B','Project C'))
            ->with('project_issue_count',array(2,4,6));
        */
    }

    public function createProject(Request $request)
    {
        $projectId = Project::create([
            'subject' => $request->subject,
            'description' => $request->description,
            'visible' => $request->visible,
            'state' => $request->state,
        ])->id;

        $user = $request->user();
        $user->projects()->attach($projectId, ['user_auth' => 'manager']);

        return redirect('/projectlist');
    }

}
