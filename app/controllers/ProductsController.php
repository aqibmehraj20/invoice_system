<?php
namespace App\Controllers;
use App\Core\App;

class ProductsController
{
    public function productlist()
    {
        $product = App::get('database')->selectAll('product');

        return view('productlist', compact('product'));
    }
    
    public function form()
    {
        return view('createproduct');
    }

    public function store()
    {
        App::get('database')-> insert('product',[
            'pname' => $_POST['pname'],
            'pcode' => $_POST['pcode'],
            'pprice' => $_POST['pprice']
        ]);
        
        return redirect('productlist');
    }

    public function getproduct()
    {
        $id = $_POST["id"];
        $product = App::get('database')->selectid($id,'product');
        return view('createproduct', ["pid"=>$product,]);
    }

    public function updateproduct()
    {
        App::get('database')-> update('product',[
            'pname' => $_POST['pname'],
            'pcode' => $_POST['pcode'],
            'pprice' => $_POST['pprice']
        ], $_POST['id']);
        return redirect('productlist');
    }

    public function deleteproduct()
    {
        App::get('database')-> delete('product',$_POST['id']);
        return redirect('productlist');
    }
}