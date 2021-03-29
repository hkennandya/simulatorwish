<div class="event-banner" style="color:rgb(109 115 187);"><i>&#10022; Standard Wish</i></div>
<div class="date-banner"  id="date-standard" style="color:rgb(109 115 187);">Permanent</div>
<h3><div class ="title-banner" id="title-standard">Wanderlust Invocation - Keqing, Mona, Qiqi, Skyward Spine, etc (&#9733;&#9733;&#9733;&#9733;&#9733;)</div></h3>
<img src="../../images/banner/standard.png" alt="Wanderlust Invocation" class="center">
<?php
    require_once "database/connect.php";
    require_once "archive/wanderlust_invocation/wish_standard.php";
    require_once "archive/wanderlust_invocation/detail.php";
?>
    <div id="standardwish"></div>
    <form action="#standardwish" method="post">
    <p><button type = "submit" class="button" value = 1 name="stand">1x Wish</button>
    <button type = "submit" class="button" value = 10 name="stand">10x Wish</button>
    <button type = "submit" class="history" value = 1 name="historystand">History</button></p>
    </form>

    <?php

    if(isset($_POST["historystand"])){

        $sql = "SELECT * FROM history_standard WHERE id=$user_id ORDER BY roll DESC LIMIT 6 ";
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
            echo "<tr><th colspan='3' class='seehistory'><a href='/history/standard'>See More Detail</a></th></tr>";
            echo "</table>";
    }

    if(isset($_POST["stand"])){
        for ($var = 1; $var <= $_POST["stand"]; $var++){
            pityStandard();
            wishStandard();        
        }

    }else{
        ?>
        <table style="width:100%;text-align:center;">
            <tr>
                <th colspan="8" class="rateup" >Promotional Items</th>
            </tr>
            <tr class="rateuptumb">
                <td class = "star5">
                    <?php 
                        RateUpStandard(2);                    
                    ?>
                </td>
                <td class = "star5">
                    <?php 
                            RateUpStandard(3);                    
                    ?>
                </td>
                </td>
                <td class = "star5">
                    <?php 
                            RateUpStandard(4);                    
                    ?>
                </td>
                <td class = "star5">
                    <?php 
                            RateUpStandard(6);                    
                    ?>
                </td>
                </tr>
                <tr class="rateuptumb">
                <td class = "star5">
                    <?php 
                            RateUpStandard(8);                    
                    ?>
                </td>
                <td class = "star5">
                    <?php 
                            RateUpStandard(10);                    
                    ?>
                </td>
                <td class = "star5">
                    <?php 
                            RateUpStandard(12);                    
                    ?>
                </td>
                <td class = "star5">
                    <?php 
                            RateUpStandard(14);                    
                    ?>
                </td>
            </tr>
            <tr>
            <th colspan="8" class="seehistory" style="border:0px;"><a href="https://genshin-impact.fandom.com/wiki/Wanderlust_Invocation" target="_blank">See Detail in Wiki Page</a></th>
            </tr>
        </table>
        <?php
    }
    
    if(isset($_POST["stand"])){
        if($_POST["stand"]==10){
    ?>
        <form action="#standardwish" method="post">
        <p><button type = "submit" class="button" value = 1 name="stand">1x Wish</button>
        <button type = "submit" class="button" value = 10 name="stand">10x Wish</button>
        <button type = "submit" class="history" value = 1 name="historystand">History</button></p>
        </form>
    <?php }
    } ?>