<?php require('partials/head.php'); ?>
<div class="container" style="margin-top:150px;">
    <h3 class="text-center">Products</h3>
    <div style="height:50px;background:#78C2AD;width:100%;">


        <img src="images/product.png" class="rounded  pt-2 pb-2" alt="Product" style="height: 50px; width: 30px;    margin-left: 10px; ">


        <a href="createproduct" class="btn btn-light float-right mt-2 mb-1 " style="color:black;text-decoration: none!important; float:right;    margin-right: 10px;">Add Product</a>

    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Code</th>
                <th scope="col">Price</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($product as $pro): ?>
                <tr>
                    <td><?php echo $pro->pname;   ?></td>
                    <td><?php echo $pro->pcode;   ?></td>
                    <td>₹ <?php echo $pro->pprice;   ?></td>
                    <td class="text-center">
                        <div class="row">
                            <div class="col-6 ">
                                <form action="/getproduct" method="post">
                                <button type="submit" value="<?php echo $pro->id; ?>" name="id" class="btn btn-success"><i class="fas fa-pen-square"></i> Edit</button>
                                </form>
                            </div>
                            <div class="col-6">
                            <form action="/deleteproduct" method="post">
                                <button type="submit" value="<?php echo $pro->id;?>" name="id" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
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