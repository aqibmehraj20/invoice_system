<?php

namespace App\Controllers;
use App\Core\App;
class PagesController
{


    public function home()
    {
        return view('index');
    }

    public function productlist()
    {
        return view('productlist'); 
    }

    public function createproduct()
    {   
        return view('createproduct');
    }

    public function customerlist()
    {
        return view ('customerlist');
    }

    public function createcustomer()
    {
        return view ('createcustomer');
    }
    
    public function invoicelist()
    {
        return view ('invoicelist');
    }

    public function createinvoice()
    {
        return view('createinvoice');
    }

    public function viewinvoice()
    {
        return view('viewinvoice');
    }
}
