<?php

require_once "archive/farewell_of_snezhnaya_2/pity_character.php";
$number;

function wish(){

    global $conn, $row, $grad, $number, $user_id;

    $sql = "SELECT * FROM pity_character WHERE id=$user_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $grad = $row["grad"];
    $pity4s = $row["pity_4s"];
    $pity5s = $row["pity_5s"];

    //Graduated 5-Star
    if ($pity5s == 0){
        $number = rand(9931,10000);
    }
    //Graduated 4-Star
    else if ($pity4s == 0){
        $number = rand(9540,9930);
    } 
    //Soft Pity 70-75
    else if($pity5s >= 70){
        $number = rand(9000,10000);
    }
    //Soft Pity 75-80
    else if($pity5s >= 75){
        $number = rand(9700,10000);
    }
    //Soft Pity 80-85
    else if($pity5s >= 80){
        $number = rand(8000,10000);
    }
    else {
        $number = rand(1,10000);
    }
    if($number>9430 && $number<=9930){
        echo "<div class='wish' style='background-color:#4a184c;'>";
    }
    else if($number>9880){
        echo "<div class='wish' style='background-color:#736a19;'>";
    }else{
        echo "<div class='wish'>";
    }

    $name = "name";
    $tier = "tier";
    $image = "image";
    echo "<b>";
    //Percentage 3-Star Weapon
    if($number <= 9430){
        $random = rand(39,51);
 
        $sql = "SELECT * FROM farewell_of_snezhnaya_2 WHERE id=$random";
        $result = $conn->query($sql);
    
        while($row = $result->fetch_assoc()) {
            echo "<h3>You Got : ";
            echo "<span style='color:DodgerBlue;'>";
            echo $row[$tier] . " - ";
            echo $row[$name] . " (Weapon) </br>";
            echo "</span></h3>";
            echo "<img src='../../images/" . $row[$image] . "' style='height:100px;float:left;margin-right:3%;'>";
            //stat Detail
            echo "</b><div style='font-size:110%;'>" . $row["main"] . "</br>";
            echo $row["secondary"] . "</br></div><b>";

            //roll Detail
            pityDetail();
            UpdateIN();
            echo "<b>";

            //update user inventory
            $rownamereal = $conn->real_escape_string($row[$name]); //Agar nilai petik bisa diinput ke tabel sql
            $updateInv = "UPDATE user_inventory SET number=number+1 WHERE name='$rownamereal' && id=$user_id";
            $conn->query($updateInv);

            //update history chara
            $getdate = date("Y-m-d H:i:s");
            $rownamereal = $conn->real_escape_string($row[$name]); //Agar nilai petik bisa diinput ke tabel sql
            $updateHistory = "INSERT INTO history_character (id, name, tier, date) 
            VALUES ($user_id, '$rownamereal', '$row[$tier]', '$getdate')";
            $conn->query($updateHistory);
        }


    }
    //Percentage 4-Star Rate Up Character
    else if($number <= 9720){
        $random = rand(18,20);
 
        $sql = "SELECT * FROM farewell_of_snezhnaya_2 WHERE id=$random";
        $result = $conn->query($sql);
    
        while($row = $result->fetch_assoc()) {
            echo "<h3>You Got : ";
            echo "<span style='color:Violet;'>";
            echo $row["tier"] . " - ";
            echo $row[$name] . " (Character) </br>";
            echo "</span></h3>";
            echo "<img src='../../images/" . $row["image"] . "' style='height:100px;float:left;margin-right:3%;'>";
            //stat Detail
            echo "</b><div style='font-size:110%;'>" . $row["main"] . "</br>";
            echo $row["secondary"] . "</br></div><b>";

            //roll Detail
            pityDetail();
            UpdateIN();
            echo "<b>";
            
            //update user inventory
            $rownamereal = $conn->real_escape_string($row[$name]); //Agar nilai petik bisa diinput ke tabel sql
            $updateInv = "UPDATE user_inventory SET number=number+1 WHERE name='$rownamereal' && id=$user_id";
            $conn->query($updateInv);

            //update history chara
            $getdate = date("Y-m-d H:i:s");
            $rownamereal = $conn->real_escape_string($row[$name]); //Agar nilai petik bisa diinput ke tabel sql
            $updateHistory = "INSERT INTO history_character (id, name, tier, date) 
            VALUES ($user_id, '$rownamereal', '$row[$tier]', '$getdate')";
            $conn->query($updateHistory);
        }
        $updatePITY4s = "UPDATE pity_character SET pity_4s=0 WHERE id=$user_id";
        $conn->query($updatePITY4s);
    }
    //Percentage 4-Star Non Rate Up Character
    else if ($number <=9880) {
        $random = rand(7,17);
 
        $sql = "SELECT * FROM farewell_of_snezhnaya_2 WHERE id=$random";
        $result = $conn->query($sql);
    
        while($row = $result->fetch_assoc()) {
            echo "<h3>You Got : ";
            echo "<span style='color:Violet;'>";
            echo $row["tier"] . " - ";
            echo $row[$name] . " (Character) </br>";
            echo "</span></h3>";
            echo "<img src='../../images/" . $row["image"] . "' style='height:100px;float:left;margin-right:3%;'>";
            //stat Detail
            echo "</b><div style='font-size:110%;'>" . $row["main"] . "</br>";
            echo $row["secondary"] . "</br></div><b>";

            //roll Detail
            pityDetail();
            UpdateIN();
            echo "<b>";
                  
            //update user inventory
            $rownamereal = $conn->real_escape_string($row[$name]); //Agar nilai petik bisa diinput ke tabel sql
            $updateInv = "UPDATE user_inventory SET number=number+1 WHERE name='$rownamereal' && id=$user_id";
            $conn->query($updateInv);

            //update history chara
            $getdate = date("Y-m-d H:i:s");
            $rownamereal = $conn->real_escape_string($row[$name]); //Agar nilai petik bisa diinput ke tabel sql
            $updateHistory = "INSERT INTO history_character (id, name, tier, date) 
            VALUES ($user_id, '$rownamereal', '$row[$tier]', '$getdate')";
            $conn->query($updateHistory);
        }
        $updatePITY4s = "UPDATE pity_character SET pity_4s=0 WHERE id=$user_id";
        $conn->query($updatePITY4s);
    }
   //Percentage 4-Star Non Rate Up Weapon
   else if ($number <=9930) {   
        $random = rand(21,38);

        $sql = "SELECT * FROM farewell_of_snezhnaya_2 WHERE id=$random";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()) {
            echo "<h3>You Got : ";
            echo "<span style='color:Violet;'>";
            echo $row["tier"] . " - ";
            echo $row[$name] . " (Weapon) </br>";
            echo "</span></h3>";
            echo "<img src='../../images/" . $row["image"] . "' style='height:100px;float:left;margin-right:3%;'>";
            //stat Detail
            echo "</b><div style='font-size:110%;'>" . $row["main"] . "</br>";
            echo $row["secondary"] . "</br></div><b>";

            //roll Detail
            pityDetail();
            UpdateIN();
            echo "<b>";

            //update user inventory
            $rownamereal = $conn->real_escape_string($row[$name]); //Agar nilai petik bisa diinput ke tabel sql
            $updateInv = "UPDATE user_inventory SET number=number+1 WHERE name='$rownamereal' && id=$user_id";
            $conn->query($updateInv);

            //update history chara
            $getdate = date("Y-m-d H:i:s");
            $rownamereal = $conn->real_escape_string($row[$name]); //Agar nilai petik bisa diinput ke tabel sql
            $updateHistory = "INSERT INTO history_character (id, name, tier, date) 
            VALUES ($user_id, '$rownamereal', '$row[$tier]', '$getdate')";
            $conn->query($updateHistory);
        }
        $updatePITY4s = "UPDATE pity_character SET pity_4s=0 WHERE id=$user_id";
        $conn->query($updatePITY4s);
    }
    //Percentage 5-Star Rate Up Character
    else if($number <= 9960 or $grad==1){
        $random = 1;
 
        $sql = "SELECT * FROM farewell_of_snezhnaya_2 WHERE id=$random";
        $result = $conn->query($sql);
    
        while($row = $result->fetch_assoc()) {
            echo "<h3>You Got : ";
            echo "<span style='color:Gold;'>";
            echo $row["tier"] . " - ";
            echo $row[$name] . " (Character) </br>";
            echo "</span></h3>";
            echo "<img src='../../images/" . $row["image"] . "' style='height:100px;float:left;margin-right:3%;'>";
            //stat Detail
            echo "</b><div style='font-size:110%;'>" . $row["main"] . "</br>";
            echo $row["secondary"] . "</br></div><b>";

            //roll Detail
            pityDetail();
            UpdateIN();
            echo "<b>";
                      
            //update user inventory
            $rownamereal = $conn->real_escape_string($row[$name]); //Agar nilai petik bisa diinput ke tabel sql
            $updateInv = "UPDATE user_inventory SET number=number+1 WHERE name='$rownamereal' && id=$user_id";
            $conn->query($updateInv);   
            
            //update history chara
            $getdate = date("Y-m-d H:i:s");
            $rownamereal = $conn->real_escape_string($row[$name]); //Agar nilai petik bisa diinput ke tabel sql
            $updateHistory = "INSERT INTO history_character (id, name, tier, date) 
            VALUES ($user_id, '$rownamereal', '$row[$tier]', '$getdate')";
            $conn->query($updateHistory);
        }
        $updatePITY5s = "UPDATE pity_character SET pity_5s=0 WHERE id=$user_id";
        $conn->query($updatePITY5s);
        $gradNEW = "UPDATE pity_character SET grad=0 WHERE id=$user_id";
        $conn->query($gradNEW);
    }
    //Percentage 5-Star Non Rate Up Character
    else if($number <= 10000){
        $random = rand(2,6);
 
        $sql = "SELECT * FROM farewell_of_snezhnaya_2 WHERE id=$random";
        $result = $conn->query($sql);
    
        while($row = $result->fetch_assoc()) {
            echo "<h3>You Got : ";
            echo "<span style='color:Gold;'>";
            echo $row["tier"] . " - ";
            echo $row[$name] . " (Character) </br>";
            echo "</span></h3>";
            echo "<img src='../../images/" . $row["image"] . "' style='height:100px;float:left;margin-right:3%;'>";
            //stat Detail
            echo "</b><div style='font-size:110%;'>" . $row["main"] . "</br>";
            echo $row["secondary"] . "</br></div><b>";

            //roll Detail
            pityDetail();
            UpdateIN();
            echo "<b>";
                    
            //update user inventory
            $rownamereal = $conn->real_escape_string($row[$name]); //Agar nilai petik bisa diinput ke tabel sql
            $updateInv = "UPDATE user_inventory SET number=number+1 WHERE name='$rownamereal' && id=$user_id";
            $conn->query($updateInv);
            
            //update history chara
            $getdate = date("Y-m-d H:i:s");
            $rownamereal = $conn->real_escape_string($row[$name]); //Agar nilai petik bisa diinput ke tabel sql
            $updateHistory = "INSERT INTO history_character (id, name, tier, date) 
            VALUES ($user_id, '$rownamereal', '$row[$tier]', '$getdate')";
            $conn->query($updateHistory);
        }
        $updatePITY5s = "UPDATE pity_character SET pity_5s=0 WHERE id=$user_id";
        $conn->query($updatePITY5s);
        $gradNEW = "UPDATE pity_character SET grad=1 WHERE id=$user_id";
        $conn->query($gradNEW);
    }
    echo "</b>";
    echo "</div>";
}

?>