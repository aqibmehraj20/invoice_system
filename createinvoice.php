<?php
include 'base.php';
include 'dbcon.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



<div class="container" style="margin-top:150px;">

    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1 class=text-center><img src="images/invoice.png" class="rounded  pt-2 pb-2" alt="Product" style="height: 52px; width: 41px;    margin-left: 10px; "> Create Invoice</h1>
            <hr>
            <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            </div>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="form-row">
                    <?php

                    $selectquery = "select * from product";
                    $query = mysqli_query($con, $selectquery);
                    $rowcount = mysqli_num_rows($query);

                    $selectquery1 = "select * from customer";
                    $query1 = mysqli_query($con, $selectquery1);
                    $rowcount1 = mysqli_num_rows($query1);


                    ?>
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Customer Name</label>
                        <select class="form-control " name="customer" id="customer">
                            <option hidden>Select</option>

                            <?php
                            for ($i = 1; $i <= $rowcount1; $i++) {
                                $row = mysqli_fetch_assoc($query1);

                            ?>
                                <option value="<?php echo $row["cid"] ?>"><?php echo $row["cname"] ?></option>

                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPassword4">Product</label><br>




                        <?php
                        for ($i = 1; $i <= $rowcount; $i++) {
                            $row = mysqli_fetch_assoc($query);

                        ?>
                            <input class="" type="checkbox" name="product[]" id="product<?php echo $row["pid"] ?>" value="<?php echo $row["pid"] ?>" onclick="total(`<?php echo $row['pprice'] ?>`,`product<?php echo $row['pid'] ?>`)"> <span><?php echo $row["pname"] ?></span><br>

                        <?php
                        }
                        ?>


                    </div>
                </div>
                <div class="form-group  col-md-12">
                    <label for="inputAddress">Amount</label>
                    <input type="number" name="amount" id="amount" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary mt-4" name="submit" >Add</button>

            </form>
            <hr>
        </div>
        <div class="col-2"></div>
    </div>

</div>

<script>
    let tot = 0;

    function total(price, id) {
        let check=document.getElementById(id).checked;
        if(check) {
            tot = +tot + +price;
        } else {
            tot = +tot - +price;
        }
        document.getElementById("amount").value = tot;
    }
</script>



<?php
include 'dbcon.php';

if (isset($_POST['submit'])) {
    $customer = $con -> real_escape_string($_POST['customer']);
    $product = $con -> real_escape_string (implode(',',$_POST['product']));
    // echo ($product);die;
    $amount =  $con -> real_escape_string ( $_POST['amount']);

    $insertquery = "INSERT INTO invoice( customer, product, amount) values('$customer', '$product', '$amount')";

    $con -> real_query($insertquery);

    if ($con) {
?>
        <script type="text/javascript">
            window.location = "invoicelist.php";
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert("Not Added");
        </script>
<?php
    }
}

?>