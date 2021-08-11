<?php
namespace App\Controllers;
use App\Core\App;

class InvoicesController
{

    public function invoicelist()
    {
        $invoice = App::get('database')->selectAll('invoice');
        return view('invoicelist', compact('invoice'));
    }

    public function invoiceform()
    {
        $product = App::get('database')->selectAll('product');
        $customer = App::get('database')->selectAll('customer');
        return view('createinvoice', compact('product','customer'));
    }

    public function createinvoice()
    {
        App::get('database')->insert('invoice',[
            'customer' => $_POST['customer'],
            'product' => (implode(',',$_POST['product'])),
            'amount' => $_POST['amount'],
        ]);
        return redirect('invoicelist');
    }

    public function invoiceview()
    {
        $id = $_POST["id"];
        $invoice = App::get('database')->selectid($id,'invoice');
        return view('invoiceview', compact('invoice'));
    }
}
