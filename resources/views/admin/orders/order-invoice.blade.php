@extends('admin.master');





@section('body')
<br>
<div class="row">

    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table class="table table-bordered">
                        <tr>
                            <div class="logo-nav-left">
                                <h1>New Shop </h1>
                            </div>
                        </tr>
                        <tr class="information">
                           
                                

                                    <tr>
                                        <th>Customer Info</th>
                                        <td>
                                                {{$customer->first_name.''.$customer->last_name}}.<br>
                                                {{$customer->email_address}}<br>
                                                {{$customer->address}}<br>
                                                {{$customer->phone_number}}<br>
                                        </td>
                                    </tr>
                                   
                                
                           

                            <tr>
                                    <th>Shipping Info</th>
                                    <td>

                                        {{$shipping->full_name}}.<br>
                                        {{$shipping->email_address}}.<br>
                                        {{$shipping->address}}<br>
                                        {{$shipping->phone_number}}
                                    </td>
                                </tr>
                        </tr>

                        <tr>
                                <th>Invoice Info</th>
                            <td>
                                Invoice #: {{$orders->id}}<br>
                                Created: {{$orders->created_at}}<br>
                               Amount Due: {{$orders->total_order}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>



            <tr class="heading">
                <td>
                    Payment Method
                </td>

                <td>
                        Check #
                </td>
            </tr>

            <tr class="details">
                <td>
                        {{$payment->payment_type}}
                </td>

                <td>
                    1000
                </td>
            </tr>

            <tr  class="item table table-bordered bg-primary">
                <th>
                    Item
                </th>
                <th>
                        Quantity
                    </th>

                <th>
                    Price
                </th>
                <th>
                    Total Price
                </th>
            </tr>

            @foreach($orderDetails as $orderdetail)

            <tr class="item table table-bordered">
                <td>
                        {{$orderdetail->product_name}}
                </td>
                <td>{{$orderdetail->product_quantity}}</td>

                <td>
                        {{$orderdetail->product_price}}
                </td>
                <td>
                        {{$orderdetail->product_price*$orderdetail->product_quantity}}
                </td>
            </tr>

           

           

            
            @endforeach
           
        </table>
    </div>

</div>
@endsection