<!-- gemaat door:
    God emperor Tijn
    The Empress Tom
    pleb Fin
-->
<?php
require './inc/functions.php';
html();
?>
<script src="./inc/jquery-3.6.0.js"></script>
<script src="./script/index.js" defer></script>
<link rel="stylesheet" href="./style/index.css">
</head>

<body id="indexBody" onload=onLoad() translate="no">
    <?php
    navbar("media/img/legitlogo.png", "pages/login.php", "index.php", "pages/private.php", "pages/logout.php", 'pages/public.php');
    ?>
    <div class="hypernewt"></div>
    <div class="hyperimg"><img src="./media/img/hypersonic gal transparent.png" alt=""></div>
    <center>
        <div class="indexContainer">
            <label class="indexMediaEmber"><strong>Media Ember</strong></label>
            <button onclick="window.location.href = 'pages/public.php'" class="indexPublicFileBtn">Public Files</button>
            <div class="wingLeft">
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
            </div>
            <div class="wingRight">
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
                <div class="feather"></div>
            </div>
        </div>
    </center>
    <?php
    footer("media/img/toastersLogo.png", "pages/contact.php", "pages/about.php");
    ?>
</body>
<!-- text for testing -->
</html>