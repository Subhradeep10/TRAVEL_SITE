<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username= "root";
    $password= "";

    $con= mysqli_connect($server,$username,$password);

    if(!$con){
        die("connection to this database failed due to".mysqli_connect_error());
    }
    // echo "Success connecting to the db"

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other = $_POST['other'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
    // echo $sql;

    if($con->query($sql) == true){
        // echo "Successfully inserted";
        $insert=true;
    }
    else{
        echo "Error: $sql <br> $con->error";
    }
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="travel.jfif" alt="Travel" class="bg">
    <div class="container">
        <h1>Welcome to US Trip Form</h1>
        <p class="header">Enter your Details to participation in the Trip</p>
        <?php
        if($insert == true){ 
        echo "<p class='submit'>Thanks for Submitiing your form</p>";}
        ?>
        <form action="index.php" method="post">
            
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
            <input type="email" name="email" id="email" placeholder="Enter your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <span>
            <button class="btn">Submit</button>
            </span>
            
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>