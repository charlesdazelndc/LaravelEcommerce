<?php

namespace App\Http\Controllers;
use App\Customer;
use Session;
use Mail;
use App\Shipping;
use App\Order;
use App\Payment;
use App\Orderdetail;
use Cart;


use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {

    	return view('frontend.cart.checkout_cart');

    }
        
    
  

   

         public function customersignup(Request $request)
    {

              $this->validate($request,[
                'email_address'=>'email|unique:customers,email_address'
              ]);
               

               $customers= new Customer;
               $customers->first_name=$request->first_name;
               $customers->last_name=$request->last_name;
               $customers->email_address=$request->email_address;
               $customers->password=bcrypt($request->password);
               $customers->address=$request->address;
               $customers->phone_number=$request->phone_number;
               $customers->save();


               $customerId=$customers->id;
               Session::put('customerId',$customerId);
               Session::put('customerName',$customers->first_name.''. $customers->last_name);
               
               
              

               $data=$customers->toArray();
               Mail::send('frontend.mails.confirmation',$data,function($message)use ($data){
                $message->to($data['email_address']);
                $message->subject('confirmation mail');
               });

              

               return redirect('/customer/shipping');
    }
    


public function customerinlog(Request $request)
{
  $customer=Customer::where('email_address',$request->email_address)->first();
  

  if(password_verify($request->password,$customer->password))
  {
    Session::put('customerId',$customer->id);
    Session::put('customerName',$customer->first_name.''. $customer->last_name);

    return redirect('/customer/shipping');
  }

  else {
    return redirect('/checkout')->with('message','Invalid Password ');
  }

}



public function customerlogout()
{
 Session::forget('customerId');
 Session::forget('customerName');

  return redirect('/');
}


public function newcustomerlogin()
{
  return view('frontend.customer.customer-login');
}



public function customersipping()
{

  $customer=Customer::find(Session::get('customerId'));
  return view('frontend.cart.shipping',['customer'=>$customer]);
}

public function shippinginfo(Request $request)
{
     $shipping=new Shipping;
     $shipping->full_name=$request->full_name;
     $shipping->email_address=$request->email_address;
     $shipping->address=$request->address;
     $shipping->phone_number=$request->phone_number;
     $shipping->save();

     Session::put('shippingId',$shipping->id);
    
   
     return redirect('/customer/payment');
    
     
}
public function customerpayment()
{
  return view('frontend.cart.customer_payment');
}
public function customerpaymentmethod(Request $request)
{


$paymentType=$request->payment_type;
if ($paymentType=='Cash') {
   $order=new Order;
   $order->customer_id=Session::get('customerId');
   $order->shipping_id=Session::get('shippingId');
   $order->total_order=Session::get('orderToatal');

   $order->save(); 


   $payment=new Payment;
   $payment->order_id=$order->id;
   $payment->payment_type=$paymentType;
   $payment->save();

   $cartProducts=Cart::content();
   foreach ($cartProducts as $cartProduct) {
     
  $orderdetail=new Orderdetail;
   $orderdetail->order_id=$order->id;
   $orderdetail->product_id=$cartProduct->id;
   
   $orderdetail->product_name=$cartProduct->name;
   $orderdetail->product_price=$cartProduct->price;
   $orderdetail->product_quantity=$cartProduct->qty;
   $orderdetail->save();

   }
   Cart::destroy();
   return redirect('/complete/order');

  
 }










else if ($paymentType=='Paypal') {
  
}

else if ($paymentType=='Bkas') {
  
}




}

public function completeorder()
{
  return view('frontend.cart.complete_order');
}

public function ajaxemail($a)
{
  $customer=Customer::where('email_address',$a)->first();
  if ($customer) {
    echo 'already exits';
  }
  else{
    echo 'available';
  }
}
public function customerreister()
{
  return view('frontend.customer.customer-register');
}

public function customerreisterform(Request $request)
{
  $this->validate($request,[
    'email_address'=>'email|unique:customers,email_address'
  ]);
   

   $customers= new Customer;
   $customers->first_name=$request->first_name;
   $customers->last_name=$request->last_name;
   $customers->email_address=$request->email_address;
   $customers->password=bcrypt($request->password);
   $customers->address=$request->address;
   $customers->phone_number=$request->phone_number;
   $customers->save();


   $customerId=$customers->id;
   Session::put('customerId',$customerId);
   Session::put('customerName',$customers->first_name.''. $customers->last_name);
   
   
  

   $data=$customers->toArray();
   Mail::send('frontend.mails.confirmation',$data,function($message)use ($data){
    $message->to($data['email_address']);
    $message->subject('confirmation mail');
   });

  

   return redirect('/');
}


  
}
