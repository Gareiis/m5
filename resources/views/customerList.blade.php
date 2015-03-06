@extends('layout')

@section('header')
	This is the customer list
@endsection


@section('main_content')
	<a href="/">Home</a>
	<table border="1">
		<tr>
			<td>First Name</td>
			<td>Last Name</td>
			<td>Email</td>
			<td>Gender</td>
		</tr>
	@foreach($customers as $c)
		<tr>
			<td>
				{{ $c->first_name }}
			</td>
			<td>
				{{ $c->last_name}}
			</td>
			<td>
				{{ $c->email}}
			</td>
			<td>
				{{ $c->gender}}
			</td>
			<td>
				<a href="/customer/newInvoice/{{$c->id}}">New Invoice</a>
			</td>
		</tr>

	@endforeach
	</table>
@endsection