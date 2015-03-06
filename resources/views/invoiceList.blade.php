@extends('layout')

@section('header')
	This is the invoice list
@endsection


@section('main_content')
	<a href="/">Home</a>
	<table border="1">
		<tr>
			<td>
				#
			</td>
			<td>
				Customer Name
			</td>
			<td>
				Total
			</td>
			<td>
				Details
			</td>
		</tr>
	@foreach($invoices as $i)
		<tr>
			<td>{{ $i->id}}</td>
			<td>{{ $i->first_name}} 
				{{ $i->last_name}}
			</td>
			<td>
				{{ $i->sum}}
			</td>
			<td>
				<a href="/invoice/{{$i->id}}">Details</a>
			</td>
		</tr>
	@endforeach
	</table>
@endsection