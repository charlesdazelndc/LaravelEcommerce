@extends('admin.master');





@section('body')
<br>
<div class="row">
    
    <div class="container">

        <h2 class="text-center text-success">Customer info For this customer</h2>
        <div class="panel-body">

            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Customer Name</th>
                        <td>{{$customer->first_name.''.$customer->last_name}}</td>
                    </tr>
                    <tr>
                        <th>Email Address</th>
                        <td>{{$customer->email_address}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{$customer->address}}</td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>{{$customer->phone_number}}</td>
                    </tr>


                </table>
            </div>
        </div>


    </div>

</div>
<div class="row">
   
    <div class="container">

        <h2 class="text-center text-success">shipping info for this customer </h2>
        <div class="panel-body">

            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Customer Name</th>
                        <td>{{$shipping->full_name}}</td>
                    </tr>
                    <tr>
                        <th>Email Address</th>
                        <td>{{$shipping->email_address}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{$shipping->address}}</td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>{{$shipping->phone_number}}</td>
                    </tr>


                </table>
            </div>
        </div>


    </div>

</div>
<div class="row">
 
    <div class="container">

        <h2 class="text-center text-success">Payment Info for this customer </h2>
        <div class="panel-body">

            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Payment type</th>
                        <td>{{$payment->payment_type}}</td>
                    </tr>
                    <tr>
                        <th>Payment Status</th>
                        <td>{{$payment->payment_status}}</td>
                    </tr>



                </table>
            </div>
        </div>


    </div>

</div>


<div class="row">
    <h2>Order Manage</h2>
    <div class="container">

        <h2 class="text-center text-success">Product info for this customer </h2>
        <div class="panel-body">

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-success">
                            <th>Si No</th>
                            <th>Product id</th>
                            <th>Product name</th>
                            <th>Product Price</th>

                            <th>Product Quantity</th>
                            <th>Total Price</th>

                        </tr>
                        <h2 class="text-center text-success"></h2>
                    </thead>

                    <tbody>
                        @php($i=1)
                       @foreach($orderDetails as $orderdetail)
                        <tr>
                            <td>{{$i++}}</td>
                        <td>{{$orderdetail->product_id}}</td>
                        <td>{{$orderdetail->product_name}}</td>
                        <td>{{$orderdetail->product_price}}</td>
                        <td>{{$orderdetail->product_quantity}}</td>
                        <td>{{$orderdetail->product_price*$orderdetail->product_quantity}}</td>
                        </tr>

                        @endforeach
                    </tbody>


                </table>
            </div>
        </div>


    </div>

</div>
@endsection