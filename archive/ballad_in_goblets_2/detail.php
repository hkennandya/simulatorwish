<?php

require_once "./database/connect.php";

function RateUpCharacter($setid){
    global $conn;
    $sql = "SELECT * FROM ballad_in_goblets_2 WHERE id=$setid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    echo "<img src='../../images/" . $row["image"] . "' float:center;margin-right:3%;'></br>";
    echo "<div style='padding-top:10px'>";
    echo $row["name"] . "</br>";
    echo $row["tier"];
    echo "</div>";
}

?>