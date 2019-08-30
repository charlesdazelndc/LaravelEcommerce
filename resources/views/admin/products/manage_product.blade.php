@extends('admin.master');





@section('body')
<div class="row">
	<h2>Add Product</h2>
<div class="container">
  
  <h2 class="text-center text-success"> </h2>
  <div class="panel-body">
  	
<div class="table-responsive">
   <table class="table table-bordered">
    <thead>
      <tr class="bg-success">
        <th>Si No</th>
        <th>Category Name</th>
        <th>Brand Name</th>
        <th>Product Name</th>
        
        <th>Product Image</th>
        <th>Product Price</th>
        <th>Product Qnty</th>
        <th>Short Description</th>
        <th>Long Description</th>
        
        <th>Action</th>
      </tr>
      <h2 class="text-center text-success">{{Session::get('message')}}</h2>
    </thead>

    @php($i=1)
    @foreach($products as $product)
    <tbody>
      
      <tr>
        <td>{{ $i++ }}</td>
        <td>{{ $product->category_name }}</td>
        <td>{{ $product->brand_name }}</td>
        <td>{{ $product->product_name }}</td>
         <td>
<img src="{{ asset($product->product_image) }}" height="100px" width="100px">
        </td>
        <td>{{ $product->product_price }}</td>
        <td>{{ $product->product_quantity }}</td>
        <td>{{ $product->short_description }}</td>
        <td>{{ $product->long_description }}</td>
       
        <td>

          <a href="" class="btn btn-info btn-xs">
         Status
           </a>

          

        <a href="" class="btn btn-warning btn-xs">
         Status
           </a>
          

         
          <a href="{{ route('product-edit',['id'=>$product->id]) }}" class="btn btn-success btn-xs">
Edit
           </a>
           <a href="" class="btn btn-danger btn-xs">
Delete
           </a>
         </td>
        
@endforeach
      </tr>

   
    </tbody>
  </table>
</div>
  </div>
  

</div>

</div>	
@endsection

