<?php
/**
 * Created by PhpStorm.
 * User: Owen
 * Date: 12/23/2016
 * Time: 18:38
 */

namespace App\Http\Controllers;

use Mail;
use App\User;
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
        $issues = $project->issues;

        return view('IssueList', compact('project', 'user','issues'));
    }

    public function createIssue(Request $request)
    {
        $project = Project::find($request->project_id);

        $issue = $project->issues()->create([
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

        $manager_id = User::join('project_user_relations','users.id','=','project_user_relations.user_id')
                    ->select('project_user_relations.user_id')
                    ->where('user_auth','manager')
                    ->where('project_id',$request->project_id)
                    ->get()
                    ->pluck('user_id')
                    ->all();

        $manager = User::where('id',$manager_id)->first();
        
        Mail::raw('Dear '.$manager->name, function ($m) use ($issue,$project,$manager) {

            $m->to($manager->email)->subject('你的專案 '.$project->subject.'的issue '.$issue->title.' 已關閉');
        });

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

        $user = $project->users()->where('name', $request->owner)->first();
        $issue = Issue::find($request->issue_id);

        $issue->update([
            'description' => $request->description,
            'priority' => $request->priority,
            'state'=>$request->state,
            'user_id' => $user ? $user->id : null,
        ]);

        $issue->logs()->create([
            'title' => $issue->title,
            'description' => $issue->description,
            'priority' => $issue->priority,
            'state' => $issue->state,
            'user_id' => $issue->user_id,
        ]);


        $manager = User::where('id',$manager_id)->first();


        if($request->state == 'close'){

            $manager_id = User::join('project_user_relations','users.id','=','project_user_relations.user_id')
                    ->select('project_user_relations.user_id')
                    ->where('user_auth','manager')
                    ->where('project_id',$request->project_id)
                    ->get()
                    ->pluck('user_id')
                    ->all();

            $manager = User::where('id',$manager_id)->first();

            Mail::raw('Dear '.$user->name, function ($m) use ($issue,$project,$manager) {

                $m->to($user->email)->subject('你的專案 '.$project->subject.'的issue '.$issue->title.' 已關閉');
            });
        }

        if($user){
            Mail::raw('Dear '.$user->name, function ($m) use ($issue,$project,$user) {

                $m->to($user->email)->subject('你的專案 '.$project->subject.'的issue '.$issue->title.' 已關閉');
            });
        }

        return redirect('/project/'.$project->id.'/issue/'.$issue->id);
    }

    //傳入project_id跟關鍵字
    //回傳搜尋過的project
    //取得project->issues
    public function search($project_id,Request $request){
        $query = $request->issue_name;
        $project = Project::find($project_id);
        $user = Auth::user();

        if($query) {
            $filter_issues = \DB::table('issues')->where('title','like','%'.$query.'%')->get()->pluck('id')->all();
            $issues = $project->issues->whereIn('id',$filter_issues);

            return view('IssueList', compact('project', 'user','issues'));
        }
        return back();
    }
}