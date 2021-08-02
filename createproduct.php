
<?php

include 'dbcon.php';

if (isset($_POST['submit'])) {
    $productname = $con -> real_escape_string($_POST['pname']);
    $productcode = $con -> real_escape_string($_POST['pcode']);
    $productprice = $con -> real_escape_string($_POST['pprice']);

    $insertquery = "INSERT INTO product( pname, pcode, pprice) values('$productname', '$productcode', '$productprice')";

    $con -> real_query($insertquery);

    if ($con) {
?>
        <script type="text/javascript">
            window.location = "productlist.php";
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
require 'createproduct.view.php';
?>
