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
$query="DELETE FROM members WHERE id='$id'";

if(mysqli_query($link,$query)){
header('location:../Members/table.php');
}
}
?>
</body>
</html>
