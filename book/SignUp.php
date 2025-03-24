<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>LUN DEV</title>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    
<?php

include("php/config.php");
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

//verifying the unique mail

$verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");

if(mysqli_num_rows($verify_query) !=0) {

    echo " <div class='message'>
                <p>This email is used, Try another One </p>
           </div> <br>" ;
    echo " <a href='SignUp.php'><button class='btn'>Go Nack </button>";

} else {

    mysqli_query($con, "INSERT INTO users(Name,Email,Password ) VALUES('$name', '$email', '$password')") or die ("Error occured");
    
    echo " <div class='message'>
                <p> Registration successfully! </p>
           </div> <br>" ;
    echo " <a href='index.php'><button class='btn'>Login Now</button> ";

}

} else {



?>

    <header>
        <div class="logo">
            <img  alt="">
        </div>
    </header>

    <form action="" method="post">
   
        <input
        for="name"
        type="text" 
        name="name"
        id="name"
        placeholder="Your name"
        required>

        <input
        for="email"
        type="email" 
        name="email"
        id="email"
        placeholder="Your email"
        required>

        <p>Password must be at least 6 characters</p>

        <input 
        for="password"
        type="password" 
        name="password" 
        id="password"
        placeholder="Password"
        minlength="6"
        required>

        <button type="submit" value="SignUp" name="submit">Sign Up</button>

        <p class="text-white">Already have account? <a href="SignIn.php">SignIn now</a></p>
        <div class="or">or</div>
        <button class="sso" type="button">SignUp with phone number</button>
        <p>
            You acknowledge that you read, and agree, to our <a>Terms of Service</a> and our <a>Privacy Policy</a>.
        </p>
    </form>

    <?php } ?>

</body>

</html>