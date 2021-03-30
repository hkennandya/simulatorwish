<div class="preloader">
    <div class="loading">
        <img src="../../../images/loading.gif" width="80">
    </div>
</div> 

<form action="../../inventory" method="post">
    <button type = "submit" class="header-inventory" name="chara"><b>Inventory</b></button>
</form>
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
    <div class="header-content">
        <h2 class="title"><b>Simulator Wish</b></h2>
        <p>Program Wish Simulation of Genshin Impact @keqingcu</p>
    
    </div></div>

    <div class="container">
    <div class="topnav" id="navbar">
            <a href="../../../">Home</a>
            <a href="../../../#character">Character</a>
            <a href="../../../#weapon">Weapon</a>
            <a href="../../../#standard">Standard</a>
            <a href="../../../#news">News</a>
            <div class="dropdown">
                <button class="dropbtn">History
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="../../../history/character">Character Wish</a>
                    <a href="../../../history/weapon">Weapon Wish</a>
                    <a href="../../../history/standard">Standard Wish</a>
                    <a href="../../../history/beginners">Beginners' Wish</a>
                </div>
            </div>
            <a href="../../../archive">Archive</a>
        </div>
    </div>
    

    <div class="container">
    <div class="bottom-header">
        <i>For Genshin Impact Version 1.4</i>
    </div></div>