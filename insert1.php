<?php

$dbhostname="localhost";
$dbusername="yassine";
$dbpassword="123";
$dbname="test";

$con = mysqli_connect($dbhostname, $dbusername, $dbpassword, $dbname);

if (!$con){
    echo('Not Connected');
    die(print_r(mysqli_error($con)));
}

if (!mysqli_select_db($con,'test')){
    echo 'Database not selected';
}

if(isset($_POST)) {
    session_start();

    $first = mysqli_real_escape_string($con, $_POST['firstname']);
    $last = mysqli_real_escape_string($con, $_POST['lastname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $facebook = mysqli_real_escape_string($con, $_POST['facebook']);
    $skills = mysqli_real_escape_string($con, $_POST['skills']);
    $expectations = mysqli_real_escape_string($con, $_POST['expectations']);
    $class = mysqli_real_escape_string($con, $_POST['class']);

    $sql = ("insert into members (firstname,lastname,email,facebook,skills,expectations,class) values ('$first','$last','$email','$facebook','$skills','$expectations','$class')");
    mysqli_query($con,$sql);
    if($sql)
       $status= "Successfully Inserted";
    else
        $status= "Please try again to register";
}