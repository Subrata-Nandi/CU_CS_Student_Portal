<?php 
$showAlert=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"] == "POST") {
    include './conn.php';
    $sname = $_POST["sname"];
    $gender = $_POST["gender"];
    $dob = date('Y-m-d',strtotime($_POST["dob"]));
    $sem = $_POST["sem"];
    $college = $_POST["college"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    // Check whether this password exist
    $existSql = "Select * from `registration` where Email='$email'";
    $result= mysqli_query($conn,$existSql);
    $numExistRows=mysqli_num_rows($result);
    if($numExistRows == true) {
        //$exists = true;
        $showError = "Email already exists";
    }
    else {
        if($password == $cpassword) {
            $hash=password_hash($password, PASSWORD_DEFAULT);
            $sql= "INSERT INTO `registration` (`Name`, `Gender`, `DOB`, `Sem`, `College`, `Email`, `Password`) 
            VALUES ('$sname', '$gender', '$dob', '$sem', '$college', '$email', '$hash')";
            $result=mysqli_query($conn,$sql);
            if($result) {
                $showAlert=true;
            }
        }
        else {
            $showError= "Passwords do not match.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
         background-image: url('https://static-cse.canva.com/blob/558907/blogtraffic.jpg');
         height: 150vh;
         background-repeat: no-repeat;
           
        }
        #reg{
            color: #ffff;
            font-family: "Trebuchet MS", Helvetica, sans-serif;
            font-size: 30px;
            text-align:center;
        }
        .box_1{
            font-family: Arial, Helvetica, sans-serif;
            color: #f5f2f2;
            background-color: #030303c4;
            max-width: 505px;
            margin: 48px auto;
            padding: 22px;
            border: 8px solid #0d0d0e;
            border-radius: 12px;
            box-shadow: 0px 0px 20px #0d6efd;
        }
        input[type=text], input[type=date] , input[type=email],input[type=password] {
            width: 100%;
            padding: 8px 15px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 4px;   
        }
        input[type=submit] {
            padding: 8px;
            width: 100%;
            outline: none;
            background: transparent;
            border-radius: 5px;
            border: 1px solid green;
            color: green;
            font-size: 20px;
        }
        input[type=submit]:hover {
            background: green;
            color: white;
            transition: all 0.3s ease;
        }
        input {
            outline: none;
            font-size: 15px;
        }
        p {
            text-align: center;
            margin-top: 30px;
        }      
    </style>
</head>
<body>
    <?php
    if($showAlert) {
        echo '    
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your account is now created and you can <a href="./login.php">login.</a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
    }
    if($showError) {
        echo '    
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '.$showError.'.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
    }
    ?>
	<div class="box_1">
        <h1 id="reg">REGISTRATION</h1>
        <form action="./register.php" method="post">
            <input type="text" placeholder="Enter Name" name="sname" maxlength="40" required><br><br>
            <label>Gender: </label>
            <input type="radio" name="gender" value="Male" required> Male
            <input type="radio" name="gender" value="Female" required> Female 
            <input type="radio" name="gender" value="Others" required> Others <br><br>
            <label> Date of Birth: </label> <input type="date" name="dob" required><br><br>
            <input type="text" placeholder="Enter Your Semester" name="sem" maxlength="30" required><br><br>
            <input type="text" placeholder="Enter Your College Name" name="college" maxlength="200" required><br><br>
            <input type="email" placeholder="Enter Email" name="email" maxlength="100" required><br><br>
            <input type="password" placeholder="Enter Password" name="password" maxlength="25" required><br><br>
            <input type="password" placeholder="Confirm Password" name="cpassword" required><br><br>
            <input type="submit" value="Register" name="register">
        </form>
    <p>Already a member?<a href="./login.php"> Click to Login</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
