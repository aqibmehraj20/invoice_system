<?php
namespace App\Controllers;
use App\Core\App;

class CustomersController
{
    public function customerlist()
    {
        $customer = App::get('database')->selectAll('customer');

        return view('customerlist', compact('customer'));
    }

    public function customerform()
    {
        return view('createcustomer');
    }

    public function createcustomer()
    {
        App::get('database')->insert('customer',[
            'cname' => $_POST['cname'],
            'caddress' => $_POST['caddress'],
            'cnumber' => $_POST['cnumber'],
        ]);

        return redirect('customerlist');
    }

    public function getcustomer()
    {
        $id = $_POST['id'];
        $customer = App::get('database')->selectid($id,'customer');
        return view ('createcustomer', ["cid"=>$customer] );
    }

    public function updatecustomer()
    {
        App::get('database')->update('customer',[
            'cname' => $_POST['cname'],
            'caddress' => $_POST['caddress'],
            'cnumber' => $_POST['cnumber'],
        ], $_POST['cid']);
        return redirect('customerlist');
    }

    public function deletecustomer()
    {
        App::get('database')->delete('customer',$_POST['id']);
        return redirect('customerlist');
    }


}