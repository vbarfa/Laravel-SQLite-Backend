<?php

namespace LaravelSQLiteBackend\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Input; 


class userController extends Controller
{
   
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
	    //$this->middleware('auth');
    }
   
   
   
   
   
   
    //

	public function index(Request $request)
    {
		
		$request->flash();
		if($request['search_string'] !="") {
			$users = DB::table('users')->where('name', 'like', '%' . $request['search_string'] . '%')->get();
		} else {
			$users = DB::table('users')->get();
		}
		
		
		return view('users.index', compact('users'));
	}
	
	
	/**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('users.create');
    }
	
	  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		 $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,',
			'password' => 'required',
        ]);
		
		
		$oldData = $request->all();
		$request->flash();
		
		
		$name =  $request->old('name');
		$email =  $request->old('email');
		$password =  $request->old('password');
		
		//print_r($_REQUEST);
		$id = DB::table('users')->insert(
				['name' => $name, 'email' => $email, 'password' => $password]
		);
			
		return redirect('/user');
		//print_r($_REQUEST);
    }
	
	
	public function destroy($id)
	{
		 $employee = DB::table('users')->where('id', $id)->delete();
		 return redirect('/user');
	}
	
	public function update($id)
    {
		//$pagesDB = DB::table('pages')->get(['id','page_title', 'page_content'])->where('page_title', $name)->first(); // get page detail
		$userDB = $pagesDB = DB::table('users')->get()->where('id', $id)->first();		
		
		
		$user = ['userDB' => $userDB];
		return view('users.update', compact('user'));
	}
	
	
	public function update_user(Request $request)
    {
		
		$oldData = $request->all();
		$request->flash();		
		
		$name =  $request->old('name');
		$email =  $request->old('email');
		$password =  $request->old('password');
		$id =  $request->old('id');
		
			
		DB::table('users')->where('email', '=', $email)->update(['name' => $name, 'password' => $password]);
			
		return redirect('/user');
	}

	
}
