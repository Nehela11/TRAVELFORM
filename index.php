<?php
$insert=false;
if(isset($_POST['name'])){
$server="localhost";
$username="root";
$password="";

$con=mysqli_connect($server,$username,$password);
if(!$con){
    die("connection to this datebase failed due to" . mysqli_connect_error());
}
//echo "Sucess connecting to database";
   $name = $_POST['name'];
   $age = $_POST['age'];
   $gender = $_POST['gender'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $desc = $_POST['desc'];
   $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql; 

   if($con->query($sql)== true){
    // echo "Successfully inserted";
     $insert=true;
   }
   else{
    echo "ERROR : $sql <br> $con->error";
   }
   $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Travel Form</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <img class="bg" src="bf.jpg" alt="ALIAH UNIVERSITY">
    <div class="container">
        <h1>Welcome To ALIAH UNIVERSITY Trip Form</h1>
        <p> ENTER YOUR DETAILS TO CONFORM YOUR PARTICIPATION IN THE TRIP AND SUBMIT THE FORM</p>
        <?php
        if($insert == true){
        echo "<p class='msg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
        ?>
        <form action="index.php" method="posT">
            <input type="text" name="name" id="name" placeholder="ENTER YOUR NAME">
            <input type="text" name="age" id="age" placeholder="ENTER YOUR AGE">
            <input type="text" name="gender" id="gender" placeholder="ENTER YOUR GENDER">
            <input type="email" name="email" id="email" placeholder="ENTER YOUR EMAIL">
            <input type="phone" name="phone" id="phone" placeholder="ENTER YOUR PHONE NUMBER">
            <textarea name="desc" id="desc" cols="30" rows="10"
                placeholder="ENTER ANY OTHER INFORMATION HERE"></textarea>

            <br>
            <button class="btn">Submit</button>

        </form>


    </div>
    <script src="index.js"></script>
</body>

</html>