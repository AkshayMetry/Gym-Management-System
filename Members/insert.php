<?php

$link = mysqli_connect("localhost", "root", "", "gym");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$membership = mysqli_real_escape_string($link, $_REQUEST['membership']);
$trainer = mysqli_real_escape_string($link, $_REQUEST['trainer']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$number = mysqli_real_escape_string($link, $_REQUEST['number']);
$address = mysqli_real_escape_string($link, $_REQUEST['address']);
$city = mysqli_real_escape_string($link, $_REQUEST['city']);
$zip = mysqli_real_escape_string($link, $_REQUEST['zip']);
$paymentmethod = mysqli_real_escape_string($link, $_REQUEST['paymentmethod']);


$sql = "INSERT INTO members (membership,name, email,phone,address,city,zip,payment,trainer) VALUES ('$membership', '$name', '$email','$number','$address','$city','$zip','$paymentmethod','$trainer')";
if(mysqli_query($link, $sql)){
    header('location:table.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>
