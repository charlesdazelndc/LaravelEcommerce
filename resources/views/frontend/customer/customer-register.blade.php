
@extends('frontend.master')
@section('body')
<div class="container">
<div class="row">
	<div class="col-md-12 well">
		
	</div>
	
	
	
	<div class="col-md-5 well">
    <h1>Registered</h1>
		{{ Form::open(['route'=>'customer-register-form','method'=>'post']) }}
 <div class="form-group">
 	<input type="text" name="first_name" class="form-control" placeholder="Enter Your First Name">
 </div>
 <div class="form-group">
 	<input type="text" name="last_name" class="form-control" placeholder="Enter Your Last Name">
 </div>
 <div class="form-group">
    <input type="email" name="email_address" class="form-control" id="email_address" placeholder="Enter Your Email">
    <span class="text-success" id="res"></span>
</div>
 <div class="form-group">
 	<input type="password" name="password" class="form-control" placeholder="Passsword">
 </div>
 <div class="form-group">
 	<textarea name="address" class="form-control" placeholder="address"></textarea>
 	
 </div>
 <div class="form-group">
 	<input type="text" name="phone_number" class="form-control" placeholder="Enter Your Phone Number">
 </div>

 <div class="form-group">
 	<input type="submit" name="btn" id="regbtn" class="btn btn-info" value="Register">
 </div>


		{{ Form::close() }}

	</div>

	
</div>

</div>

<script>
    var Email=document.getElementById("email_address");
    Email.onblur=function(){
        var emailAddress=document.getElementById("email_address").value;
        var xmlHttp=new XMLHttpRequest();
        var serverPage='http://localhost/laravel55/public/ajax-email/'+emailAddress;
        xmlHttp.open("GET",serverPage);
        xmlHttp.onreadystatechange=function(){
            if(xmlHttp.readyState==4 && xmlHttp.status==200)
            {
                document.getElementById('res').innerHTML=xmlHttp.responseText;
                if(xmlHttp.responseText== 'already exits')
                {
               document.getElementById('regbtn').disabled=true; 
                }
                else
                {
                    document.getElementById('regbtn').disabled=false; 
                }
            }
    
        }
        xmlHttp.send(null);
    }
    </script>

@endsection