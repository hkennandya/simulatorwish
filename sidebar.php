<?php
        if(isset($_POST["reset"])==true){
                
                //Update Inventory
                $sql = "UPDATE user_inventory SET number=0 WHERE id=$user_id";
                $conn->query($sql);
        }
?>

<div id="reset"></div>
<div class="sidebar">
    <p class="text-sidebar"><i>&#10022; Inventory</i></p>

    <form action ="#reset"method="post" class="sideb">
    <p>
    <?php 
        $sql = "SELECT * FROM user_inventory WHERE id=$user_id ORDER BY number DESC";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if($row['number']>0){
    ?>
        <button type = "submit" class="side-button" value = 1 name="reset">Reset</button>
    <?php 
        } else{ ?>
            <button type="button" class="side-button-disabled" disabled>Reset</button>
        <?php }
    ?>
    </p>
    </form>

    <?php

    if(isset($_POST["reset"])==true){
                
                //Update Inventory
                $sql = "UPDATE user_inventory SET number=0 WHERE id=$user_id";
                $conn->query($sql);
                
                //Update pity
                $updatePITY4s = "UPDATE pity_character SET pity_4s=0 WHERE id=$user_id";
                $conn->query($updatePITY4s);
                $updatePITY5s = "UPDATE pity_character SET pity_5s=0 WHERE id=$user_id";
                $conn->query($updatePITY5s);
                $updateROLL = "UPDATE pity_character SET roll=0 WHERE id=$user_id";
                $conn->query($updateROLL);

                $updatePITY4s = "UPDATE pity_weapon SET pity_4s=0 WHERE id=$user_id";
                $conn->query($updatePITY4s);
                $updatePITY5s = "UPDATE pity_weapon SET pity_5s=0 WHERE id=$user_id";
                $conn->query($updatePITY5s);
                $updateROLL = "UPDATE pity_weapon SET roll=0 WHERE id=$user_id";
                $conn->query($updateROLL);

                $updatePITY4s = "UPDATE pity_standard SET pity_4s=0 WHERE id=$user_id";
                $conn->query($updatePITY4s);
                $updatePITY5s = "UPDATE pity_standard SET pity_5s=0 WHERE id=$user_id";
                $conn->query($updatePITY5s);
                $updateROLL = "UPDATE pity_standard SET roll=0 WHERE id=$user_id";
                $conn->query($updateROLL);

                $updatePITY4s = "UPDATE pity_beginners SET pity_4s=0 WHERE id=$user_id";
                $conn->query($updatePITY4s);
                $updatePITY5s = "UPDATE pity_beginners SET pity_5s=0 WHERE id=$user_id";
                $conn->query($updatePITY5s);
                $updateROLL = "UPDATE pity_beginners SET roll=0 WHERE id=$user_id";
                $conn->query($updateROLL);

                //Update item not found
                $updateIN = "UPDATE user_inventory SET image='<div class=menu>Item not found</br></div>' WHERE name='item' && id=$user_id";
                $conn->query($updateIN);

                //Delet all history
                $deletehistory = "DELETE FROM history_weapon WHERE id=$user_id";
                $conn->query($deletehistory);

                $deletehistory = "DELETE FROM history_character WHERE id=$user_id";
                $conn->query($deletehistory);

                $deletehistory = "DELETE FROM history_standard WHERE id=$user_id";
                $conn->query($deletehistory);

                $deletehistory = "DELETE FROM history_beginners WHERE id=$user_id";
                $conn->query($deletehistory);

    }else{

    }
    require_once "inventory.php"; 
    ?>
</div>