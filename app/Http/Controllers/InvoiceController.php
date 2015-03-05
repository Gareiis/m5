<?php namespace App\Http\Controllers;

use DB;

use Request;

class InvoiceController extends Controller {

	public function listAction()
	{
		$sql = 'select first_name, last_name, invoice_id, sum(item.price*invoice_item.quantity) as sum
			from customer
			join invoice on (customer.id=invoice.customer_id)
			join invoice_item on (invoice_item.invoice_id=invoice.id)
			join item on (item.id=invoice_item.item_id)
			group by first_name';
		$rows = DB::select($sql);
		return view('invoiceList', ['invoices'=>$rows]);
	}

	public function detailAction($id)
	{
		$sql = 'select quantity, name, price, item.price*invoice_item.quantity as sum from item join invoice_item on (item.id=invoice_item.item_id)
			where invoice_id = :invoice_id';

		$rows = DB::select($sql, [
			':invoice_id'=> $id
			]);

		$sql2 = 'select * from item';

		$items = DB::select($sql2);
		return view('invoiceDetail', [
			'invoiceID'=>$id,
			'items' => $items,
			'details' => $rows]);
	}

	public function newInvoice($customerId)
	{
		$sql = 'INSERT INTO invoice (`customer_id`)
		values (:customer_id)';

		$rows = DB::insert($sql, [
			':customer_id'=> $customerId
			]);
		$new_id = DB::connection()->getPdo()->lastInsertId();
		return redirect("/invoice/$new_id");
	}

	public function addItemAction($invoiceID){

		$check= 'select invoice_id, item_id from invoice_item 
		 where invoice_id = :invoiceID
		 and item_id = :itemID';

		$quantity = Request::input('quantity');
		$itemID = Request::input('itemID');
		if(count($check)>0) {

			$sql = "UPDATE invoice_item 
				set quantity = :quantity
				where invoice_id = :invoiceID
				and item_id = :itemID";

			echo $sql;

			$rows = DB::update($sql, [
				':invoiceID'=> $invoiceID,
				':itemID'=> $itemID,
				':quantity'=> $quantity
				]);
		
			return redirect("/invoice/$invoiceID");
		} else {
			$sql = 'INSERT INTO invoice_item (invoice_id, item_id, quantity)
			values (:invoiceID, :itemID, :quantity)';

			echo $sql;

			$rows = DB::insert($sql, [
				':invoiceID'=> $invoiceID,
				':itemID'=> $itemID,
				':quantity'=> $quantity
				]);
		
			// return redirect("/invoice/$invoiceID");
		}

	}
}