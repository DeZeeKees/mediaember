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
            <div class="N"><a href="../index.php"><img src="../media/img/legitlogo.png" alt=""></a></div>
            <div class="M"><?php sharePage(); ?></div>
        </div>  
        <?php
            footer("../media/img/toastersLogo.png", "contact.php", "about.php");
        ?>
    </body>
</html>