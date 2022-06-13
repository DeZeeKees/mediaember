<?php
require '../inc/functions.php';
html("../media/img/favicon.ico");
session_start();
?>
<title>Media Ember - Public Files</title>
<script src="../script/index.js" defer></script>
<script src="../inc/jquery-3.6.0.js"></script>
<link rel="stylesheet" href="../style/index.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body id="indexBody" onload=privateAndPublicOnload()>
    <div class="filterScreen">
        <form method="POST">
            <p class="filterHead">Filter by file extention</p>
            <ul class="none">
                <li>
                    <input type="radio" class="form-check-input pointer" value="" name="filterItem" checked="checked">
                    <label for="html">none</label>
                </li>
                <?php PublicDynamicFilter() ?>
                <li class="toopltip">
                    <button type="submit" class="filterButton"><span class="pointer material-symbols-outlined closeFilter">close</span></button>
                </li>
            </ul>
        </form>
    </div>
    <?php navbar("../media/img/legitlogo.png", "login.php", "../index.php", "./private.php", "./logout.php", './public.php'); ?>
    <div class="public-Container">
        <div>
            <ul class="buttons">
                <li class="tooltip">
                    <span class="tooltiptext">Filter Items</span>
                    <button class="filterButton filter1 pointer filter"><span class="material-symbols-outlined filterBtn">filter_alt</span></button>
                </li>
            </ul>
        </div>
        <div class="itemsContainer">
            <div class="actualItemsContainer">
            <?php printPublicItems() ?>
            </div>
        </div>
    </div>
</body>

</html>
