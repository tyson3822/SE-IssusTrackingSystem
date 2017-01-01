<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Project;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

        return redirect('/project');
    }

    public function closeProject(Request $request)
    {
        Project::find($request->project_id)->update(['state' => 'close']);
        return redirect('/project');
    }

    //傳入關鍵字
    //回傳經過搜尋的user
    //可取得user->project
    public function search($query){
        $user = new User();
        if($query) {
            $user = $user->projects->where('subject','like','%'.$query.'%');
        }
        return back();
    }
}
