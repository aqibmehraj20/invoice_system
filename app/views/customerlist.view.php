<?php require('partials/head.php'); ?>

<div class="container" style="margin-top:150px;">
    <h3 class="text-center">Customers</h3>
    <div style="height:50px;background:#78C2AD;width:100%;">


        <img src="images/customer.png" class="rounded  pt-2 pb-2" alt="Product" style="height: 50px; width: 30px;    margin-left: 10px; ">


        <a href="createcustomer" class="btn btn-light float-right mt-2 mb-1 " style="color:black;text-decoration: none!important; float:right;    margin-right: 10px;">Create Customer</a>

    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Customer Name</th>
                <th scope="col">Address</th>
                <th scope="col">Contact Number</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customer as $cust): ?>

                <tr>
                    <td><?php echo $cust->cname;   ?></td>
                    <td><?php echo $cust->caddress;   ?></td>
                    <td><?php echo $cust->cnumber;   ?></td>
                    <td class="text-center">
                        <div class="row">
                            <div class="col-6 ">
                                <form action="/getcustomer" method="post">
                                <button type="submit" name="id" value="<?php echo $cust->id;   ?>" class="btn btn-success"><i class="fas fa-pen-square"></i> Edit</button>
                                </form>
                            </div>
                            <div class="col-6">
                                <form action="/deletecustomer" method="post">
                                <button name="id" value="<?php echo $cust->id;?>" class="btn btn-danger"><i class="fas fa-pentrash"></i> Delete</button>
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