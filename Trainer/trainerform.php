<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: Login/login.php");
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

        <h2 class="text-left text-black"><br>Trainer Form</h2>
        <div class="form-inline" style="margin-top:-45px;float:right;">
        <a href="trainer.php" class="btn btn-primary mr-sm-2" >Trainer</a>
        <a href="../Login/logout.php" class="btn btn-danger my-2 my-sm-0">Logout</a>
        </div>
        <form name="myform" id="myform" method="post" onsubmit='return validation()' action="trainerinsert.php">

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
                <label>Age</label>
                <input type="text" class="form-control" id="age" name="age">
                <span id="age-error" class="text-danger"></span>
            </div>
            <div class="form-group">
                <select class="custom-select custom-select-lg mb-3" name="level" id="level">
                    <option selected>Select Level</option>
                    <option value="Beginner">Beginner</option>
                    <option value="Amateur">Amateur</option>
                    <option value="Professional">Professional</option>
                </select>

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
        var age =  document.getElementById('age').value;

        var namecheck = /^[A-za-z. ]{3,30}/;
        var emailcheck = /^[A-Za-z0-9_.]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/;
        var numbercheck = /^[0-9]{10}$/;
        var agecheck = /^[0-9]{}/;


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
        if (citycheck.test(age)) {
            document.getElementById('age-error').innerHTML = "";

        } else {
            document.getElementById('age-error').innerHTML = "Age is invalid";
            return false;
        }

    }
</script>

</html>
