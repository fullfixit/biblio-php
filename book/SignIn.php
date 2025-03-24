<?php
    session_start();
?>

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
    <header>
        <div class="logo">
            <img src="logo.png" alt="">
        </div>
        <h1>Hi, welcome back!</h1>
    </header>


    
    <?php

        include("php/config.php");
        if(isset($_POST['submit'])){
            $email = mysqli_real_escape_string($con,$_POST['email']);
            $password = mysqli_real_escape_string($con,$_POST['password']);

            $result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select error");
            $row = mysqli_fetch_assoc($result);

            if(is_array($row) && !empty($row)){
                $_SESSION['valid'] = $row['Email'];
                $_SESSION['name'] = $row['Name'];
                $_SESSION['id'] = $row['Id'];
            } else {
                echo " <div class='message'>
                            <p>wrong name or password </p>
                        </div> <br>" ;
                echo " <a href='SignIn.php'><button class='btn'>Go Nack </button>";

            }
            if(isset($_SESSION['valid'])){
                header("Location: Index.php");
            }
        }else{
            
       

    ?>


    <form action="" method="post">

        <input
        for="email"
        type="email" 
        name="email"
        id="email"
        placeholder="Your email"
        required>

        <input 
        for="password"
        type="password" 
        name="password" 
        id="password"
        placeholder="Password"
        minlength="6"
        required>
        <p>Password must be at least 6 characters</p>

        <button type="submit" value="SignIn" name="submit">Sign in</button>

        <p class="text-white">Don't have an account? <a href="SignUp.php">SignUp now</a></p>
        <div class="or">or</div>
        <button class="sso"  type="button">Login with phone number</button>
        <p>
            You acknowledge that you read, and agree, to our <a>Terms of Service</a> and our <a>Privacy Policy</a>.
        </p>
    </form>
    <?php } ?>
</body>

</html>