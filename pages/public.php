<?php
require '../inc/functions.php';
html("../media/img/favicon.ico");
?>
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
                <li>
                    <input type="radio" class="form-check-input pointer" value="image/png" name="filterItem">
                    <label for="html">png</label>
                </li>
                <li>
                    <input type="radio" class="form-check-input pointer" value="image/jpg" name="filterItem">
                    <label for="html">jpg</label>
                </li>
                <li>
                    <input type="radio" class="form-check-input pointer" value="application/zip" name="filterItem">
                    <label for="html">zip</label>
                </li>
                <li>
                    <input type="radio" class="form-check-input pointer" value="application/x-rar-compressed" name="filterItem">
                    <label for="html">rar</label>
                </li>
                <li>
                    <input type="radio" class="form-check-input pointer" value="video/mp4" name="filterItem">
                    <label for="html">mp4</label>
                </li>
                <li>
                    <input type="radio" class="form-check-input pointer" value="audio/mpeg" name="filterItem">
                    <label for="html">mp3</label>
                </li>
                <li>
                    <input type="radio" class="form-check-input pointer" value="audio/mpeg" name="filterItem">
                    <label for="html">mp2</label>
                </li>
                <li>
                    <input type="radio" class="form-check-input pointer" value="video/webm" name="filterItem">
                    <label for="html">webm</label>
                </li>
                <li>
                    <input type="radio" class="form-check-input pointer" value="video/mpeg" name="filterItem">
                    <label for="html">mpeg</label>
                </li>
                <li>
                    <input type="radio" class="form-check-input pointer" value="image/gif" name="filterItem">
                    <label for="html">gif</label>
                </li>
                <li>
                    <input type="radio" class="form-check-input pointer" value="image/vnd.microsoft.icon" name="filterItem">
                    <label for="html">ico</label>
                </li>
                <li>
                    <input type="radio" class="form-check-input pointer" value="text/plain" name="filterItem">
                    <label for="html">txt</label>
                </li>
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
<!-- navigator.clipboard.writeText(copyText.value); -->