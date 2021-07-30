<?php
include 'base.php';
?>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  transition: 0.3s;
  width: 50%;
  background-color: #DCE1E0;
}

.card:hover {
  background-color: #ffffff;
  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
}



</style>

<div class="container" style="margin-top:150px;">
    <div class="row">
        <div class="col-md-4 col-sm-6  mx-auto">
            <a href="productlist.php">
                <div class="card" style="width: 18rem;">
                    <img src="images/product.png" class="card-img-top rounded mx-auto d-block pt-4" alt="Product" style="height: 120px; width: 100px;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Products</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-sm-6   mx-auto">
            <a href="invoicelist.php">
                <div class="card" style="width: 18rem;">
                    <img src="images/invoice.png" class="card-img-top rounded mx-auto d-block pt-4" alt="Invoice" style="height: 120px; width: 100px;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Invoices</h5>
                    </div>
                </div>
        </div></a>
        <div class="col-md-4 col-sm-6   mx-auto">
            <a href="customerlist.php">
                <div class="card" style="width: 18rem;">
                    <img src="images/customer.png" class="card-img-top rounded mx-auto d-block pt-4" alt="Invoice" style="height: 120px; width: 100px;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Customers</h5>
                    </div>
                </div>
        </div></a>

    </div>

</div>