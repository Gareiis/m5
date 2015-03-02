<?php namespace App\Http\Controllers;

use DB;

class InvoiceController extends Controller {

	public function listAction()
	{
		$sql = 'select first_name, last_name, invoice_id, sum(item.price*invoice_item.quantity) as sum 
		from customer
		join invoice on (customer.id=invoice.customer_id)
		join invoice_item on (invoice_item.invoice_id=invoice.id) 
		join item on (item.id=invoice_item.item_id)';
		$rows = DB::select($sql);
		return view('invoiceList', ['invoices'=>$rows]);
	}

	public function detailAction()
	{
		$sql = 'select quantity, name, price, sum(item.price*invoice_item.quantity) as sum from item join invoice_item on (item.id=invoice_item.item_id)';

		$rows = DB::select($sql);
		return view('invoiceDetail', ['details' => $rows]);
	}

	public function newInvoice()
	{
		$sql = 'insert into invoice';
	}

}