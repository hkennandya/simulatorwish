<div class="event-banner" style="color:#efdc95;"><i>&#10022; Beginners' Wish</i></div>
<div class="date-banner"  id="date-standard" style="color:#efdc95;">Expires after 20 pull</div>
<h3><div class ="title-banner" id="title-standard">Beginners' Wish - Noelle (&#9733;&#9733;&#9733;&#9733;)</div></h3>
<img src="../../images/banner/beginners_wish.jpg" alt="Beginners' Wish" class="center">
<?php
    require_once "database/connect.php";
    require_once "archive/beginners_wish/wish_beginners.php";
    require_once "archive/beginners_wish/detail.php";
    $sql = "SELECT * FROM pity_beginners WHERE id=$user_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

?>
    <div id="beginnerswish"></div>
    <form action="#beginnerswish" method="post">
    <p><button type = "submit" class="button" value = 10 name="begin">10x Wish</button>
    <button type = "submit" class="history" value = 1 name="historybegin">History</button></p>
    </form>

    <?php


    if(isset($_POST["historybegin"])){

        $sql = "SELECT * FROM history_beginners WHERE id=$user_id ORDER BY roll DESC LIMIT 6 ";
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
            echo "<tr><th colspan='3' class='seehistory'><a href='/history/beginners'>See More Detail</a></th></tr>";
            echo "</table>";
    }

    if(isset($_POST["begin"])){
        for ($var = 1; $var <= $_POST["begin"]; $var++){
            pityBeginners();
            wishBeginners();        
        }

    }else{
        ?>
        <table style="width:100%;text-align:center;">
            <tr>
                <th colspan="8" class="rateup" >Promotional Items</th>
            </tr>
            <tr class="rateuptumb">
                <td class = "star4">
                    <?php 
                        RateUpBeginners(16);                    
                    ?>
                </td>
                <td style="width:75%">Beginners' Wish expires after 20 attempts/pulls.</br> After the wish expires, the page will disappear.</td>
                </tr>
            <tr>
            <th colspan="8" class="seehistory" style="border:0px;"><a href="https://genshin-impact.fandom.com/wiki/Beginners%27_Wish" target="_blank">See Detail in Wiki Page</a></th>
            </tr>
        </table>
        <?php
    }
        $sql = "SELECT * FROM pity_beginners WHERE id=$user_id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

    if(isset($_POST["begin"])){
        if($_POST["begin"]==10 && $row["roll"] < 20){
    ?>
        <form action="#beginnerswish" method="post">
        <p><button type = "submit" class="button" value = 10 name="begin">10x Wish</button>
        <button type = "submit" class="history" value = 1 name="historybegin">History</button></p>
        </form>
    <?php } else {
        ?>
            <div id="beginnerswish"></div>
            <p class="begin-alert" style="text-align: center;">Reload in <span id="countrefresh"></span></br>
            After 20 pulls, Beginners' Wish in home page will not work and disappear.</br>
            If you want to pulls again please go to <a href="../../../archive">archive</a></br></p>
            <form action="#beginners/" method="post">
            <p><button type = "submit" class="button" value = 10 name="begin">10x Wish</button>
            <button type = "submit" class="history" value = 1 name="historybegin">History</button></p>
                <script>
                (function countdown(remaining) {
                if(remaining <= 0)
                    location.reload(true);
                document.getElementById('countrefresh').innerHTML = remaining;
                setTimeout(function(){ countdown(remaining - 1); }, 1000);
                })(15); // 5 seconds
                </script>
            </form>
        <?php
    }
    } ?>