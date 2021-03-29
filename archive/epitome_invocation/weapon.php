<div class="event-banner" style="color:rgb(226 150 76);"><i>&#10022; Weapon Event Wish</i></div>
<div class="date-banner" style="color:rgb(226 150 76);">2020/09/28 - 2020/10/18</div>
<h3><div class ="title-banner">Epitome Invocation - Aquila Favonia, Amos' Bow (&#9733;&#9733;&#9733;&#9733;&#9733;), The Flute and more (&#9733;&#9733;&#9733;&#9733;)</div></h3>
<img src="../../images/banner/aquila amos 1.0.jpg" alt="Epitome Invocation" class="center">
<?php
    require_once "database/connect.php";
    require_once "archive/epitome_invocation/wish_weapon.php";
    require_once "archive/epitome_invocation/detail.php";
?>
    <div id="weaponwish"></div>
    <form action="#weaponwish" method="post">
    <p><button type = "submit" class="buttonweap" value = 1 name="weapon">1x Wish</button>
    <button type = "submit" class="buttonweap" value = 10 name="weapon">10x Wish</button>
    <button type = "submit" class="history" value = 1 name="historyweap">History</button></p>
    </form>

    <?php
    if(isset($_POST["historyweap"])){

        $sql = "SELECT * FROM history_weapon WHERE id=$user_id ORDER BY roll DESC LIMIT 6 ";
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
            echo "<tr><th colspan='3' class='seehistory'><a href='/history/weapon'>See More Detail</a></th></tr>";
            echo "</table>";
    }


    if(isset($_POST["weapon"])){
        for ($var = 1; $var <= $_POST["weapon"]; $var++){
            pityweapon();
            wishweapon();        
        }
    }else{
        ?>
        <table style="width:100%;text-align:center;">
            <tr>
                <th colspan="7" class="rateup" >Rate Up</th>
            </tr>
            <tr class="rateuptumb">
                <td class = "star5">
                    <?php 
                        RateUpWeapon(2);                    
                    ?>
                </td>
                <td class = "star5">
                    <?php 
                            RateUpWeapon(1);                    
                    ?>
                </td>
                </td>
                <td class = "star4">
                    <?php 
                            RateUpWeapon(11);                    
                    ?>
                </td>
                <td class = "star4">
                    <?php 
                            RateUpWeapon(12);                    
                    ?>
                </td>
                </tr>
                <tr class="rateuptumb">
                <td class = "star4">
                    <?php 
                            RateUpWeapon(13);                    
                    ?>
                </td>
                <td class = "star4">
                    <?php 
                            RateUpWeapon(14);                    
                    ?>
                </td>
                <td class = "star4">
                    <?php 
                            RateUpWeapon(15);                    
                    ?>
                </td>
                <td></td>
            </tr>
            <tr>
            <th colspan="7" class="seehistory" style="border:0px;"><a href="https://genshin-impact.fandom.com/wiki/Epitome_Invocation/2020-09-28" target="_blank">See Detail in Wiki Page</a></th>
            </tr>
        </table>
        <?php
        }
    
    if(isset($_POST["weapon"])){
        if($_POST["weapon"]==10){
    ?>
        <form action="#weaponwish" method="post">
        <p><button type = "submit" class="buttonweap" value = 1 name="weapon">1x Wish</button>
        <button type = "submit" class="buttonweap" value = 10 name="weapon">10x Wish</button>
        <button type = "submit" class="history" value = 1 name="historyweap">History</button></p>
        </form>
    <?php }
    } ?>