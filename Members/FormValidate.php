<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../Login/login.php");
    exit;
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

        <h2 class="text-left text-black"><br>Gym Membership </h2>
        <div class="form-inline" style="margin-top:-45px;float:right;">
        <a href="table.php" class="btn btn-primary mr-sm-2" >Members</a>
        <a href="../Trainer/trainer.php" class="btn btn-success mr-sm-2" >Trainer</a>
        <a href="../Login/logout.php" class="btn btn-danger my-2 my-sm-0">Logout</a>
        </div>
        <form name="myform" id="myform" method="post" onsubmit='return validation()' action="insert.php">
            <div class="form-group">
                <select class="custom-select custom-select-lg mb-3" name="membership" id="membership">
                    <option selected>Select Membership</option>
                    <option value="One Month - 500Rs">One Month - 500Rs</option>
                    <option value="Three Month - 1200Rs">Three Month - 1200Rs</option>
                    <option value="Six Month - 2400Rs">Six Month - 2400Rs</option>
                </select>

            </div>
            <div class="form-group">
                <?php
                require_once '../DB.class.php';
                $db = new DB();

                $rows = $db->getRows('trainer');
                $query = "SELECT id,name,level FROM trainer";
                if(!empty($rows)){ $count = 0;

                echo "<select name=trainer class='custom-select custom-select-lg mb-3'  >Trainer</option>"; // list box select command
                echo "<option selected>Select Trainer</option>";
                foreach($rows as $row){ //Array or records stored in $row

                echo "<option value='$row[name]-$row[level]'>$row[name] - $row[level]</option>";

                /* Option values are added by looping through the array */

                }
              }
                echo "</select>";
                ?>


            </div>
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" id="name" class="form-control">
                <span id="name-error" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="text" name="email" id="email" class="form-control">
                <span id="email-error" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label>Phone Number:</label>
                <input type="text" name="number" id="number" class="form-control">
                <span id="number-error" class="text-danger"></span>
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" id="address" name="address">
                <span id="address-error" class="text-danger"></span>
            </div>

            <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" id="city" name="city">
                <span id="city-error" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label>Zip</label>
                <input type="text" class="form-control" id="zip" name="zip">
                <span id="zip-error" class="text-danger"></span>
            </div>

            <div class="form-group">
                <label>Select the Payment Mode:</label><br>
                <input type="radio" id="cash" name="paymentmethod" value="Cash">
                <label>Cash</label><br>
                <input type="radio" id="card" name="paymentmethod" value=" Credit/Debit Card">
                <label>Credit/Debit Card</label><br>
                <span id="payment-error" class="text-danger"></span>
                <span id="payment-slect" class="text-success"></span>

            </div>


            <input type="submit" class="btn btn-primary">


        </form>


    </div>


</body>
<script type="text/javascript">
    function validation() {
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var number = document.getElementById('number').value;
        var address = document.getElementById('address').value;
        var city = document.getElementById('city').value;
        var zip = document.getElementById('zip').value;

        var namecheck = /^[A-za-z. ]{3,30}/;
        var emailcheck = /^[A-Za-z0-9_.]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/;
        var numbercheck = /^[0-9]{10}$/;
        //            var addresscheck = /^[A-Za-z0-9,-]{3,}$/
        var citycheck = /^[A-Za-z ]{3,}/;
        var zipcheck = /^[0-9]{6}/;


        if (namecheck.test(name)) {
            document.getElementById('name-error').innerHTML = "";

        } else {
            document.getElementById('name-error').innerHTML = "Username is invalid";
            return false;
        }

        if (emailcheck.test(email)) {
            document.getElementById('email-error').innerHTML = "";

        } else {
            document.getElementById('email-error').innerHTML = "Email is invalid";
            return false;
        }
        if (numbercheck.test(number)) {
            document.getElementById('number-error').innerHTML = "";

        } else {
            document.getElementById('number-error').innerHTML = "Number is invalid";
            return false;
        }
        if (citycheck.test(city)) {
            document.getElementById('city-error').innerHTML = "";

        } else {
            document.getElementById('city-error').innerHTML = "City is invalid";
            return false;
        }
        if (zipcheck.test(zip)) {
            document.getElementById('zip-error').innerHTML = "";

        } else {
            document.getElementById('zip-error').innerHTML = "Zip Code is invalid";
            return false;
        }
        if (document.getElementById('cash').checked) {
            document.getElementById("payment-select").innerHTML = document.getElementById("cash").value;
        } else if (document.getElementById('card').checked) {
            document.getElementById("payment-select").innerHTML = document.getElementById("JS").value;
        } else {
            document.getElementById("payment-error").innerHTML = "No one selected";
            return false;
        }

    }
</script>

</html>
