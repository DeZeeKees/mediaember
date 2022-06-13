<?php
require '../inc/functions.php';
html("../media/img/favicon.ico");
?>
<title>Media Ember - Share</title>
<script src="../script/index.js" defer></script>
<link rel="stylesheet" href="../style/index.css">
</head>
    <body id="indexBody">
        <?php
            navbar("../media/img/legitlogo.png", "login.php", "../index.php", "./private.php", "./logout.php", './public.php');
        ?>
        <div class="indexContainer" id="smaller">
            <button download="" class="indexPublicFileBtn">Public Files</button>
        </div>
        <?php
            footer("../media/img/toastersLogo.png", "contact.php", "about.php");
        ?>
    </body>
</html>