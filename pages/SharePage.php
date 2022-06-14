<?php
require '../inc/functions.php';
html("../media/img/favicon.ico");
?>
<title>Media Ember - Share</title>
<script src="../script/index.js" defer></script>
<script src="../inc/jquery-3.6.0.js"></script>
<link rel="stylesheet" href="../style/index.css">
</head>
    <body class="sharePageBody" onload=shareOnload()>
        <div class="sharePageContainer">
            <div class="N"><a class="sharePageHref" href="../index.php"><img class="logo" src="../media/img/legitlogo.png" alt=""></a></div>
            <div class="M">
                <div class="fileInfo">
                    <?php sharePage(); ?>
                </div>
                <div class="filePreview">
                    <center>
                        <?php sharePagePreview() ?>
                    </center>
                </div>
            </div>
        </div>  
        <?php
            footer("../media/img/toastersLogo.png", "contact.php", "about.php");
        ?>
    </body>
</html>