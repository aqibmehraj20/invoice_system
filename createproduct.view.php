<?php
include 'base.php';
?>


<div class="container" style="margin-top:150px;">

    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1 class=text-center><img src="images/product.png" class="rounded  pt-2 pb-2" alt="Product" style="height: 52px; width: 41px;    margin-left: 10px; "> Add Product</h1>
            <hr>

            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Product Name</label>
                        <input type="text" class="form-control" name="pname" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPassword4">Code</label>
                        <input type="text" class="form-control" name="pcode" id="inputPassword4">
                    </div>
                </div>
                <div class="form-group  col-md-12">
                    <label for="inputAddress">Price</label>
                    <input type="number" class="form-control" name="pprice" id="inputAddress">
                </div>

                <button type="submit" class="btn btn-primary mt-4" name="submit">Add</button>
            </form>
            <hr>
        </div>
        <div class="col-2"></div>
    </div>

</div>