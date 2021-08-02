<?php

$con = mysqli_init();
if (!$con) {
  die("mysqli_init failed");
}

$server = "localhost";
$user = "root";
$password = "";
$db = "invoice";

$con -> real_connect ($server,$user,$password,$db);