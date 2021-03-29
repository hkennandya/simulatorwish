<?php
require_once "./database/connect.php";

function pityweapon(){
    global $conn, $user_id;

    $sql = "SELECT * FROM pity_weapon WHERE id=$user_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($row["pity_4s"] < 9){
        $updatePITY4s = "UPDATE pity_weapon SET pity_4s=pity_4s+1 WHERE id=$user_id";
        $conn->query($updatePITY4s);
    } else if ($row["pity_4s"] >= 9){
        $updatePITY4s = "UPDATE pity_weapon SET pity_4s=0 WHERE id=$user_id";
        $conn->query($updatePITY4s);
    }

    if ($row["pity_5s"] < 79){
        $updatePITY5s = "UPDATE pity_weapon SET pity_5s=pity_5s+1 WHERE id=$user_id";
        $conn->query($updatePITY5s);
    } else if ($row["pity_5s"] >= 79){
        $updatePITY5s = "UPDATE pity_weapon SET pity_5s=0 WHERE id=$user_id";
        $conn->query($updatePITY5s);
    }

    $updateROLL = "UPDATE pity_weapon SET roll=roll+1 WHERE id=$user_id";
    $conn->query($updateROLL);
}

function pityDetailweapon(){
    global $conn, $user_id;
    $sql = "SELECT * FROM pity_weapon WHERE id=$user_id";
    $result = $conn->query($sql);
    
    $row = $result->fetch_assoc();
        echo "</br></br></b>";
        echo "<i style='float:right;'>[ Roll : " . $row["roll"];
        echo " ][ 4-Star Pity : " . $row["pity_4s"];
        echo " ][ 5-Star Pity : " . $row["pity_5s"] . " ]</i></br>";
}

function UpdateINWEP(){
    global $conn, $user_id;
    //Update item not found
    $updateIN = "UPDATE user_inventory SET image=' ' WHERE name='Item' && id=$user_id";
    $conn->query($updateIN);
}

?>