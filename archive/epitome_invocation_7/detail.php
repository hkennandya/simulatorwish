<?php

require_once "./database/connect.php";

function RateUpWeapon($setid){
    global $conn;
    $sql = "SELECT * FROM epitome_invocation_7 WHERE id=$setid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    echo "<img src='../../images/" . $row["image"] . "' style='float:center;margin-right:3%;'></br>";
    echo "<div style='padding-top:10px'>";
    if(strlen($row["name"])<=6){
        $more = "";
    }else{
        $more = "...";
    }
    echo substr($row["name"], 0, 6) ."" .$more;
    echo "</br>" . $row["tier"];
    echo "</div>";
}

?>