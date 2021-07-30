<?php
include 'dbcon.php';


$id = $_GET['id'];

$deletequery = "delete from customer where cid=$id";

$query = mysqli_query($con, $deletequery);

if ($query) {
?>
    <script type="text/javascript">
        window.location = "customerlist.php";
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