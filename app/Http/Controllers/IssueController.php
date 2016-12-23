<?php
/**
 * Created by PhpStorm.
 * User: Owen
 * Date: 12/23/2016
 * Time: 18:38
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class IssueController
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
        return view('IssueList', compact('project', 'user'));
    }
}