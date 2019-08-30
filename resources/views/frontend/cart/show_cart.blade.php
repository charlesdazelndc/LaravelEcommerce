@extends('frontend.master')



@section('body')
<div class="container">
	<div class="row">
		
	<table class="table table-bordered">

	<tr class="bg-primary">
		<th>SL NO</th>
		<th>Name</th>
		<th>Image</th>
		<th>Price Tk.</th>
		<th>Qtantity</th>
		<th>Total Price</th>
		<th>Action</th>
	</tr>
	@php($i=1)
	@php($sum=0)
@foreach($cartItems as $cartitem)
	<tr>
		
	<td>{{ $i++ }}</td>
    <td>{{ $cartitem->name}}</td>
	
	<td><img src="{{ asset($cartitem->options->image) }}"" height="50" width="50"/></td>
	
	<td>{{  $cartitem->price}}</td> 
	<td>
		{{Form::open(['route'=>'update','method'=>'post'])}}
		<input type="number" name="qty" value="{{ $cartitem->qty }}" min="1">
		<input type="hidden" name="rowId" value="{{ $cartitem->rowId }}" min="1">
		<input type="submit" name="btn" value="Update">
		{{Form::close()}}
	</td>
	<td>{{ $total= $cartitem->price*$cartitem->qty}}</td> 
	
	<td>     
          <a href="{{ route('delete-cart-item',['rowId'=>$cartitem->rowId]) }}" class="btn btn-danger btn-xs">Delete</a></td>
	</tr>

       <?php
                   $sum=$sum+$total;
       ?>
	@endforeach

</table>
<hr/>
<table class=" table table-bordered">
	
	<tr>
		<th> Total Price (TK.)</th>
		<td>{{ $sum }}</td>
	</tr>
	<tr>
		<th>Tolat Vat (TK.)</th>
		<td>{{ $vat=0 }}</td>
	</tr>

	<tr>
		<th>Grand Total (TK.)</th>
		<td>{{ $orderTotal=$sum+$vat }}</td>
		<?php

		Session::put('orderToatal',$orderTotal);
		?>
	</tr>
</table>

	</div>


	<div class="row">
		
		
		<a href="" class="btn btn-success">Continue Shopping</a>
		
		@if(Session::get('customerId') && Session::get('shippingId') )
        		
		<a href="{{ route('customer-payment') }}" class="btn btn-success pull-right">CkeckOut</a>

		@elseif(Session::get('customerId'))
          <a href="{{ route('customer-shipping') }}" class="btn btn-success pull-right">CkeckOut</a>
		@else

		<a href="{{ route('checkout') }}" class="btn btn-success pull-right">CkeckOut</a>

		@endif
	</div>


</div>

@endsection