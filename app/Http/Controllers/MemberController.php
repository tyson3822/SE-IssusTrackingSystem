<?php
/**
 * Created by PhpStorm.
 * User: Owen
 * Date: 12/22/2016
 * Time: 12:16
 */

namespace App\Http\Controllers;


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
}