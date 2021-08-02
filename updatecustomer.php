<?php
include 'base.php';
?>


<div class="container" style="margin-top:150px;">

    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1 class=text-center><img src="images/customer.png" class="rounded  pt-2 pb-2" alt="Product" style="height: 52px; width: 41px;    margin-left: 10px; "> Update Customer</h1>
            <hr>

            <form action="" method="POST">
                <div class="form-row">

<?php

include 'dbcon.php';


$id = $_GET['id'];

$selectquery = "select * from customer where cid=$id";

$query = mysqli_query($con, $selectquery);

$result = mysqli_fetch_assoc($query);

if (isset($_POST['submit'])) {

    $id = $_GET['id'];
    $customername = $con -> real_escape_string($_POST['cname']);
    $customeraddress =$con -> real_escape_string($_POST['caddress']);
    $customernumber = $con -> real_escape_string($_POST['cnumber']);

    $updatequery = " update customer set cid=$id, cname='$customername', caddress='$customeraddress', cnumber='$customernumber' where cid=$id";

    $con -> real_query($updatequery);

    if ($con) {
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


                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Customer Name</label>
                        <input type="text" class="form-control" name="cname" id="inputEmail4" value="<?php echo $result['cname'];   ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPassword4">Address</label>
                        <input type="text" class="form-control" name="caddress" id="inputPassword4" value="<?php echo $result['caddress'];   ?>">
                    </div>
                </div>
                <div class="form-group  col-md-12">
                    <label for="inputAddress">Contact Number</label>
                    <input type="number" class="form-control" name="cnumber" id="inputAddress" value="<?php echo $result['cnumber'];   ?>">
                </div>

                <button type="submit" class="btn btn-primary mt-4" name="submit">Update</button>
            </form>
            <hr>
        </div>
        <div class="col-2"></div>
    </div>

</div>
