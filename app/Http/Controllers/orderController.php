<?php

namespace App\Http\Controllers;
use DB;
use App\Order;
use App\Customer;
use App\Orderdetail;
use App\Shipping;
use App\Payment;
use PDF;

use Illuminate\Http\Request;

class orderController extends Controller
{
    public function manageorder()
    {

        $orders=DB::table('orders')
              ->join('customers','orders.customer_id', '=', 'customers.id')
              ->join('payments','orders.id', '=', 'payments.order_id')
              ->select('orders.*','customers.first_name','customers.last_name','payments.payment_type','payments.payment_status')
              ->get();

             


        return view('admin.orders.manage_order',['orders'=>$orders]);
    }


    public function orderview($id)
    {   
        $orders=Order::find($id);
        $customer=Customer::find($orders->customer_id);
        $shipping=Shipping::find($orders->shipping_id);

        $payment=Payment::where('order_id',$orders->id)->first();

        $orderDetails=Orderdetail::where('order_id',$orders->id)->get();
        
         return view('admin.orders.view-details',[
        
        'orders'=>$orders,
        'customer'=>$customer,
        'shipping'=>$shipping,
        'payment'=>$payment,
        'orderDetails'=>$orderDetails
        ] );
    }


    public function orderinvoice($id)
    {

        $orders=Order::find($id);
        $customer=Customer::find($orders->customer_id);
        $shipping=Shipping::find($orders->shipping_id);

        $payment=Payment::where('order_id',$orders->id)->first();

        $orderDetails=Orderdetail::where('order_id',$orders->id)->get();
return view('admin.orders.order-invoice',[

        'orders'=>$orders,
        'customer'=>$customer,
        'shipping'=>$shipping,
        'payment'=>$payment,
        'orderDetails'=>$orderDetails
]);
    }

 public function orderdownload($id)

 {
    $orders=Order::find($id);
    $customer=Customer::find($orders->customer_id);
    $shipping=Shipping::find($orders->shipping_id);

    $payment=Payment::where('order_id',$orders->id)->first();

    $orderDetails=Orderdetail::where('order_id',$orders->id)->get();
  
    $pdf = PDF::loadView('admin.orders.download-invoice',[

        'orders'=>$orders,
        'customer'=>$customer,
        'shipping'=>$shipping,
        'payment'=>$payment,
        'orderDetails'=>$orderDetails
]);

    return $pdf->stream('invoice.pdf');


 }
}
