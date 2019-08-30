
@extends('frontend.master')
@section('body')

<div class="container">
<div class="row">
	<div class="col-md-12 well">
		<br>
		<h4>Dear {{ Session::get('customerName') }}.you have to give us product shipping info</h4>
	</div>
	
	<div class="col-md-8 well">
		<h4>shipping info goes here</h4>
		{{ Form::open(['route'=>'shipping-sign-up','method'=>'post']) }}
 <div class="form-group">
	 
	<input type="text" name="full_name" value="{{ $customer->first_name.''.$customer->first_name }}"  class="form-control"  placeholder="Enter Your full name" >
	
</div>
 
 <div class="form-group">
 	<input type="email" name="email_address"  value="{{ $customer->email_address }}" class="form-control" placeholder="Enter Your Email" >
	
</div>

 <div class="form-group">
 	<textarea name="address" class="form-control"   placeholder="address">{{ $customer->address }}</textarea>
 	
 </div>
 <div class="form-group">
 	<input type="text"   name="phone_number" class="form-control" value="{{ $customer->phone_number }}"  placeholder="Enter Your Phone Number">
	  
</div>

 <div class="form-group">
 	<input type="submit" name="btn" class="btn btn-info" value="Save shipping info">
 </div>


		{{ Form::close() }}

	</div>


</div>

</div>



@endsection