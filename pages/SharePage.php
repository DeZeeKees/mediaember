<?php
require '../inc/functions.php';
html("../media/img/favicon.ico");
?>
<title>Media Ember - Share</title>
<script src="../script/index.js" defer></script>
<script src="../inc/jquery-3.6.0.js"></script>
<link rel="stylesheet" href="../style/index.css">
</head>
    <body onload=shareOnload()>
        <div class="sharePageContainer">
        <div class="N"></div>
        <div class="M"></div>
        </div>  
                <?php sharePage(); ?>
                <button download="" class="sharePageBtn">Download</button>

        <?php
            footer("../media/img/toastersLogo.png", "contact.php", "about.php");
        ?>
    </body>
</html>