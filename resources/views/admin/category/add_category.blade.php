@extends('admin.master');



@section('body')
<div class="row">
	
<div class="container">
  <h2>Add Category</h2>
  <h2 class="text-center text-success">{{Session::get('message')}}</h2>
  
  <form action="{{route('new_category')}}" method="post">{{csrf_field()}}
    <div class="form-group">
      <label for="usr">Category Name:</label>
      <input type="text" class="form-control" id="usr" name="category_name">
    </div>
    <div class="form-group">
  <label for="comment">Comment:</label>
  <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
</div> 

<label class="radio-inline"><input type="radio" name="optradio" value="1" checked>Published</label>
<label class="radio-inline"><input type="radio" name="optradio" value="0">Unpublishe</label>
<div class="buttton">
	<button type="submit" value="submit" name="submit" class="btn btn-success">Submit</button>
</div>

  </form>
</div>

</div>	
@endsection