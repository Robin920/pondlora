<?php
//capture comment from form using POST
$value = $_POST["button"];
//get the file
$file = "log.txt";
//write thr new text
if($value == "Turn On")
{
file_put_contents($file,"1");
}
if($value == "Turn Off")
{
file_put_contents($file,"0");
}
//send user back to the main page to view content
header('Location: http://localhost/Pond%20LpWAN/index.php');
?>