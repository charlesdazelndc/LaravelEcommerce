@extends('admin.master');

@extends('admin.master');



@section('body')
<div class="row">
	
<div class="container">
  <h2>Add Category</h2>
  <h2 class="text-center text-success"> </h2>
  <div class="panel-body">
  	
 <table class="table table-condensed">
    <thead>
      <tr class="bg-success">
        <th>Si No</th>
        <th>Category Name</th>
        <th>Comment</th>
        <th>Pulication Status</th>
        <th>Action</th>


      </tr>
      <h2 class="text-center text-success">{{Session::get('message')}}</h2>
    </thead>
    <tbody>
      @php($i=0)
      @foreach($categories as $category)
      <tr>
        <td>{{++$i}}</td>
        <td>{{$category->category_name}}</td>
        <td>{{$category->comment}}</td>
        <td>{{$category->optradio==1 ? 'published':'unpublished'}}</td>
        <td>

          @if($category->optradio==1)
        	<a href="{{route( 'unpublished_category',['id'=>$category->id] ) }}" class="btn btn-info btn-xs">
         Status
        	 </a>

           @else

        <a href="{{route( 'published_category',['id'=>$category->id] ) }}" class="btn btn-warning btn-xs">
         Status
           </a>
           @endif

         
        	<a href="{{route( 'edit_category',['id'=>$category->id] ) }}" class="btn btn-success btn-xs">
Edit
        	 </a>
           <a href="{{route( 'delete_category',['id'=>$category->id] ) }}" class="btn btn-danger btn-xs">
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