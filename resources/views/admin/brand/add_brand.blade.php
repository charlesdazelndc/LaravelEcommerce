@extends('admin.master');



@section('body')
<div class="row">
	
<div class="container">
  <h2>Add  Brand</h2>
  <h2 class="text-center text-success">{{Session::get('message')}}</h2>
  
{{Form::open(['route'=>'new_brand','method'=>'post','class'=>'form-horizontal'])}}

<div class="form-group">

  {{Form::label('brand_name', 'Brand Name', ['class' => 'col-md-3'])}}

  <div class="col-md-9">
    
    {{Form::text('brand_name','',['class'=>'form-control'])}}
    <span class="text-danger">{{$errors->has('brand_name') ? $errors->first('brand_name'):''}}</span>
  </div>
</div>

<div class="form-group">
{{Form::label('brand_description', 'Brand description', ['class' => 'col-md-3'])}}

  <div class="col-md-9">
    
    {{Form::textarea('brand_description','',['class'=>'form-control'])}}
    <span class="text-danger">{{$errors->has('brand_description') ? $errors->first('brand_description'):''}}</span>
  </div>
</div>



<div class="form-group">
{{Form::label('published_status', 'published Status', ['class' => 'col-md-3'])}}

  <div class="col-md-9">
    
    {{Form::radio('optradio', 1,true)}} 
    {{Form::label('published', 'published')}}
 
   {{Form::radio('optradio', 0,false)}}
   {{Form::label('unpublished', 'unpublished')}}
   <span class="text-danger">{{$errors->has('optradio') ? $errors->first('optradio'):''}}</span>
  </div>
</div>
<div class="form-group">
  
  <div class="col-md-9 col-md-offset-3">
  
  {{Form::submit('Save Brand Info',['class'=>'btn btn-success'])}}
</div>
</div>


{{Form::close()}}
  
</div>

</div>	
@endsection