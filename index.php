<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <meta name="keywords" content="Genshin Impact Simulator Wish or Simulation Gacha">
    <meta name="description" content="Simulation of wish or gacha from game Genshin Impact">
    <title>Simulator Wish Genshin Impact by Keqingcu</title>
    <link rel="icon" href="images/icon.jpg">
    <link rel="stylesheet" href="styles.css">
    <script src="//code.jquery.com/jquery-2.2.1.min.js"></script>
    <script>
        $(document).ready(function(){
        $(".preloader").fadeOut();
        })
    </script>
</head>
<body id="top">
    <?php require_once "header.php"; ?>

    <div class="border-content"></div>

    <div class="container">
    <div class="content">

    <div class="main-content">
        <h3>Disclaimer</h3>
        <ul>
            <ol class="begin-alert">&#10022; This is only a simulation program and not affect anything in your game</ol>
            <ol class="begin-alert">&#10022; Please take care to expose anything about your account information</ol>
            <ol class="begin-alert">&#10022; If you are looking for a list of banners, you can go to the <a href="archive"><b>archive</b></a></ol>
            <ol class="begin-alert">&#10022; This site only as my work practice, so maybe will not update to other banner and content</ol>
            <ol class="begin-alert">&#10022; Source Code : <a href="https://github.com/keqingcu/simulatorwish">Github Repository</a></ol>
        </ul>
    </div>

    <!-- BEGINNER WISH ONLY IF < 20 -->
    <?php 
        require_once "database/connect.php";
        $sql = "SELECT * FROM pity_beginners WHERE id=$user_id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if($row["roll"]<20 || isset($_POST["reset"])==true){
    ?>

    <div class="main-content" id="beginners">
    <?php
    require_once "archive/beginners_wish_home/beginners.php";
    ?>
    </div>

    <?php } ?>
    <!-- BEGINNER WISH ONLY IF < 20 -->

    <div class="main-content">
    <!--UPCOMING BANNER-->
    <?php
    require_once "upcoming.php";
    ?>
    <!--UPCOMING BANNER-->
    </div>

    <div class="main-content" id="character">
    <!--BALLAD IN GOBLETS BANNER-->
    <?php
    require_once "archive/ballad_in_goblets_2/character.php";
    ?>
    <!--BALLAD IN GOBLETS BANNER-->
    </div>

    <!--WEAPON-->
    <div class="main-content"id="weapon">
        <?php
        require_once "archive/epitome_invocation_9/weapon.php";
        ?>
    </div>
    <!--WEAPON-->

    <!--STANDARD-->
    <div class="main-content"id="standard">
        <?php
        require_once "archive/wanderlust_invocation/standard.php";
        ?>
    </div>
    <!--STANDARD-->

    <!--NEWS-->
    <div class="main-content" id="news">
    <div class="last-content">
    <?php require_once "news/news.php" ?>
    <!--NEWS-->
    </div>
    </div>
    </div>
    <?php require_once "sidebar.php"; ?>
    </div>

    <div class="border-content"></div>

    <?php require_once "footer.php" ?>
</body>
</html>