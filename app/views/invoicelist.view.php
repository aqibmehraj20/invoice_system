<?php require('partials/head.php');

use App\Core\App;
?>

<div class="container" style="margin-top:150px;">
    <h3 class="text-center">Invoices</h3>
    <div style="height:50px;background:#78C2AD;width:100%;">


        <img src="images/invoice.png" class="rounded  pt-2 pb-2" alt="Product" style="height: 50px; width: 30px;    margin-left: 10px; ">


        <a href="createinvoice" class="btn btn-light float-right mt-2 mb-1 " style="color:black;text-decoration: none!important; float:right;    margin-right: 10px;">Create Invoice</a>

    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Invoice No.</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Product</th>
                <th scope="col">Amount</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($invoice as $in) : ?>
                <tr>
                    <td><?php echo $in->timestamp;   ?></td>
                    <td><?php
                        $customer = App::get('database')->selectid($in->customer, 'customer');
                        $cust = implode('', array_column($customer, 'cname'));
                        echo $cust; ?>
                    </td>

                    <td><?php

                        // die(var_dump($in->product));
                        $p = explode(",", $in->product);
                        $sprater = "";
                        foreach ($p as $pro) {
                            $product = App::get('database')->selectid($pro, 'product');
                            $prod = implode('', array_column($product, 'pname'));
                            $sprater .= $prod . ", ";
                        }


                        echo trim($sprater, ", ");
                        ?>
                    </td>

                    <td><?php echo $in->amount;   ?></td>
                    <td class="text-center">
                        <div class="row">
                            <div class="col-12">
                                <form action="/invoiceview" method="post">
                                    <button type="submit" name="id" value="<?php echo $in->id; ?>" class="btn btn-success"><i class="fas fa-eye"></i> View</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require('partials/footer.php'); ?>