<?php
$link = mysqli_connect("localhost", "root", "", "gym");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['update']))
{

$id = mysqli_real_escape_string($link, $_POST['id']);
$name = mysqli_real_escape_string($link, $_POST['name']);
$phone = mysqli_real_escape_string($link, $_POST['phone']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$address = mysqli_real_escape_string($link, $_POST['address']);
$city = mysqli_real_escape_string($link, $_POST['city']);
$zip = mysqli_real_escape_string($link, $_POST['zip']);

$query = "UPDATE members SET name='$name',email='$email', phone = '$phone', address='$address',city = '$city',zip = '$zip' WHERE id=$id";
// var_dump($query);exit();
$result = mysqli_query($link,$query);
if($result === true){
  header('location:table.php');
}
else{
  echo "Not Updated";
}

}
?>
