<?php
    session_start();


    include("php/config.php");
    if(!isset($_SESSION['valid'])){
        header("Location: SignIn.php");
    }


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <head>
        <meta charset="UTF-8">
        <title>LUN DEV</title>
        <link rel="shortcut icon" href="logo.png" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/styleGlobal.css">
    </head>
</head>
<body>




    <header class="head">
        <div class="header">
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>


        <?php
            
        $id = $_SESSION['id'];
        $query = mysqli_query($con, "SELECT * FROM users WHERE Id=$id");

        while($result = mysqli_fetch_assoc($query)){
            $res_Name = $result['Name'];
            $res_Email = $result['Email'];
            $res_id = $result['Id'];
        }

        ?>

        <nav class="menu">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </nav>
        <div class="profile">
            <span>Profil</span>
            <a href="php/logout.php"> <span>Logout</span> </a>
            <img src="assets/sac.png" alt="Panier">
        </div>
    </div>
    </header>


    <div class="body-box">

        <div class="top">
            <div class="box">
                <p>hello <b> <?php echo $res_Name ?> </b>, welcome</p>
            </div>
        </div>

        
        <div class="top">
            <div class="box">
                <p>Your email is<b> <?php echo $res_Email ?> </b></p>
            </div>
        </div>

    </div>



    <main>
        <div class="slider" style="
            --width: 100px;
            --height: 50px;
            --quantity: 10;
        ">
            <div class = "list">
                <div class="item" style="--position: 1"><img src="assets/slider1_1.png" alt=""></div>
                <div class="item" style="--position: 2"><img src="assets/slider1_2.png" alt=""></div>
                <div class="item" style="--position: 3"><img src="assets/slider1_3.png" alt=""></div>
                <div class="item" style="--position: 4"><img src="assets/slider1_4.png" alt=""></div>
                <div class="item" style="--position: 5"><img src="assets/slider1_5.png" alt=""></div>
                <div class="item" style="--position: 6"><img src="assets/slider1_6.png" alt=""></div>
                <div class="item" style="--position: 7"><img src="assets/slider1_7.png" alt=""></div>
                <div class="item" style="--position: 8"><img src="assets/slider1_8.png" alt=""></div>
                <div class="item" style="--position: 9"><img src="assets/slider1_9.png" alt=""></div>
                <div class="item" style="--position: 10"><img src="assets/slider1_10.png" alt=""></div>
            </div>
        </div>

        <div class="slider" reverse="true" style="
            --width: 200px;
            --height: 200px;
            --quantity: 9;
        ">
            <div class="list">
                <div class="item" style="--position: 1"><img src="assets/slider2_1.png" alt=""></div>
                <div class="item" style="--position: 2"><img src="assets/slider2_2.png" alt=""></div>
                <div class="item" style="--position: 3"><img src="assets/slider2_3.png" alt=""></div>
                <div class="item" style="--position: 4"><img src="assets/slider2_4.png" alt=""></div>
                <div class="item" style="--position: 5"><img src="assets/slider2_5.png" alt=""></div>
                <div class="item" style="--position: 6"><img src="assets/slider2_6.png" alt=""></div>
                <div class="item" style="--position: 7"><img src="assets/slider2_7.png" alt=""></div>
                <div class="item" style="--position: 8"><img src="assets/slider2_8.png" alt=""></div>
                <div class="item" style="--position: 9"><img src="assets/slider2_9.png" alt=""></div>
            </div>
        </div>
    </main>
</body>
</html>