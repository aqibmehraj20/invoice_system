<?php
include 'base.php';
?>


<div class="container" style="margin-top:150px;">

    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1 class=text-center><img src="images/customer.png" class="rounded  pt-2 pb-2" alt="Product" style="height: 52px; width: 41px;    margin-left: 10px; "> Create Customer</h1>
            <hr>

            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Customer Name</label>
                        <input type="text" class="form-control" name="cname" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPassword4">Address</label>
                        <input type="text" class="form-control" name="caddress" id="inputPassword4">
                    </div>
                </div>
                <div class="form-group  col-md-12">
                    <label for="inputAddress">Contact No.</label>
                    <input type="number" class="form-control" name="cnumber" id="inputAddress">
                </div>

                <button type="submit" class="btn btn-primary mt-4" name="submit">Add</button>
            </form>
            <hr>
        </div>
        <div class="col-2"></div>
    </div>

</div>
<?php

include 'dbcon.php';

if (isset($_POST['submit'])) {
    $customername = mysqli_real_escape_string( $con, $_POST['cname']);
    $customeraddress = mysqli_real_escape_string( $con, $_POST['caddress']);
    $customernumber = mysqli_real_escape_string( $con, $_POST['cnumber']);

    $insertquery = "INSERT INTO customer( cname, caddress, cnumber) values('$customername', '$customeraddress', '$customernumber')";

    $query = mysqli_query($con, $insertquery);

    if ($query) {
?>
        <script type="text/javascript">
            window.location = "customerlist.php";
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert("Not Created");
        </script>
<?php
    }
}

?>