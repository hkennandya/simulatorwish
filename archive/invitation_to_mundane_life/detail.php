<?php

require_once "./database/connect.php";

function RateUpCharacter($setid){
    global $conn;
    $sql = "SELECT * FROM invitation_to_mundane_life WHERE id=$setid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    echo "<img src='../../images/" . $row["image"] . "' float:center;margin-right:3%;'></br>";
    echo "<div style='padding-top:10px'>";
    echo $row["name"] . "</br>";
    echo $row["tier"];
    echo "</div>";
}

?>