<?php
require '../inc/functions.php';
html("../media/img/favicon.ico");
?>
<title>Media Ember - About</title>
<script src="../inc/jquery-3.6.0.js"></script>
<script src="../script/index.js" defer></script>
<link rel="stylesheet" href="../style/index.css">
</head>

<body id="indexBody" onload=>
    <?php
    navbar("../media/img/legitlogo.png", "login.php", "../index.php", "./private.php", "./logout.php", './public.php');
    ?>
    <div class="aboutContainer">
        <div class="aboutDivHolder1">
            <div class="aboutInfoDiv Toasternewt"><img src="../media/img/toastersLogo.png" alt="Toasters Logo">
                <div class="nameContainer">
                    <h1>Toasters inc</h1>
                    <p>We Toasters inc value our employees and customers from all places so we can all get along. we were a small company in the zeekees kingdom where we slowly grew. we currently have our main hq in the zeekees kingdom. we have also recently expanded into the twilight forest where we are still searching for new employees we are also important enough to ask for a audience with most rulers</p>
                </div>
            </div>
            <!-- Tom -->
            <div class="aboutInfoDiv" id="altBorder"><img id="image" class="imgAltBorder Jin" src="../media/img/jin pfp.png" alt="Tom">
                <div class="nameContainer">
                    <h1 class="TomText">Tom</h1>
                    <p class="TomText">my name is Tom im 18 years old and a first year software developer who specializes in javascript/react, my favorite color is a light soft pink with a close second of crimson. currently trying to learn game development with unity and c#. I like to play modded games like minecraft eternal/Advent of Ascention</p>
                </div>
            </div>
        </div>
        <!-- fin -->
        <div class="aboutDivHolder2">
            <div class="aboutInfoDiv"><img src="../media/img/SolidReaimu.png" alt="Fin">
                <div class="nameContainer">
                    <h1>Fin</h1>
                    <p>a student at the Roc TerAA</p>
                </div>
            </div>
            <!-- TIJN -->
            <div class="aboutInfoDiv"><img src="../media/img/20220419_090346.jpg" alt="Tijn">
                <div class="nameContainer">
                    <h1>Tijn</h1>
                    <p>The first and ony king of the ZeeKees kingdom an immortal being of infinite power. The ZeeKees Kingdom is where the ZeeKees Race lives. A rare species that only lives in low lying land on the world. this species has an avarage human intelligence but can make hasty decissions that can lead to unforseen actions. </p>
                </div>
            </div>
        </div>
    </div>
    <?php
    footer("../media/img/toastersLogo.png", "contact.php", "about.php");
    ?>
</body>

</html>