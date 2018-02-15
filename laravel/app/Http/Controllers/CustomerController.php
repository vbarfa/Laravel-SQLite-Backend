<?php
namespace LaravelSQLiteBackend\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Input; 
class customerController extends Controller
{
    //
	public function index(Request $request)
    {
       $request->flash();
	   if($request['search_string'] !="") {
			$customer = DB::table('customer')->where('name', 'like', '%' . $request['search_string'] . '%')->get();
		} else {
			$customer = DB::table('customer')->get();
		}
		return view('customer.index', compact('customer'));

    }
	
	
	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		//print_r($request);
		
		
		
		 $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:customer,email,',
			'address' => 'required',
            'phone' => 'required'
        ]);
		
		
		$oldData = $request->all();
		$request->flash();
		
		
		$name =  $request->old('name');
		$email =  $request->old('email');
		$address =  $request->old('address');
		$phone =  $request->old('phone');
		//print_r($_REQUEST);
		$id = DB::table('customer')->insert(
				['name' => $name, 'email' => $email, 'address' => $address,'phone' => $phone]
		);
			
		$order_id = DB::getPdo()->lastInsertId();
			
		return redirect('/customer');
		//print_r($_REQUEST);
    }
	
	
	public function destroy($id)
	{
		 $employee = DB::table('customer')->where('id', $id)->delete();
		 return redirect('/customer');
	}
	
	public function update($id)
    {
		//$pagesDB = DB::table('pages')->get(['id','page_title', 'page_content'])->where('page_title', $name)->first(); // get page detail
		$customerDB = $pagesDB = DB::table('customer')->get()->where('id', $id)->first();		
		
		
		$customer = ['customerDB' => $customerDB];
		return view('customer.update', compact('customer'));
	}
	
	
	public function update_customer(Request $request)
    {
		
		$oldData = $request->all();
		$request->flash();		
		
		$name =  $request->old('name');
		$email =  $request->old('email');
		$address =  $request->old('address');
		$phone =  $request->old('phone');
		$id =  $request->old('id');
		
			
		DB::table('customer')->where('id', '=', $id)->update(['name' => $name, 'address' => $address, 'email' => $email, 'phone' => $phone]);
			
		return redirect('/customer');
	}


}
