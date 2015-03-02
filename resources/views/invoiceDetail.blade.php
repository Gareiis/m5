@extends('layout')

@section('header')
	Welcome to the Invoice Details page!
@endsection


@section('main_content')
	<a href="/">Home</a>
	<a href="/invoice">Back</a>
	<table border="1">
		<tr>
			<td>Qty</td>
			<td>Item</td>
			<td>Cost</td>
			<td>Sub-Total</td>
			<td>Remove</td>
		</tr>
		
	@foreach($details as $d)
		<tr>
			<td>{{$d->quantity}}</td>
			<td>{{$d->name}}</td>
			<td>{{$d->price}}</td>
			<td>{{$d->sum}}</td>
			<td>
				<a href="">Remove</a>
			</td>
		</tr>
	@endforeach
	</table>
@endsection