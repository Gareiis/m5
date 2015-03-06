@extends('layout')

@section('header')
@endsection


@section('main_content')
	This is the item list
		<br> 
	<a href="/">Home</a>
	<table border="1">
		<tr>
			<td>
				#
			</td>
			<td>
				 Item Name
			</td>
			<td>
				Price
			</td>
		</tr>
	@foreach($items as $i)
		<tr>
			<td>{{ $i->id}}</td>
			<td>{{ $i->name}} </td>
			<td>{{ $i->price}}</td>
		</tr>
	@endforeach
	</table>
@endsection