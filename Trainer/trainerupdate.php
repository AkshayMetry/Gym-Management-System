<?php
// including the database connection file
$link = mysqli_connect("localhost", "root", "", "gym");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM trainer WHERE id=$id";
$result = mysqli_query($link,$sql );

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$age = $res['age'];
	$email = $res['email'];
  $number = $res['number'];

}

?>
<html>
<head>

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</head>

<body>

  <div class="container">
      <h2 class="text-left text-black">Update Detail Of Trainer</h2>
  <form name="myform" id="myform" method="post"  action="editprocess.php">

      <div class="form-group">
          <label>Name:</label>
          <input type="text" name="name" id="name" value="<?php echo $name;?>" class="form-control">

      </div>
      <div class="form-group">
          <label>Email:</label>
          <input type="text" name="email" id="email" value="<?php echo $email;?>"class="form-control">

      </div>
      <div class="form-group">
          <label>Phone Number:</label>
          <input type="text" name="number" id="number" value="<?php echo $number;?>" class="form-control">

      </div>

      <div class="form-group">
          <label>Age</label>
          <input type="text" class="form-control" id="age" name="age" value="<?php echo $age;?>">

      </div>
      <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
    <input type="submit" name="update" value="Update" class="btn btn-primary"></td>
    <a href="trainer.php" class="btn btn-danger" >Cancel</a>

  </form>
</div>
</body>
</html>
