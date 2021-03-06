<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <meta name="keywords" content="Genshin Impact Simulator Wish or Simulation Gacha">
    <meta name="description" content="Simulation of wish or gacha from game Genshin Impact">    <title>Epitome Invocation - Simulator Wish Genshin Impact</title>
    <link rel="icon" href="../../images/icon.jpg">
    <link rel="stylesheet" href="../../styles.css">
<script src="//code.jquery.com/jquery-2.2.1.min.js"></script>
    <script>
        $(document).ready(function(){
        $(".preloader").fadeOut();
        })
    </script>
</head>
<body id="top">
    <?php chdir("../../");?>
    <?php require_once "header.php" ?>

    <div class="border-content"></div>

    <div class="container">
    <div class="content">


    <!--WEAPON-->
    <div class="main-content"id="weapon">
        <?php
        require_once "archive/epitome_invocation_10/weapon.php";
        ?>
    </div>
    <!--WEAPON-->

    </div>
    <?php require_once "sidebar.php"; ?>
    </div>

    <div class="border-content"></div>

    <?php require_once "footer.php" ?>
</body>
</html>