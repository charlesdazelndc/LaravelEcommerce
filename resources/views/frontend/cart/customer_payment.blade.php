
@extends('frontend.master')
@section('body')

<div class="container">
<div class="row">
	<div class="col-md-12 well">
		<br>
		<h4>Dear {{ Session::get('customerName') }}.you have to give us product payment Info</h4>
	</div>
	
	<div class="col-md-8 col-md-offset-2 well">
		<h4>Payment info goes here</h4>
{{ Form::open(['route'=>'payment_method','method'=>'post']) }}
<table class="table table-bordered">
<tr>
	<th>Cash on delivery</th>
	<td>
		<input type="radio" name="payment_type" value="Cash">cash On delivery
	</td>
</tr>

<tr>
	<th>Paypal</th>
	<td>
		<input type="radio" name="payment_type" value="Paypal">Paypal
	</td>
</tr>
<tr>
	<th>Bkas</th>
	<td>
		<input type="radio" name="payment_type" value="Bkas">Bkas
	</td>
</tr>
<tr>
	<th></th>
	<td>
		<input type="submit" name="btn" value="Confirm Order" class="bg-primary">
	</td>
</tr>

</table>
{{ Form::open() }}

	</div>


</div>

</div>



@endsection