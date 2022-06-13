<?php
require '../inc/functions.php';
html("../media/img/favicon.ico");
?>
<title>Media Ember - Share</title>
<script src="../script/index.js" defer></script>
<script src="../inc/jquery-3.6.0.js"></script>
<link rel="stylesheet" href="../style/index.css">
</head>
    <body id="indexBody" onload=shareOnload()>
        <div class="sharePageContainer">
            <a class="navBarA" href="../index.php"><img id="logo" src="../media/img/legitlogo.png"></a>
            <div class="DarkContainer">
                <?php sharePage(); ?>
                <button download="" class="sharePageBtn">Download</button>
            </div>
        </div>
        <?php

            footer("../media/img/toastersLogo.png", "contact.php", "about.php");
        ?>
    </body>
</html>