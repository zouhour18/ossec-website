<?php

$dbhostname="localhost";
$dbusername="yassine";
$dbpassword="123";
$dbname="test";

$con = mysqli_connect($dbhostname, $dbusername, $dbpassword, $dbname);

if (!$con){
	echo('Connection ERROR');
	die(print_r(mysqli_error($con)));
}


$query =  "SELECT * FROM users WHERE username='".$_POST['username']."' AND password='".$_POST['password']."';";


$result = mysqli_query($con, $query);
if ($result == false) {
	echo('ERROR during query execution: ');
	die(print_r(mysqli_error($con)));
}
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
if($row) {
	die('Logged In');
}
else {
	die('Wrong username and password');
}

