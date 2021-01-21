<?php
 $insert = false;
if(isset($_POST['name'])){
    //  Set connection variables
     $server = "localhost";
     $username = "root";
     $password = "";
     
    //  create a database connection
     $con = mysqli_connect($server ,$username, $password);
    //  check for connection success
     if(!$con) {
         die("connection to this database failed due to" . mysqli_connect_error());
     }
    //  collect post variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other = $_POST['other'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
    VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
    
    // Execute the query
    if($con->query($sql) == true) {
        // echo "Successfully inserted";
        // flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    // close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcom to Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300;400;500;800&display=swap" rel="stylesheet">
</head>
<body>
    <img class="bg" src="photo.jpg" alt="SAS College">
    <div class="container">
        <h3>Welcome to SAS College Trip form</h3>
        <p>Enter your details to confirm your participation in the trip</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thank you for submiting your form</p>";
        }
        ?>
        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your number">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter anyother details here"></textarea>
            <button class="btn">Submit</button>
            
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>