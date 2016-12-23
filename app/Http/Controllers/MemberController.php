<?php
/**
 * Created by PhpStorm.
 * User: Owen
 * Date: 12/22/2016
 * Time: 12:16
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class MemberController extends Controller
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
    public function index($project_id, Request $request)
    {
        $project = Project::find($project_id);
        $user = $request->user();
        return view('Project_Member', compact('project', 'user'));
    }

    public function updateProjectMember($project_id, $member_id, Request $request)
    {
        $project = Project::find($project_id);
        $project->find($project_id)->users()->updateExistingPivot($member_id,['user_auth'=>$request['user_auth']]);
        return redirect('/project/'.$project_id.'/project_member');
    }
}