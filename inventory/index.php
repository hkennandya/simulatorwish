<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <title>Inventory - Simulator Wish Genshin Impact</title>
    <link rel="icon" href="../images/icon.jpg">
    <link rel="stylesheet" href="../styles.css">
<script src="//code.jquery.com/jquery-2.2.1.min.js"></script>
    <script>
        $(document).ready(function(){
        $(".preloader").fadeOut();
        })
    </script>
</head>
<body id="top">
    <?php require_once "../database/connect.php"; ?>
    <button onclick="topFunction()" id="myBtn" title="Go to top"class="up-sign"><b>▲</b></button>

    <script>
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
    }

    // When user click they back
    function goBackContinue(){
        var myVar = setInterval(function(){ goBack() }, 150);
    }
    function goBack() {
        window.history.back();
    }
    </script>

    <?php
        if(isset($_POST["reset"])==true){
                
                //Update Inventory
                $sql = "UPDATE user_inventory SET number=0 WHERE id=$user_id";
                $conn->query($sql);
        }
    ?>


<div class="show-inventory">
<div class="container">
    <div class="history-content">

    <form action="javascript:goBackContinue()" method="post">
    <p><button type = "submit" class="button" name="chara">Back</button>
    </form>
    <h1 style="text-align:center">Inventory:Desktop Detected</h1>
    <p style="text-align:center">Please check this page from home!</br></br></p>
    </div>
    </div>
</div>
<div class="hide-inventory">
    <div class="container">
    <div class="history-content">

    <form action ="javascript:goBackContinue()" method="post">
    <button type = "submit" class="button-inventory" name="backtomenu">Back</button>
 
    </form>
    <form action="../" method="post" class="sideb">
    <?php 
        $sql = "SELECT * FROM user_inventory WHERE id=$user_id ORDER BY number DESC";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if($row['number']>0){
    ?>
        <button type = "submit" class="side-button" value = 1 name="reset">Reset</button>
    <?php 
        } else{ ?>
            <button type="button" class="side-button-disabled" disabled>Reset</button>
        <?php }
    ?>
    </form>

    <!--<form action ="#reset"method="post" class="sideb">
    <p><button type = "submit" class="side-button" value = 1 name="reset">Reset</button></p>
    </form>-->

        <?php
        if(isset($_POST["reset"])==true){
                
                //Update Inventory
                /*$sql = "UPDATE user_inventory SET number=0 WHERE id=$user_id";
                $conn->query($sql);*/
                
                //Update pity
                $updatePITY4s = "UPDATE pity_character SET pity_4s=0 WHERE id=$user_id";
                $conn->query($updatePITY4s);
                $updatePITY5s = "UPDATE pity_character SET pity_5s=0 WHERE id=$user_id";
                $conn->query($updatePITY5s);
                $updateROLL = "UPDATE pity_character SET roll=0 WHERE id=$user_id";
                $conn->query($updateROLL);

                $updatePITY4s = "UPDATE pity_weapon SET pity_4s=0 WHERE id=$user_id";
                $conn->query($updatePITY4s);
                $updatePITY5s = "UPDATE pity_weapon SET pity_5s=0 WHERE id=$user_id";
                $conn->query($updatePITY5s);
                $updateROLL = "UPDATE pity_weapon SET roll=0 WHERE id=$user_id";
                $conn->query($updateROLL);

                $updatePITY4s = "UPDATE pity_standard SET pity_4s=0 WHERE id=$user_id";
                $conn->query($updatePITY4s);
                $updatePITY5s = "UPDATE pity_standard SET pity_5s=0 WHERE id=$user_id";
                $conn->query($updatePITY5s);
                $updateROLL = "UPDATE pity_standard SET roll=0 WHERE id=$user_id";
                $conn->query($updateROLL);

                $updatePITY4s = "UPDATE pity_beginners SET pity_4s=0 WHERE id=$user_id";
                $conn->query($updatePITY4s);
                $updatePITY5s = "UPDATE pity_beginners SET pity_5s=0 WHERE id=$user_id";
                $conn->query($updatePITY5s);
                $updateROLL = "UPDATE pity_beginners SET roll=0 WHERE id=$user_id";
                $conn->query($updateROLL);

                //Update item not found
                $updateIN = "UPDATE user_inventory SET image='<div class=menu>Item not found</br></div>' WHERE name='item' && id=$user_id";
                $conn->query($updateIN);

                //Delet all history
                $deletehistory = "DELETE FROM history_weapon WHERE id=$user_id";
                $conn->query($deletehistory);

                $deletehistory = "DELETE FROM history_character WHERE id=$user_id";
                $conn->query($deletehistory);

                $deletehistory = "DELETE FROM history_standard WHERE id=$user_id";
                $conn->query($deletehistory);

                $deletehistory = "DELETE FROM history_beginners WHERE id=$user_id";
                $conn->query($deletehistory);

        }else{

        }
    
            $sql = "SELECT * FROM user_inventory WHERE id=$user_id && name='item'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if($row["name"]=='item'){
                echo $row["image"];
            }
        
            $sql = "SELECT * FROM user_inventory WHERE number>0 && id=$user_id ORDER BY tier DESC, main ASC ";
            $result = $conn->query($sql);
            // output data of each row
            while($row = $result->fetch_assoc()) {

                if($row["tier"]=="5&#9733;"){  
                    echo "<div class='inventory' style='background-color:#736a19;'>";
                }
                else if($row["tier"]=="4&#9733;"){
                    echo "<div class='inventory' style='background-color:#4a184c;'>";

                }else{
                    echo "<div class='inventory'>";
                }



                echo "<p><img src='../images/" . $row["image"] . "' alt='' style='height:70px;width:70px;'></br>";

                echo $row["name"];
                echo "</br>(";
                $checktipe = substr($row["main"], 0, 1);
                if ($checktipe=="E"){
                    if($row["number"]>=7){
                        echo "C6";
                    }else{
                    $cons = $row["number"]-1;
                    echo "C" . $cons;
                    }
                } else{
                    echo $row["number"];
                }
                echo ")</br></p>";
                echo "</div>";

                }
            ?>
    </div>
    </div>
</div>
</body>
</html>