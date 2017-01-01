<?php
/**
 * Created by PhpStorm.
 * User: Owen
 * Date: 12/23/2016
 * Time: 18:38
 */

namespace App\Http\Controllers;

use Auth;
use App\Issue;
use App\Project;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Create a new controller instance.
     *
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
    public function index($project_id, Request $request)
    {   
        $user = $request->user();
        $project = $user->projects()->find($project_id);
        return view('IssueList', compact('project', 'user'));
    }

    public function createIssue(Request $request)
    {
        $project = Project::find($request->project_id);
        $issue = $project.issues()->create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'state' => 'ready',
        ]);
        $issue->logs()->create([
            'title' => $issue->title,
            'description' => $issue->description,
            'priority' => $issue->priority,
            'state' => $issue->state,
        ]);
        return redirect('/project/'.$project->id);
    }

    public function closeIssue(Request $request)
    {
        $project = Project::find($request->project_id);
        $issue = Issue::find($request->issue_id);
        $issue->update([
            'state' => 'close',
        ]);
        $issue->logs()->create([
            'title' => $issue->title,
            'description' => $issue->description,
            'priority' => $issue->priority,
            'state' => $issue->state,
        ]);
        return redirect('/project/'.$project->id);
    }

    public function showIssue(Request $request)
    {
        $project = Project::find($request->project_id);
        $issue = Issue::find($request->issue_id);
        $userId = $request->user()->id;
        $user = $project->users()->find($userId);
        return view('Issue',compact('user','issue'));
    }

    public function updateIssueInfo(Request $request)
    {
        $project = Project::find($request->project_id);
        $issue = Issue::find($request->issue_id);
        $issue->update([
            'description' => $request->description,
            'priority' => $request->priority,
            'state'=>$request->state,
        ]);
        $issue->logs()->create([
            'title' => $issue->title,
            'description' => $issue->description,
            'priority' => $issue->priority,
            'state' => $issue->state,
        ]);
        return redirect('/project/'.$project->id.'/issue/'.$issue->id);
    }

    //傳入project_id跟關鍵字
    //回傳搜尋過的project
    //取得project->issues
    public function search($project_id,$query){
        $project = Project::find($project_id);
        $user = Auth::user();
        if($query) {
            $project = $project->issues->where('title','like','%'.$query.'%');
            return view('IssueList', compact('project', 'user'));
        }
        return back();
    }
}