<?php
session_start();
require '../inc/functions.php';
html("../media/img/favicon.ico");
?>
<title>Media Ember - Private Files</title>
<script src="../script/index.js" defer></script>
<script src="../inc/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="../style/index.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body id="indexBody" onload=privateAndPublicOnload(); onload=fileUploaded();>

    <div class="uploadDate">Date Uploaded</div>
    <div class="fileSize">File Size</div>

    <div class="uploadDiv">
         <form id="privateForm" action="./upload.php" method="POST" enctype="multipart/form-data">
            <center>
                <h1>Upload A File</h1>
                <p>Credits: <?php getCreditAmount(); ?></p>
                <p>Time until file gets deleted</p>
                <p>Base Amount is 10 days</p>
                <div class="dateInputDiv">
                    <select name="dateSelect" id="dateSelect">
                        <option value="0"> + 0 days  | - 0 credits </option>
                        <option value="2"> + 2 days  | - 1 credits </option>
                        <option value="4"> + 4 days  | - 2 credits </option>
                        <option value="6"> + 6 days  | - 3 credits </option>
                        <option value="8"> + 8 days  | - 4 credits </option>
                        <option value="10"> + 10 days | - 5 credits</option>
                        <option value="12"> + 12 days | - 6 credits </option>
                        <option value="14"> + 14 days | - 7 credits </option>
                        <option value="16"> + 16 days | - 8 credits</option>
                        <option value="18"> + 18 days | - 9 credits </option>
                        <option value="20"> + 20 days | - 10 credits </option>
                    </select>
                </div>
                <div id="inputDiv">
                    <label for="uploadInput" id="inputLabel">
                        Select File <br/>
                        <i class="fa fa-2x fa-camera"></i>
                        <input id="uploadInput" name="uploadInput" type="file"/>
                        <br/>
                        <span id="inputFileName"></span>
                    </label>
                </div>
                <script>
                    let input = document.getElementById("uploadInput");
                    let fileName = document.getElementById("inputFileName")

                    input.addEventListener("change", ()=>{
                        let inputFile = document.querySelector("input[type=file]").files[0];

                        fileName.innerText = inputFile.name;
                    })

                    $(document).ready(function(){
                        if (location.href.indexOf('uploadedFile') > -1) {
                            console.log('hi')
                            Swal.fire({
                                icon: 'success',
                                title: 'File uploaded',
                                text: 'Successfully uploaded file',
                                confirmButtonText: 'View Files',
                                
                            }).then((result) => {
                                if (result.isConfirmed || result.isDismissed === true) {
                                    window.location.href = './private.php'
                                }
                            })
                        }
                        else if (location.href.indexOf('uploadFailed') > -1) {
                            console.log('hi')
                            Swal.fire({
                                icon: 'error',
                                title: 'Upload Failed',
                                text: 'Failed to upload file',
                                confirmButtonText: 'Retry'
                            }).then((result) => {
                                if (result.isConfirmed || result.isDismissed === true) {
                                    window.location.href = './private.php'
                                }
                            })
                        }        
                    })
            </script>
                <div class="checkbox2">
                <label class="checkbox">
                    <input type="checkbox" name="uploadIsPublicCheckbox" />
                    <svg viewBox="0 0 21 18">
                        <symbol id="tick-path" viewBox="0 0 21 18" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.22003 7.26C5.72003 7.76 7.57 9.7 8.67 11.45C12.2 6.05 15.65 3.5 19.19 1.69" fill="none" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                        </symbol>
                        <defs>
                            <mask id="tick">
                                <use class="tick mask" href="#tick-path" />
                            </mask>
                        </defs>
                        <use class="tick" href="#tick-path" stroke="currentColor" />
                        <path fill="white" mask="url(#tick)" d="M18 9C18 10.4464 17.9036 11.8929 17.7589 13.1464C17.5179 15.6054 15.6054 17.5179 13.1625 17.7589C11.8929 17.9036 10.4464 18 9 18C7.55357 18 6.10714 17.9036 4.85357 17.7589C2.39464 17.5179 0.498214 15.6054 0.241071 13.1464C0.0964286 11.8929 0 10.4464 0 9C0 7.55357 0.0964286 6.10714 0.241071 4.8375C0.498214 2.39464 2.39464 0.482143 4.85357 0.241071C6.10714 0.0964286 7.55357 0 9 0C10.4464 0 11.8929 0.0964286 13.1625 0.241071C15.6054 0.482143 17.5179 2.39464 17.7589 4.8375C17.9036 6.10714 18 7.55357 18 9Z" />
                    </svg>
                    <svg class="lines" viewBox="0 0 11 11">
                        <path d="M5.88086 5.89441L9.53504 4.26746" />
                        <path d="M5.5274 8.78838L9.45391 9.55161" />
                        <path d="M3.49371 4.22065L5.55387 0.79198" />
                    </svg>
                    
                </label>
                <p class="checkText">is public</p>
                </div>
                <button type="submit" class="pointer uploadSubmit">Submit</button>
                <span class="pointer material-symbols-outlined closeUploadScreen size">close</span>
            </center>
        </form>
        </div>
    </div>

    <div class="filterScreen">
        <form method="POST">
            <p class="filterHead">Filter by file extention</p>
            <ul class="none">
                <li>
                    <input type="radio" class="form-check-input pointer" value="" name="filterItem" checked="checked">
                    <label for="html">none</label>
                </li>
                <?php DynamicFilter() ?>
                <li class="toopltip">
                    <button type="submit" class="filterButton"><span class="pointer material-symbols-outlined closeFilter">close</span></button>
                </li>
            </ul>
        </form>
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