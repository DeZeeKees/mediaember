<?php
session_start();
require '../inc/functions.php';
html();
?>
<script src="../script/index.js" defer></script>
<script src="../inc/jquery-3.6.0.js"></script>
<link rel="stylesheet" href="../style/index.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body id="indexBody" onload=privateAndPublicOnload()>
    <div class="uploadDiv">
         <form role="form">
            <center>
                <h1>Upload A File</h1>
                <p>Credits:</p> <!--insert credits here -->
                <div class="form-group">
                    <label class="custom-file-upload pointer spacing">
                        <input type="file" name="uploadInput" id="uploadInput" />
                        <span class="material-symbols-outlined">file_upload</span>
                    </label>
                </div>
                <div class="checkbox">
                    <label class="switch spacing">
                        <input type="checkbox">
                        <span class="slider round brain"><p>is public</p></span>
                    </label>
                </div>
                <button type="submit" class="pointer uploadSubmit">Submit</button>
                <span class="pointer material-symbols-outlined closeUploadScreen size">close</span>
            </center>
        </form>
        <!-- <form action="private.php">
            <h1>Upload A File</h1>
            <p>Credits</p>
            <input type="file" name="uploadInput" id="uploadInput" class="pointer ">
            <label class="custom-file-upload pointer spacing">
                <input type="file" name="uploadInput" id="uploadInput" />
                <span class="material-symbols-outlined">file_upload</span> Upload File
            </label>
            <label class="switch spacing">
                <input type="checkbox">
                <span class="slider round brain"><p>is pubic</p></span>
            </label>
            <button class="submitUploadScreen pointer" type="submit">submit</button>
            <div class="closeButtonContainer spacing">
            <button class="closeUploadScreen pointer">Close</button>
        </form> -->
        </div>
    </div>

    <div class="filterScreen">
        <p class="filterHead">Filter by file extention</p>
        <ul class="none">
            <li>
                <input type="radio" class="form-check-input pointer" value="checkedValue" name="filterItem" checked="checked">
                <label for="html">none</label>
            </li>
            <li>
                <input type="radio" class="form-check-input pointer" value="checkedValue" name="filterItem">
                <label for="html">png</label>
            </li>
            <li>
                <input type="radio" class="form-check-input pointer" value="checkedValue" name="filterItem">
                <label for="html">jpg</label>
            </li>
            <li>
                <input type="radio" class="form-check-input pointer" value="checkedValue" name="filterItem">
                <label for="html">zip</label>
            </li>
            <li>
                <input type="radio" class="form-check-input pointer" value="checkedValue" name="filterItem">
                <label for="html">rar</label>
            </li>
            <li>
                <input type="radio" class="form-check-input pointer" value="checkedValue" name="filterItem">
                <label for="html">mp4</label>
            </li>
            <li>
                <input type="radio" class="form-check-input pointer" value="checkedValue" name="filterItem">
                <label for="html">mp3</label>
            </li>
            <li>
                <input type="radio" class="form-check-input pointer" value="checkedValue" name="filterItem">
                <label for="html">mp2</label>
            </li>
            <li>
                <input type="radio" class="form-check-input pointer" value="checkedValue" name="filterItem">
                <label for="html">webm</label>
            </li>
            <li>
                <input type="radio" class="form-check-input pointer" value="checkedValue" name="filterItem">
                <label for="html">mpeg</label>
            </li>
            <li>
                <input type="radio" class="form-check-input pointer" value="checkedValue" name="filterItem">
                <label for="html">gif</label>
            </li>
            <li>
                <input type="radio" class="form-check-input pointer" value="checkedValue" name="filterItem">
                <label for="html">ico</label>
            </li>
            <li>
                <input type="radio" class="form-check-input pointer" value="checkedValue" name="filterItem">
                <label for="html">txt</label>
            </li>
            <li class="toopltip">
                <span class="pointer material-symbols-outlined closeFilter">close</span>
            </li>
        </ul>
    </div>
    </div>
    <?php navbar("../media/img/legitlogo.png", "login.php", "../index.php", "./private.php", "./logout.php", './public.php'); ?>
    <div class="public-Container">
        <div>
            <ul class="buttons">
                <li class="tooltip">
                    <span class="tooltiptext">Upload File</span>
                    <button class="filterButton filter1 pointer upload"><span class="material-symbols-outlined uploadButton">upload</span></button>
                </li>
                <li class="tooltip">
                    <span class="tooltiptext">Filter Items</span>
                    <button class="filterButton filter1 pointer filter"><span class="material-symbols-outlined filterBtn">filter_alt</span></button>
                </li>
            </ul>
        </div>
        <div class="itemsContainer">
            <div class="actualItemsContainer">
                <?php printPrivateItems() ?>
            </div>
        </div>
    </div>
</body>

</html>
<!--   navigator.clipboard.writeText(copyText.value); -->