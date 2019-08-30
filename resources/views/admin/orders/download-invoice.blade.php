<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>

    <style>
        
    </style>
</head>

<body>
        <table class="table table-bordered">
            
                       <tr>
                        <th>Customer Info</th>

                       </tr>
                       <tr>
                        <td>
                                {{$customer->first_name.''.$customer->last_name}}.<br>
                                {{$customer->email_address}}<br>
                                {{$customer->address}}<br>
                                {{$customer->phone_number}}<br>
                        </td>
                    </tr>
<br>
                    <tr>
                            <th>shipping info </th>
    
                           </tr>
                           <tr>
                            <td>
                                  
                                    {{$shipping->full_name}}.<br>
                                    {{$shipping->email_address}}.<br>
                                    {{$shipping->address}}<br>
                                    {{$shipping->phone_number}}
                            </td>
                        </tr>
<br>
                        <tr>
                                <th>invoice info</th>
        
                               </tr>
                               <tr>
                                <td>
                                      
                                        Invoice #: {{$orders->id}}<br>
                                        Created: {{$orders->created_at}}<br>
                                       Amount Due: {{$orders->total_order}}
                                </td>
                            </tr>
                            <br>
                            <tr>
                                    <th>  Payment Method</th>
            
                                   </tr>
                                   <tr>
                                    <td>
                                          
                                            {{$payment->payment_type}}
                                    </td>
                                </tr>

                                <br>
                                
                                <tr>
                                       
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
</body>

</html>