<?php
require '../inc/functions.php';
html();
?>
<script src="../script/index.js" defer></script>
<script src="../inc/jquery-3.6.0.js"></script>
<link rel="stylesheet" href="../style/index.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body id="indexBody" onload=privateAndPublicOnload()>
    <div class="filterScreen"></div>
    <?php navbar("../media/img/legitlogo.png", "login.php", "../index.php", "./private.php", "./logout.php", './public.php'); ?>
    <div class="public-Container">
        <div>
            <ul class="buttons">
                <li class="tooltip">
                    <span class="tooltiptext">Download File</span>
                    <button class="filterButton filter1"><span class="material-symbols-outlined">download</span></button>
                </li>
                <li class="tooltip">
                    <span class="tooltiptext">Filter Items</span>
                    <button class="filterButton filter1"><span class="material-symbols-outlined">filter_alt</span></button>
                </li>
            </ul>
        </div>
        <div class="itemsContainer">
            <div class="filterBar">
                <div></div>
                <button class="filterButton filter1"><span class="material-symbols-outlined">sort</span></button>
                <button class="filterButton filter2"><span class="material-symbols-outlined">sort</span></button>
                <button class="filterButton filter3"><span class="material-symbols-outlined">sort</span></button>
                <div class="moveleft"></div>
            </div>
            <div class="actualItemsContainer">
                <?php printPublicItems() ?>
            </div>
        </div>
    </div>
</body>

</html>
<!-- navigator.clipboard.writeText(copyText.value); -->
<!-- test autopull -->