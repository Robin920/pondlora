<?php
$con=mysqli_connect("localhost","root","","name");
if(!$con)
die("Server could not connected");
$s="select * from data";
$rs=mysqli_query($con,$s);
?>