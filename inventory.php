<?php

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



    echo "<p><img src='../../images/" . $row["image"] . "' alt='sa' style='height:50;width:50;'></br>";

    if(strlen($row["name"])<=10){
        $more = "";
    }else{
        $more = "...";
    }
    echo substr($row["name"], 0, 10) ."" .$more;
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