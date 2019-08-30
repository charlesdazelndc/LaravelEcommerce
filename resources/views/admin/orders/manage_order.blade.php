@extends('admin.master');





@section('body')
<div class="row">
	<h2>Order Manage</h2>
<div class="container">
  
  <h2 class="text-center text-success"> </h2>
  <div class="panel-body">
  	
<div class="table-responsive">
   <table class="table table-bordered">
    <thead>
      <tr class="bg-success">
        <th>Si No</th>
        <th>Customer Name</th>
        <th>Order Total</th>
        <th>Order Date</th>
        
        <th>Order Status</th>
        <th>Payment Type</th>
        <th>Payment Status</th>
     
        
        <th>Action</th>
      </tr>
      <h2 class="text-center text-success"></h2>
    </thead>

    
    <tbody>
      @php($i=1)
      @foreach ($orders as $order)
    <tr>
        <td>{{$i++}}</td>
        <td>{{$order->first_name.''.$order->last_name}}</td>
        <td>{{$order->total_order}}</td>
        <td>{{$order->created_at}}</td>
        <td>{{$order->order_status}}</td>
        <td>{{$order->payment_type}}</td>
        <td>{{$order->payment_status}}</td>
        <td>
            
            
            <a href="{{route( 'view-order-detail',['id'=>$order->id] ) }}" class="btn btn-success btn-xs" title="view Order details">
              Details
            </a>
       
                  
            <a href="{{route( 'order-invoice',['id'=>$order->id] ) }}" class="btn btn-info btn-xs" title="view Order Invoice">
               Invoice
            </a>
                 
            <a href="{{route( 'order-download',['id'=>$order->id] ) }}" class="btn btn-success btn-xs" title="Download Order Invoice">
                   Download
            </a>

            <a href="{{route( 'delete_category',['id'=>$order->id] ) }}" class="btn btn-primary btn-xs" title="Edit Order">
                    Edit
            </a>  

            <a href="{{route( 'delete_category',['id'=>$order->id] ) }}" class="btn btn-danger btn-xs" title="Delete Order">
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

</div>	
@endsection

