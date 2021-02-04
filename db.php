<?php
$con=mysqli_connect("localhost","root","");
$res=mysqli_select_db($con,"studentdb");
echo mysqli_error($con);
?>