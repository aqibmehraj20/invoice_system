<?php
include 'dbcon.php';


$id = $_GET['id'];

$deletequery = "delete from product where pid=$id";

$query = mysqli_query($con, $deletequery);

if ($query) {
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