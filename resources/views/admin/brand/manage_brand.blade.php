@extends('admin.master');

@extends('admin.master');



@section('body')
<div class="row">
	
<div class="container">
  <h2>Add Brand</h2>
  <h2 class="text-center text-success"> </h2>
  <div class="panel-body">
  	
 <table class="table table-condensed">
    <thead>
      <tr class="bg-success">
        <th>Si No</th>
        <th>Category Nmae</th>
        <th>Comment</th>
        <th>Pulication Status</th>
        <th>Action</th>


      </tr>
      <h2 class="text-center text-success">{{Session::get('message')}}</h2>
    </thead>
    <tbody>
      @php($i=0)
      @foreach($brands as $brand)
      <tr>
        <td>{{++$i}}</td>
        <td>{{$brand->brand_name}}</td>
        <td>{{$brand->brand_description}}</td>
        <td>{{$brand->optradio==1 ? 'published':'unpublished'}}</td>
        <td>

          @if($brand->optradio==1)
        	<a href="" class="btn btn-info btn-xs">
         Status
        	 </a>

           @else

        <a href="" class="btn btn-warning btn-xs">
         Status
           </a>
           @endif

         
        	<a href="" class="btn btn-success btn-xs">
Edit
        	 </a>
           <a href="" class="btn btn-danger btn-xs">
Delete
           </a>
        </td>
      </tr>
     @endforeach 
    </tbody>
  </table>
  </div>
  

</div>

</div>	
@endsection

@section('body')
<h1>manage category</h1>
@endsection