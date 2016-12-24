<?php
/**
 * Created by PhpStorm.
 * User: Owen
 * Date: 12/23/2016
 * Time: 18:38
 */

namespace App\Http\Controllers;
use App\Project;
use Illuminate\Http\Request;

class IssueController extends Controller
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
        echo $project_id;
        $user = $request->user();
        $project = $user->projects()->find($project_id);
        return view('IssueList', compact('project', 'user'));
    }
}