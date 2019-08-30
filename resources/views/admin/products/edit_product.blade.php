@extends('admin.master');



@section('body')
<div class="row">
  
<div class="container">
  <h2>Category Name</h2>
  <h2 class="text-center text-success">{{Session::get('message')}}</h2>
  
{{Form::open(['route'=>'update_product','method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data','name'=>'editproduct'])}}



<div class="form-group">
      <label for="usr" class="col-md-3">Product Details:</label>
      <div class="col-md-9">
        
        <select name="category_id" class="form-control">
          <option>select Category</option>
          @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->category_name}}</option>

          @endforeach
        </select>
      </div>
      </div>
 
      <div class="form-group">
      <label for="usr" class="col-md-3">Brand Name:</label>
     
         <div class="col-md-9">
        <select name="brand_id" class="form-control">
          <option>Select Brand</option>
          @foreach($brands as $brand)
          <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
          @endforeach
        </select>
      </div>
      </div>

  <div class="form-group">
  <label for="comment" class="col-md-3">Product Name</label>
   <div class="col-md-9">
  <input type="text" class="form-control"   name="product_name" value="{{ $products->product_name }}" />
  <input type="hidden" class="form-control"   name="product_id" value="{{ $products->id }}" />
  <span class="text-danger">{{$errors->has('product_name') ? $errors->first('product_name'):''}}</span>
</div>
</div> 

   <div class="form-group">
  <label for="comment" class="col-md-3">Product Price</label>
   <div class="col-md-9">
  <input type="float" class="form-control"   name="product_price" value="{{ $products->product_price }}" />
  <span class="text-danger">{{$errors->has('product_price') ? $errors->first('product_price'):''}}</span>
</div>
</div>


   <div class="form-group">
  <label for="comment" class="col-md-3">Product Quantity</label>
    <div class="col-md-9">
  <input type="number" class="form-control"   name="product_quantity" value="{{ $products->product_quantity}}"/>
  <span class="text-danger">{{$errors->has('product_quantity') ? $errors->first('product_quantity'):''}}</span>
</div>
</div>


<div class="form-group">
  <label for="comment" class="col-md-3">Short Description:</label>
    <div class="col-md-9">
  <textarea class="form-control" rows="5" id="comment" name="short_description">
    {{ $products->short_description }}
  </textarea>
  <span class="text-danger">{{$errors->has('short_description') ? $errors->first('short_description'):''}}</span>
</div> 
</div>

<div class="form-group">
  <label for="comment" class="col-md-3"> Product Details:</label>
    <div class="col-md-9">
  <textarea class="form-control" rows="5" id="editor" name="long_description">
    {{ $products->product_name }}
  </textarea>
  <span class="text-danger">{{$errors->has('long_description') ? $errors->first('long_description'):''}}</span>
</div> 
</div>


  <div class="form-group">
  <label for="comment" class="col-md-3">Product image</label>
   <div class="col-md-9">
  <input type="file"   name="product_image"  />
  <img src="{{ asset($products->product_image) }}" height="80" width="80">
  
</div>
</div>

<label class="radio-inline"><input type="radio" name="publishes_status" value="1" checked>Published</label>
<label class="radio-inline"><input type="radio" name="publishes_status" value="0">Unpublishe</label>
<span class="text-danger">{{$errors->has('publishes_status') ? $errors->first('publishes_status'):''}}</span>
<div class="buttton">
  <button type="submit" value="submit" name="submit" class="btn btn-success btn-block">Save Product Info</button>
</div>









{{Form::close()}}
  
</div>

</div> 
<script type="text/javascript">
  document.forms['editproduct'].elements['category_id'].value='{{$products->category_id  }}';
    document.forms['editproduct'].elements['brand_id'].value='{{$products->brand_id  }}';
</script> 
@endsection