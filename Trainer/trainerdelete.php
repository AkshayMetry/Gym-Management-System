<html>
<body>
<?php
$link = mysqli_connect("localhost", "root", "", "gym");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_GET['id']))
{
$id=$_GET['id'];
$query="DELETE FROM trainer WHERE id='$id'";

if(mysqli_query($link,$query)){
header('location:trainer.php');
}
}
?>
</body>
</html>
