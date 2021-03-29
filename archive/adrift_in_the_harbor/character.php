<div class="event-banner" style="color:rgb(118 191 200);"><i>&#10022; Character Event Wish</i></div>
<div class="date-banner" style="color:rgb(118 191 200);">2021/01/12 - 2021/02/02</div>
<h3><div class ="title-banner">Adrift in the Harbor - Ganyu (&#9733;&#9733;&#9733;&#9733;&#9733;), Noelle, Xingqiu, Xiangling (&#9733;&#9733;&#9733;&#9733;)</div></h3>
<img src="../../images/banner/ganyu 1.2.jpg" alt="Adrift in the Harbor" class="center">

<?php
    require_once "database/connect.php";
    require_once "archive/adrift_in_the_harbor/wish_character.php";
    require_once "archive/adrift_in_the_harbor/detail.php";
?>
    <div id="characterwish"></div>
    <form action="#characterwish" method="post">
    <p><button type = "submit" class="button" value = 1 name="chara">1x Wish</button>
    <button type = "submit" class="button" value = 10 name="chara">10x Wish</button>
    <button type = "submit" class="history" value = 1 name="historychara">History</button></p>
    </form>

    <?php

    if(isset($_POST["historychara"])){

        $sql = "SELECT * FROM history_character WHERE id=$user_id ORDER BY roll DESC LIMIT 6 ";
        $result = $conn->query($sql);
        echo "<table class='history-six'>";
        echo "<tr><th colspan='3' class='history-six-title'>History</th></tr>";
        echo "<tr>";
        echo "<th class='history-six-menu'>Tier</th>
              <th class='history-six-menu'>Item Name</th>
              <th class='history-six-menu'>Time Received</th";
        echo "</tr>";
            while($row = $result->fetch_assoc()){
                        echo "<tr>";

                            if($row['tier']=="4&#9733;"){
                                $color = "<td class='history-six-detail4'>";
                            } else if($row['tier']=="5&#9733;"){
                                $color = "<td class='history-six-detail5'>";
                            } else {
                                $color = "<td class='history-six-detail'>";
                            }
                            echo $color;
                            echo $row['tier'];
                            echo "</td>";

                            echo $color;                            
                            echo $row['name'];
                            echo "</td>";

                            echo $color;                            
                            echo $row['date'];
                            echo "</td>";

                        echo "</tr>";
            }
            echo "<tr><th colspan='3' class='seehistory'><a href='/history/character'>See More Detail</a></th></tr>";
            echo "</table>";
    }

    if(isset($_POST["chara"])){
        for ($var = 1; $var <= $_POST["chara"]; $var++){
            pity();
            wish();        
        }

    }else{
        ?>
        <table style="width:100%;text-align:center;">
            <tr>
                <th colspan="4" class="rateup" >Rate Up</th>
            </tr>
            <tr>
                <td class = "star5">
                    <?php 
                        RateUpCharacter(1);                    
                    ?>
                </td>
                <td class = "star4">
                    <?php 
                            RateUpCharacter(19);                    
                    ?>
                </td>
                </td>
                <td class = "star4">
                    <?php 
                            RateUpCharacter(18);                    
                    ?>
                </td>
                <td class = "star4">
                    <?php 
                            RateUpCharacter(17);                    
                    ?>
                </td>
            </tr>
            <tr>
            <th colspan="4" class="seehistory" style="border:0px;"><a href="https://genshin-impact.fandom.com/wiki/Adrift_in_the_Harbor" target="_blank">See Detail in Wiki Page</a></th>
            </tr>
        </table>
        <?php
    }
    
    if(isset($_POST["chara"])){
        if($_POST["chara"]==10){
    ?>
        <form action="#characterwish" method="post">
        <p><button type = "submit" class="button" value = 1 name="chara">1x Wish</button>
        <button type = "submit" class="button" value = 10 name="chara">10x Wish</button>
        <button type = "submit" class="history" value = 1 name="historychara">History</button></p>
        </form>
    <?php }
    } ?>