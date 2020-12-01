<?php

$link = mysqli_connect("localhost", "root", "", "gym");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$number = mysqli_real_escape_string($link, $_REQUEST['number']);
$age = mysqli_real_escape_string($link, $_REQUEST['age']);
$level = mysqli_real_escape_string($link, $_REQUEST['level']);


$sql = "INSERT INTO trainer (name,email,number,age,level) VALUES ('$name', '$email','$number','$age','$level')";
if(mysqli_query($link, $sql)){
    header('location:trainer.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>
