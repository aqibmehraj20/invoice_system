<?php

//PagesControllers
$router->get('', 'PagesController@home');

//ProductsController
$router->get('productlist', 'ProductsController@productlist');
$router->get('createproduct', 'ProductsController@form');
$router->post('createproduct', 'ProductsController@store');
$router->post('getproduct', 'ProductsController@getproduct');
$router->post('updateproduct', 'ProductsController@updateproduct');
$router->post('deleteproduct', 'ProductsController@deleteproduct');

//customersController
$router->get('customerlist', 'CustomersController@customerlist');
$router->get('createcustomer', 'CustomersController@customerform');
$router->post('createcustomer', 'CustomersController@createcustomer');
$router->post('getcustomer', 'CustomersController@getcustomer');
$router->post('updatecustomer', 'CustomersController@updatecustomer');
$router->post('deletecustomer', 'CustomersController@deletecustomer');


//InvoiceController
$router->get('invoicelist', 'InvoicesController@invoicelist');
$router->get('createinvoice', 'InvoicesController@invoiceform');
$router->post('createinvoice', 'InvoicesController@createinvoice');
$router->post('invoiceview', 'InvoicesController@invoiceview');

