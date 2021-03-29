<?php

    $servername = "sql111.epizy.com";
    $username = "epiz_28212656";
    $password = "efgDBGV7XF";
    $dbname = "epiz_28212656_simulator_wish";

    $conn = new mysqli($servername, $username, $password, $dbname);

    //Get visitor IP
    $IP = $_SERVER['REMOTE_ADDR'];

    //Cek visitor IP
    $cek = "SELECT * FROM users WHERE ip='$IP'";
    $cekip = $conn->query($cek);
    $user_ip = $cekip->fetch_assoc();

    //Cek apakah IP belum  ada akan dibuatkan user id
    if(mysqli_num_rows($cekip) == false){
        $newip = "INSERT INTO users (ip)
        VALUES ('$IP')";
        $conn->query($newip);

        //mendapatkan id sesuai IP
        $cekip = $conn->query($cek);
        $user_ip = $cekip->fetch_assoc();
        $user_id = $user_ip["id"];

        //insert pity chara
        $newpity = "INSERT INTO pity_character(roll,pity_4s, pity_5s, grad)
        VALUES (0, 0, 0, 0)";
        $conn->query($newpity);

        //insert pity weapon
        $newpityweap = "INSERT INTO pity_weapon(roll,pity_4s, pity_5s, grad)
        VALUES (0, 0, 0, 0)";
        $conn->query($newpityweap);

        //insert pity standard
        $newpitystand = "INSERT INTO pity_standard(roll,pity_4s, pity_5s, grad)
        VALUES (0, 0, 0, 0)";
        $conn->query($newpitystand);

        //insert pity beginners
        $newpitystand = "INSERT INTO pity_beginners(roll,pity_4s, pity_5s, grad)
        VALUES (0, 0, 0, 0)";
        $conn->query($newpitystand);

        /*//insert inventory from character
        $newinv = "INSERT INTO user_inventory (id, name, tier, image, main, secondary)
        SELECT   0, name, tier, image, main, secondary FROM datacharacter";
        $conn->query($newinv);
        //Update inventory untuk setiap user
        $updatenewin = "UPDATE user_inventory SET id=$user_id WHERE id=0";
        $conn->query($updatenewin);*/

    //Jika IP sudah ada
    }else{
        
        //mendapatkan id sesuai IP
        $cekip = $conn->query($cek);
        $user_ip = $cekip->fetch_assoc();
        $user_id = $user_ip["id"];
    }

    /////////////////////////////////////////////////
    //update data sesuai banner
    //VERSION 1.0
        //Venti
    $charactertodata = "INSERT IGNORE INTO datacharacter (name, tier, image, main, secondary) 
    SELECT name, tier, image, main, secondary FROM ballad_in_goblets";
    $conn->query($charactertodata);

    $weapontodata = "INSERT IGNORE INTO datacharacter (name, tier, image, main, secondary) 
    SELECT name, tier, image, main, secondary FROM epitome_invocation";
    $conn->query($weapontodata);

        //Klee
    $charactertodata = "INSERT IGNORE INTO datacharacter (name, tier, image, main, secondary) 
    SELECT name, tier, image, main, secondary FROM sparkling_steps";
    $conn->query($charactertodata);

    $weapontodata = "INSERT IGNORE INTO datacharacter (name, tier, image, main, secondary) 
    SELECT name, tier, image, main, secondary FROM epitome_invocation_2";
    $conn->query($weapontodata);

    //VERSION 1.1
        //Tartaglia
    $charactertodata = "INSERT IGNORE INTO datacharacter (name, tier, image, main, secondary) 
    SELECT name, tier, image, main, secondary FROM farewell_of_snezhnaya";
    $conn->query($charactertodata);

    $weapontodata = "INSERT IGNORE INTO datacharacter (name, tier, image, main, secondary) 
    SELECT name, tier, image, main, secondary FROM epitome_invocation_3";
    $conn->query($weapontodata);

        //Zhongli
    $charactertodata = "INSERT IGNORE INTO datacharacter (name, tier, image, main, secondary) 
    SELECT name, tier, image, main, secondary FROM gentry_of_hermitage";
    $conn->query($charactertodata);

    $weapontodata = "INSERT IGNORE INTO datacharacter (name, tier, image, main, secondary) 
    SELECT name, tier, image, main, secondary FROM epitome_invocation_4";
    $conn->query($weapontodata);

    //VERSION 1.2
        //Albedo
    $charactertodata = "INSERT IGNORE INTO datacharacter (name, tier, image, main, secondary) 
    SELECT name, tier, image, main, secondary FROM secretum_secretorum";
    $conn->query($charactertodata);

    $weapontodata = "INSERT IGNORE INTO datacharacter (name, tier, image, main, secondary) 
    SELECT name, tier, image, main, secondary FROM epitome_invocation_5";
    $conn->query($weapontodata);

        //Ginyu
    $charactertodata = "INSERT IGNORE INTO datacharacter (name, tier, image, main, secondary) 
    SELECT name, tier, image, main, secondary FROM adrift_in_the_harbor";
    $conn->query($charactertodata);

    $weapontodata = "INSERT IGNORE INTO datacharacter (name, tier, image, main, secondary) 
    SELECT name, tier, image, main, secondary FROM epitome_invocation_6";
    $conn->query($weapontodata);

    //VERSION 1.3
        //Xiao
    $charactertodata = "INSERT IGNORE INTO datacharacter (name, tier, image, main, secondary) 
    SELECT name, tier, image, main, secondary FROM invitation_to_mundane_life";
    $conn->query($charactertodata);

    $weapontodata = "INSERT IGNORE INTO datacharacter (name, tier, image, main, secondary) 
    SELECT name, tier, image, main, secondary FROM epitome_invocation_7";
    $conn->query($weapontodata);

        //Keqing
    $charactertodata = "INSERT IGNORE INTO datacharacter (name, tier, image, main, secondary) 
    SELECT name, tier, image, main, secondary FROM dance_of_lanterns";
    $conn->query($charactertodata);

    $weapontodata = "INSERT IGNORE INTO datacharacter (name, tier, image, main, secondary) 
    SELECT name, tier, image, main, secondary FROM epitome_invocation_8";
    $conn->query($weapontodata);

        //Hu Tao
    $charactertodata = "INSERT IGNORE INTO datacharacter (name, tier, image, main, secondary) 
    SELECT name, tier, image, main, secondary FROM moment_of_bloom";
    $conn->query($charactertodata);
    
    // VERSION 1.4
        //Venti
    $charactertodata = "INSERT IGNORE INTO datacharacter (name, tier, image, main, secondary) 
    SELECT name, tier, image, main, secondary FROM ballad_in_goblets_2";
    $conn->query($charactertodata);

    $weapontodata = "INSERT IGNORE INTO datacharacter (name, tier, image, main, secondary) 
    SELECT name, tier, image, main, secondary FROM epitome_invocation_9";
    $conn->query($weapontodata);


    //ALL VERSION
    $standardtodata = "INSERT IGNORE INTO datacharacter (name, tier, image, main, secondary) 
    SELECT name, tier, image, main, secondary FROM wanderlust_invocation";
    $conn->query($standardtodata);

    $standardtodata = "INSERT IGNORE INTO datacharacter (name, tier, image, main, secondary) 
    SELECT name, tier, image, main, secondary FROM beginners_wish";
    $conn->query($standardtodata);


    /////////////////////////////////////////////////



    //insert datacharacter item ke user_inventory
    $newinv = "INSERT IGNORE INTO user_inventory (id, name, tier, image, main, secondary) SELECT $user_id, name, tier, image, main, secondary FROM datacharacter;";
    $conn->query($newinv);

    //update tanggal user terakhir kali mengakses
    date_default_timezone_set("Asia/Jakarta");
    $getdateuser = date("Y-m-d H:i:s");
    $datetouser = "UPDATE users SET date = '$getdateuser' WHERE id = $user_id";
    $conn->query($datetouser);
    /*insert banner chara  ke history chara    
    $datatocharacter = "INSERT IGNORE INTO history_character (id, name, tier) 
    SELECT $user_id, name, tier FROM ballad_in_goblets_2";
    $conn->query($datatocharacter);*/

?>