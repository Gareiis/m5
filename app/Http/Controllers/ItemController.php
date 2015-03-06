<?php namespace App\Http\Controllers;

use DB;

use Request;

class ItemController extends Controller {
	public function listAction()
	{
		$sql = 'select * from item';
		$rows = DB::select($sql);
		return view('itemList', ['items'=>$rows]);
	}






}