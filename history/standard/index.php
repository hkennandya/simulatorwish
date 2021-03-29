<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <title>History Standard - Simulator Wish Genshin Impact</title>
    <link rel="icon" href="../../../images/icon.jpg">
    <link rel="stylesheet" href="../../style.css">
<script src="http://code.jquery.com/jquery-2.2.1.min.js"></script>
    <script>
        $(document).ready(function(){
        $(".preloader").fadeOut();
        })
    </script>
</head>
<body id="top">
    <button onclick="topFunction()" id="myBtn" title="Go to top"class="up-sign"><b>▲</b></button>

    <script>
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
    }
    </script>
    <div class="container">
    <div class="history-content">

    <form action="javascript:window.history.back()" method="post">
    <p><button type = "submit" class="button">Back</button>
    </form>
            <?php
                require_once "../../database/connect.php";
                
                $sql = "SELECT * FROM history_standard WHERE id=$user_id ORDER BY roll DESC";
                $result = $conn->query($sql);
                echo "<table class='history-six'>";
                echo "<tr><th colspan='4' class='history-six-title'>History</th></tr>";
                echo "<tr>";
                echo "<th class='history-six-menu'>X</th>
                    <th class='history-six-menu'>Tier</th>                    
                    <th class='history-six-menu'>Item Name</th>
                    <th class='history-six-menu'>Time Received</th";
                echo "</tr>";
                $a = 0;
                    while($row = $result->fetch_assoc()){
                            $a++;
                                echo "<tr>";
                                    echo "<td class='history-number'>" . $a . "</td>";
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
                    echo "<tr><th colspan='4' class='seehistory'><a href='javascript:window.history.back()'>Back</a></th></tr>";
                    echo "</table>";
            
            ?>
    </div>
    </div>

</body>
</html>