<?php
$link = mysqli_connect("localhost", "root", "", "gym");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['update']))
{

$id = mysqli_real_escape_string($link, $_POST['id']);
$name = mysqli_real_escape_string($link, $_POST['name']);
$age = mysqli_real_escape_string($link, $_POST['age']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$number = mysqli_real_escape_string($link, $_POST['number']);

$query = "UPDATE trainer SET name='$name',age='$age',email='$email', number = '$number' WHERE id=$id";
// var_dump($query);exit();
$result = mysqli_query($link,$query);
if($result === true){
  header('location:trainer.php');
}
else{
  echo "Not Updated";
}

}
?>
