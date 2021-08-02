<?php
include 'dbcon.php';


$id = $_GET['id'];

$deletequery = "delete from product where pid=$id";

$con -> real_query($deletequery);

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



?>