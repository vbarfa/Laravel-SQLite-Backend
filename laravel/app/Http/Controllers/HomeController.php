<?php

namespace LaravelSQLiteBackend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
    public function index()
    {
        //$users = DB::table('users')->get();
		$userCount    = DB::table('users')->count();
		$customerCount = DB::table('customer')->count();
		$dashbordVar = ['userCount' => $userCount,'customerCount' => $customerCount];
		
		return view('home', compact('dashbordVar'));
    }
}
