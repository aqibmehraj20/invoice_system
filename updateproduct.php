<?php
include 'base.php';
?>


<div class="container" style="margin-top:150px;">

    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1 class=text-center><img src="images/product.png" class="rounded  pt-2 pb-2" alt="Product" style="height: 52px; width: 41px;    margin-left: 10px; "> Update Product</h1>
            <hr>

            <form action="" method="POST">
                <div class="form-row">

<?php

include 'dbcon.php';

$id = $_GET['id'];

$selectquery = "select * from product where pid=$id";

$query = mysqli_query($con, $selectquery);

$result = mysqli_fetch_assoc($query);

if (isset($_POST['submit'])) {

    $id = $_GET['id'];
    
    $productname = $con -> real_escape_string($_POST['pname']);
    $productcode = $con -> real_escape_string($_POST['pcode']);
    $productprice = $con -> real_escape_string($_POST['pprice']);

    $updatequery = " update product set pid=$id, pname='$productname', pcode='$productcode', pprice='$productprice' where pid=$id";

    $con -> real_query ($updatequery);

    if ($con) {
?>
        <script type="text/javascript">
            window.location = "productlist.php";
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert("Not updated");
        </script>
<?php
    }
}

?>
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Product Name</label>
                        <input type="text" class="form-control" name="pname" id="inputEmail4" value="<?php echo $result['pname'];   ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPassword4">Code</label>
                        <input type="text" class="form-control" name="pcode" id="inputPassword4" value="<?php echo $result['pcode'];   ?>">
                    </div>
                </div>
                <div class="form-group  col-md-12">
                    <label for="inputAddress">Price</label>
                    <input type="number" class="form-control" name="pprice" id="inputAddress" value="<?php echo $result['pprice'];   ?>">
                </div>

                <button type="submit" class="btn btn-primary mt-4" name="submit">Update</button>
            </form>
            <hr>
        </div>
        <div class="col-2"></div>
    </div>

</div>
