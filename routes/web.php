<?php

Route::get('/',[
'uses'=>'NewshopController@index',
'as'=>'/'
] );

Route::get('/demo',[
'uses'=>'NewshopController@demo',
'as'=>'demo'
] );

Route::get('/home-page',[
    'uses'=>'NewshopController@homepage',
    'as'=>'home-page'
    ] );


Route::get('/category-product/{id}',[
'uses'=>'NewshopController@productCategory',
'as'=>'category-product'
] );

Route::get('/product-details/{id}/{name}',[
'uses'=>'NewshopController@productdetails',
'as'=>'product-details'
] );

Route::get('/category-short',[
'uses'=>'NewshopController@shortcode',
'as'=>'category-short'
] );


Route::get('/mail',[
'uses'=>'NewshopController@mail',
'as'=>'mail'
] );




Route::get('/category/addcategory',[
'uses'=>'AdminController@addcategory',
'as'=>'admin-category'
] );

Route::get('/category/managecategory',[
'uses'=>'AdminController@managecategory',
'as'=>'manage-category'
] );



Route::post('/category/save',[
'uses'=>'AdminController@savecategory',
'as'=>'new_category'
] );

Route::get('/category/unpublished/{id}',[
'uses'=>'AdminController@unpublished_category',
'as'=>'unpublished_category'
] );

Route::get('/category/published/{id}',[
'uses'=>'AdminController@published_category',
'as'=>'published_category'
] );

Route::get('/category/edit/{id}',[
'uses'=>'AdminController@edit_category',
'as'=>'edit_category'
] ); 

Route::post('/category/update',[
'uses'=>'AdminController@update_category',
'as'=>'update_category'
] );

Route::get('/category/delete/{id}',[
'uses'=>'AdminController@delete_category',
'as'=>'delete_category'
] );


Route::get('/brand/add',[
'uses'=>'BrandController@addbrand',
'as'=>'add_brand'
] );

Route::post('/brand/save',[
'uses'=>'BrandController@savedbrand',
'as'=>'new_brand'
] );
Route::get('/brand/manage',[
'uses'=>'BrandController@managebrand',
'as'=>'manage_brand'
] );

Route::get('/product/add',[
'uses'=>'ProductsController@index',
'as'=>'add_product'
] );

Route::post('/product/save',[
'uses'=>'ProductsController@saveproduct',
'as'=>'save_product'
] );
Route::get('/product/manage',[
'uses'=>'ProductsController@manageproduct',
'as'=>'manage_product'
] );

Route::get('/product/edit/{id}',[
'uses'=>'ProductsController@productedit',
'as'=>'product-edit'
] );

Route::post('/product/update',[
'uses'=>'ProductsController@producteupdate',
'as'=>'update_product'
] );

Route::post('/cart/add',[
'uses'=>'CartController@cartdaad',
'as'=>'add-to-cart'
] );

Route::get('/cart/show',[
'uses'=>'CartController@showcart',
'as'=>'show-to-cart'
] );
Route::get('/cart/deletecart/{id}',[
'uses'=>'CartController@deletecart',
'as'=>'delete-cart-item'
] );

Route::post('/cart/update',[
'uses'=>'CartController@cartqtyupadte',
'as'=>'update'
] );

Route::get('/checkout',[
'uses'=>'CheckoutController@index',
'as'=>'checkout'
] );

Route::post('/customer/signup',[
'uses'=>'CheckoutController@customersignup',
'as'=>'customer-sign-up'
] );

Route::post('/customer/logout',[
    'uses'=>'CheckoutController@customerlogout',
    'as'=>'new-customer-logout'
    ] );

Route::post('/customer/login',[
    'uses'=>'CheckoutController@customerinlog',
    'as'=>'customer-login'
] );
Route::get('/customer/newlogin',[
    'uses'=>'CheckoutController@newcustomerlogin',
    'as'=>'new-custoomer-login'
] );

Route::get('/customer/shipping',[
'uses'=>'CheckoutController@customersipping',
'as'=>'customer-shipping'
] );

Route::post('/customer/shippingsignup',[
'uses'=>'CheckoutController@shippinginfo',
'as'=>'shipping-sign-up'
] );

Route::get('/customer/payment/',[
'uses'=>'CheckoutController@customerpayment',
'as'=>'customer-payment'
] );
Route::post('/customer/paymentmethod/',[
'uses'=>'CheckoutController@customerpaymentmethod',
'as'=>'payment_method'
] );

Route::get('/complete/order',[
'uses'=>'CheckoutController@completeorder',
'as'=>'order-complete'
] );
Route::get('/ajax-email/{id}',[
    'uses'=>'CheckoutController@ajaxemail',
    'as'=>'ajax-email'
] );

Route::get('/customer-register',[
    'uses'=>'CheckoutController@customerreister',
    'as'=>'Customer-register'
] );
Route::post('/customer-register-form',[
    'uses'=>'CheckoutController@customerreisterform',
    'as'=>'customer-register-form'
] );

   

Route::group(['middleware'=>'Login'],function(){
    Route::get('/order/manage',[
        'uses'=>'orderController@manageorder',
        'as'=>'manage_order',
       
        ] );
    
    Route::get('/order/view/{id}',[
            'uses'=>'orderController@orderview',
            'as'=>'view-order-detail'
            ] );
    Route::get('/order/invoice/{id}',[
                'uses'=>'orderController@orderinvoice',
                'as'=>'order-invoice'
                ] );
     Route::get('/order/download/{id}',[
                    'uses'=>'orderController@orderdownload',
                    'as'=>'order-download'
             ] );
    Route::get('/admin',[
                'uses'=>'AdminController@index',
                'as'=>'admin'
                ] );
    Route::get('/admin/home',[
                'uses'=>'AdminController@index',
                'as'=>'admin-home'
                ] );
});         



Auth::routes();
 
Route::get('/home', 'HomeController@index')->name('home');
