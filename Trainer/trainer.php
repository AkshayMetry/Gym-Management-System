<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: Login/login.php");
    exit;
}
?>
<?php

// Start session


// Get session data
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';

// Get status message from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}

// Load pagination class
require_once '../Pagination.class.php';

// Load and initialize database class
require_once '../DB.class.php';
$db = new DB();

// Page offset and limit
$perPageLimit = 5;
$offset = !empty($_GET['page'])?(($_GET['page']-1)*$perPageLimit):0;

// Get search keyword
$searchKeyword = !empty($_GET['sq'])?$_GET['sq']:'';
$searchStr = !empty($searchKeyword)?'?sq='.$searchKeyword:'';

// Search DB query
$searchArr = '';
if(!empty($searchKeyword)){
    $searchArr = array(
        'name' => $searchKeyword,
        'email' => $searchKeyword,

    );
}

// Get count of the users
$con = array(
    'like_or' => $searchArr,
    'return_type' => 'count'
);
$rowCount = $db->getRows('trainer', $con);

// Initialize pagination class
$pagConfig = array(
    'baseURL' => 'trainer.php'.$searchStr,
    'totalRows' => $rowCount,
    'perPage' => $perPageLimit
);
$pagination = new Pagination($pagConfig);

// Get users from database
$con = array(
    'like_or' => $searchArr,
    'start' => $offset,
    'limit' => $perPageLimit,
    'order_by' => 'id DESC',
);
$rows = $db->getRows('trainer', $con);

?>

<html>


<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <br>
    <div class="container-fluid">
        <h2 class="text-left text-black">Detail Of Trainer</h2>
        <div class="text-center align-md" style="
    float: right;
    margin-top: -50px;">
            <a href="../Members/FormValidate.php" class="btn btn-primary">Gym Form</a>
            <a href="trainerform.php" class="btn btn-success">Trainer Form</a>
            <a href="../Login/welcome.php" class="btn btn-warning">Profile</a>
            <a href="../Login/logout.php" class="btn btn-danger">Logout</a>
        </div>
        <form>
        <div class="input-group">
            <input type="text" name="sq" class="form-control" placeholder="Search by keyword..." value="<?php echo $searchKeyword; ?>">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                    <i class="glyphicon glyphicon-search">Submit</i>
                </button>
            </div>
        </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>

                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Number</th>
                    <th scope="col">Age</th>
                    <th scope="col">Level</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
              <?php
              if(!empty($rows)){ $count = 0;
                  foreach($rows as $row){ $count++;
              ?>
                <tr>
                    <td scope="col"><?php echo $row['id'] ;?> </td>
                    <td scope="col"><?php echo $row['name'] ;?></td>
                    <td scope="col"><?php echo $row['email'];?> </td>
                    <td scope="col"><?php echo $row['number'];?> </td>
                    <td scope="col"><?php echo $row['age'];?> </td>
                    <td scope="col"><?php echo $row['level'];?> </td>
                    <td scope="col"><?php echo $row['created_date'] ;?></td>
                    <td> <?php echo "<a class='btn btn-success btn-sm'  href='trainerupdate.php?id=".$row['id']."'>Edit</a>"?></td>
                    <td> <?php echo "<a class='btn btn-danger btn-sm' onClick=\"javascript: return confirm('Please confirm deletion');\" href='trainerdelete.php?id=".$row['id']."'>Delete</a>"?></td>

                </tr>
              <?php } }else{ ?>
              <tr><td colspan="5">No user(s) found......</td></tr>
              <?php } ?>
            </tbody>

        </table>
          <?php echo $pagination->createLinks(); ?>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>
