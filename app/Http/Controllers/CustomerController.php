<?php namespace App\Http\Controllers;

use DB;

class CustomerController extends Controller {

	public function listAction()
	{
		$sql = 'select * from customer';
		$rows = DB::select($sql);
		return view('customerList', ['customers'=>$rows]);
	}

}