<?php

// General Functions -----------------------------------------------------------

use LDAP\Result;

function navbar($path, $path2, $path3, $path4, $path5, $path6)
{
    session_start();
?>
    <div class="navBarContainer">
        <ul class="navBarUl">
            <li class="navBarList"><a class="navBarA" href="<?php echo $path3; ?>"><img class="logo" src="<?php echo $path; ?>"></a></li>
            <?php
            if (isset($_SESSION['username']) && !empty(isset($_SESSION['username']))) {
            ?>
                <li class="navBarList">
                    <div class="dropdown">
                        <div class="dropdown1">
                            <button class="dropbtn"><?php echo $_SESSION['username']; ?></button>
                            <div class="dropdown-content">
                                <a href="<?php echo $path4; ?>">Private Files</a>
                                <a href="<?php echo $path6; ?>">Public Files</a>
                                <a href="<?php echo $path5; ?>">Logout</a>
                            </div>
                        </div>
                    </div>
                </li>
            <?php
            } else {
            ?>
                <a class="navBarA" id="login" href="<?php echo $path2; ?>">
                    <li class="navBarList">
                        <p>Login/Register</p>
                    </li>
                </a>
            <?php
            }
            ?>
        </ul>
    </div>
<?php
}

function footer($path, $path2, $path3)
{
?>

    <footer>
        <div class="footerContainer">
            <div class="footer">
                <ul class="footerUl">
                    <li>
                        <p></p>
                    </li>
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank">
                        <img class="footerIMG" src='<?php echo $path; ?>' alt="no">
                    </a>
                    <li>
                        <p></p>
                    </li>
                </ul>
                <ul class="footerUl">
                    <li class="footerListItem">
                        <h3 class="footerFont">Made By</h3>
                    </li>
                    <li class="footerListItem">
                        <h4 class="footerFont">Toaster inc</h4>
                    </li>
                    <li class="footerListItem spacing"><a class="footerA" href='<?php echo $path2; ?>'>Contact</a></li>
                    <li class="footerListItem spacing"><a class="footerA" href='<?php echo $path3; ?>'>About</a></li>
                </ul>
                <!-- <ul class="footerUl">
                    <li class="footerListItem">
                        <h3 class="footerFont">School</h3>
                    </li>
                    <li>
                        <p></p>
                    </li>
                    <li class="footerListItem">
                        <p class="footerFont"><a class="footerA" href="https://roc-teraa.nl/" target="_blank">Roc Ter-AA</a><br><br><a class="footerA" href="https://www.google.com/maps/place/ROC+Ter+AA/@51.4865696,5.6579836,15z/data=!4m5!3m4!1s0x0:0xa75e0e6ae8607d67!8m2!3d51.4865684!4d5.6579213" target="_blank">Keizerin Marialaan 2</a></p>
                    </li>
                </ul> -->
            </div>
        </div>
    </footer>

<?php
}

function html($path)
{
?>
    <!doctype html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href='<?php echo $path; ?>' type="image/x-icon">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <?php
    }

// Register Functions -----------------------------------------------------------

function registerForm()
{
    $servername = "localhost";
    $username = "test_user";
    $password = "1234";
    try {
        $dbh = new PDO("mysql:host=$servername;dbname=mediaember", $username, $password);

        error_reporting(0);

        if (isset($_POST['submit'])) {

            $username = $_POST['usernameRegister'];
            $email = $_POST['emailRegister'];
            $password =  md5($_POST['passwordRegister']);
            $cPassword = md5($_POST['cPasswordRegister']);
            $baseCredits = 10;
            try {
                if ($password == $cPassword) {
                    $stmt = $dbh->query("SELECT COUNT(*) AS num FROM users WHERE email='$email'");
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($row['num'] > 0) {
                        echo "<script>window.location.href = 'register.php?emailInUse'</script>";
                    } else {
                        $stmt = $dbh->query("SELECT COUNT(*) AS num FROM users WHERE username='$username'");
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        if ($row['num'] > 0) {
                            echo "<script>window.location.href = 'register.php?usernameInUse'</script>";
                        } else {
                            $stmt = $dbh->prepare("insert into users (email, username, password) values(?,?,?)");
                            $stmt->bindParam(1, $email);
                            $stmt->bindParam(2, $username);
                            $stmt->bindParam(3, $password);
                            $stmt->execute();
                            $result = $stmt->setFetchMode(PDO::FETCH_NUM);
                            if ($result) {
                                try {
                                    $stmt = $dbh->query("SELECT * FROM credtis");
                                    $stmt = $dbh->prepare("insert into credtis (username, credtis) values(?,?)");
                                    $stmt->bindParam(1, $username);
                                    $stmt->bindParam(2, $baseCredits);
                                    $stmt->execute();
                                    $result = $stmt->setFetchMode(PDO::FETCH_NUM);
                                    if ($result) {
                                        mkdir("../storage/" . $username, 0777);
                                        $username = "";
                                        $email = "";
                                        echo '<script>window.location.href = "register.php?regSuccess";</script>';
                                    } else {
                                        echo "<script>window.location.href = 'register.php?regFail'</script>";
                                    }
                                } catch (exception $e) {
                                    echo $e;
                                }
                            } else {
                                echo "<script>window.location.href = 'register.php?regFail'</script>";
                            }
                        }
                    }
                } else {
                    echo "<script>window.location.href = 'register.php?passMatch</script>";
                }
            } catch (PDOException $exception) {
                echo "<script>window.location.href = 'register.php?regFail'</script>";
                echo $exception;
            }
        }
    } catch (exception $e) {
        echo "<script>window.location.href = 'register.php?connFail'</script>";
    }
}

    // Login Functions -----------------------------------------------------------

    function loginForm()
    {
        $servername = "localhost";
        $username = "test_user";
        $password = "1234";
        try {
            $dbh = new PDO("mysql:host=$servername;dbname=mediaember", $username, $password);

            session_start();

            error_reporting(0);

            if (isset($_POST['submit'])) {

                $email = $_POST['emailLogin'];
                $password = md5($_POST['passwordLogin']);

                $stmt = $dbh->query("SELECT COUNT(*) AS num FROM users WHERE email='$email' AND password='$password'");
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($row['num'] > 0) {
                    $stmt2 = $dbh->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
                    $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['username'] = $row2['username'];
                    $_SESSION['email'] = $row2['email'];
                    echo "<script>window.location.href = 'login.php?loginSuccess'</script>";
                } else {
                    echo "<script>window.location.href = 'login.php?loginFail'</script>";
                }
            }
        } catch (exception $e) {
            echo "<script>window.location.href = 'login.php?connFail'</script>";
        }
    }
        // private/public file download Functions -----------------------------------------------------------

    function printPublicItems()
    {
        $servername = "localhost";
        $username = "test_user";
        $password = "1234";
        $dbh = new PDO("mysql:host=$servername;dbname=mediaember", $username, $password);

        if(isset($_POST['filterItem']))
        {
            if($_POST['filterItem'] == '')
            {
                $stmt = $dbh->query("SELECT * FROM fileindex WHERE isPublic = 1");
                while ($row = $stmt->fetch()) {
                ?>
                    <div class="publicItem">
                        <p class="publicFileTitle large"><?php echo $row["fileName"] ?></p>
                        <p class="publicFileDate"><?php echo $row["uploadDate"] ?></p>
                        <p class="publicFileSize"><?php echo $row["fileSize"] ?>kb</p>
                        <div>
                            <a href="<?php echo $row['filePath'] ?>" download><button class="filterButton filter1 pointer download"><span class="material-symbols-outlined">download</span></button></a>
                            <a href="<?php echo './SharePage.php?file='. encode64($row['ID']); ?>" target="_blank"><button class="filterButton filter1"><span class="material-symbols-outlined">share</span></button></a>
                        </div>
                    </div>
                <?php
                }
            }
            else
            {
                $stmt = $dbh->query("SELECT * FROM fileindex WHERE isPublic = 1 AND fileType ='" . $_POST['filterItem'] . "'");
                while ($row = $stmt->fetch()) {
                ?>
                    <div class="publicItem">
                        <p class="publicFileTitle large"><?php echo $row["fileName"] ?></p>
                        <p class="publicFileDate"><?php echo $row["uploadDate"] ?></p>
                        <p class="publicFileSize"><?php echo $row["fileSize"] ?>kb</p>
                        <div>
                            <a href="<?php echo $row['filePath'] ?>" download><button class="filterButton filter1 pointer download"><span class="material-symbols-outlined">download</span></button></a>
                            <a href="<?php echo './SharePage.php?file='. encode64($row['ID']); ?>" target="_blank"><button class="filterButton filter1"><span class="material-symbols-outlined">share</span></button></a>
                        </div>
                    </div>
                <?php
                }
            }
        }
        else
        {
            $stmt = $dbh->query("SELECT * FROM fileindex WHERE isPublic = 1");
            while ($row = $stmt->fetch()) {
            ?>
                <div class="publicItem">
                    <p class="publicFileTitle large"><?php echo $row["fileName"] ?></p>
                    <p class="publicFileDate"><?php echo $row["uploadDate"] ?></p>
                    <p class="publicFileSize"><?php echo $row["fileSize"] ?>kb</p>
                    <div>
                        <a href="<?php echo $row['filePath'] ?>" download><button class="filterButton filter1 pointer download"><span class="material-symbols-outlined">download</span></button></a>
                        <a href="<?php echo './SharePage.php?file='. encode64($row['ID']); ?>" target="_blank"><button class="filterButton filter1"><span class="material-symbols-outlined">share</span></button></a>
                    </div>
                </div>
            <?php
            }
        }
    }

    function printPrivateItems()
    {
        deleteItem();
        $servername = "localhost";
        $username = "test_user";
        $password = "1234";
        $dbh = new PDO("mysql:host=$servername;dbname=mediaember", $username, $password);

        if(isset($_POST['filterItem']))
        {
            if($_POST['filterItem'] == '')
            {
                $stmt = $dbh->query("SELECT * FROM fileindex WHERE username ='". $_SESSION['username'] . "'");
                while ($row = $stmt->fetch()) {
                ?>
                    <div class="publicItem">
                         <?php
                         if(date("Y-m-d") != strtotime($row["deleteDate"] . " - " . 1 . " days"))
                         {
                            ?> 
                                <p><span class='material-symbols-outlined iconsize'>error</span></p>
                        <?php
                          }
                        ?> 
                           <p>dog</p>                     
                        <p class="publicFileTitle large"><?php echo $row["fileName"] ?></p>
                        <p class="publicFileDate"><?php echo $row["uploadDate"] ?></p>
                        <p class="publicFileSize"><?php echo $row["fileSize"] ?>kb</p>
                        <div>
                            <a href="<?php echo $row['filePath'] ?>" download><button class="filterButton filter1 pointer download"><span class="material-symbols-outlined">download</span></button></a>
                            <a href="./private.php?delete=true&id=<?php echo $row['ID'] ?>"><span class="material-symbols-outlined pointer">delete</span></a>
                            <a href="<?php echo './SharePage.php?file='. encode64($row['ID']); ?>" target="_blank"><button class="filterButton filter1"><span class="material-symbols-outlined">share</span></button></a>
                        </div>
                    </div>
                <?php
                }
            }
            else
            {
                $stmt = $dbh->query("SELECT * FROM fileindex WHERE username ='". $_SESSION['username'] . "' AND fileType ='" . $_POST['filterItem'] . "'");
                while ($row = $stmt->fetch()) {
                ?>
                    <div class="publicItem">
                        <p class="publicFileTitle large"><?php echo $row["fileName"] ?></p>
                        <p class="publicFileDate"><?php echo $row["uploadDate"] ?></p>
                        <p class="publicFileSize"><?php echo $row["fileSize"] ?>kb</p>
                        <div>
                            <a href="<?php echo $row['filePath'] ?>" download><button class="filterButton filter1 pointer download"><span class="material-symbols-outlined">download</span></button></a>
                            <a href="./private.php?delete=true&id=<?php echo $row['ID'] ?>"><span class="material-symbols-outlined pointer">delete</span></a>
                            <a href="<?php echo './SharePage.php?file='. encode64($row['ID']); ?>" target="_blank"><button class="filterButton filter1"><span class="material-symbols-outlined">share</span></button></a>
                        </div>
                    </div>
                <?php
                }
            }
        }
        else
        {
            $stmt = $dbh->query("SELECT * FROM fileindex WHERE username ='". $_SESSION['username'] . "'");
            while ($row = $stmt->fetch()) {
            ?>
                <div class="publicItem">
                    <p class="publicFileTitle large"><?php echo $row["fileName"] ?></p>
                    <p class="publicFileDate"><?php echo $row["uploadDate"] ?></p>
                    <p class="publicFileSize"><?php echo $row["fileSize"] ?>kb</p>
                    <div>
                        <a href="<?php echo $row['filePath'] ?>" download><button class="filterButton filter1 pointer download"><span class="material-symbols-outlined">download</span></button></a>
                        <a href="./private.php?delete=true&id=<?php echo $row['ID'] ?>"><span class="material-symbols-outlined pointer">delete</span></a>
                        <a href="<?php echo './SharePage.php?file='. encode64($row['ID']); ?>" target="_blank"><button class="filterButton filter1"><span class="material-symbols-outlined">share</span></button></a>
                    </div>
                </div>
            <?php
            }
        }
    }

    function getCreditAmount()
    {
        $servername = "localhost";
        $username = "test_user";
        $password = "1234";
        $dbh = new PDO("mysql:host=$servername;dbname=mediaember", $username, $password);
        $stmt = $dbh->query("SELECT * FROM credtis WHERE username ='". $_SESSION['username'] . "'");
        while ($row = $stmt->fetch()) {
            echo $row['credtis'];
            $_SESSION['credtis'] = $row['credtis'];
        }
    }

    function deleteItem()
    {
        if(isset($_GET['delete']))
        {
            if($_GET['delete'] == true)
            {
                // echo "<script> console.log('test" . $_GET['id'] ."'); </script>";

                if(actualDeleteFunction())
                {
                    $servername = "localhost";
                    $username = "test_user";
                    $password = "1234";
                    $pdo = new PDO("mysql:host=$servername;dbname=mediaember", $username, $password);
                    
                    $id = $_GET['id'];
                    $stmt = $pdo->prepare( "DELETE FROM fileindex WHERE ID =:id" );
                    $stmt->bindParam(':id', $id);
                    $stmt->execute();
                    echo "<script>window.location.href = 'private.php'</script>";
                }                
            }  
        }
    }

    function actualDeleteFunction()
    {
        $servername = "localhost";
        $username = "test_user";
        $password = "1234";
        $dbh = new PDO("mysql:host=$servername;dbname=mediaember", $username, $password);
        $stmt2 = $dbh->query("SELECT * FROM fileindex WHERE ID =" . $_GET['id'] . "");
        while ($row = $stmt2->fetch()) 
        {
            unlink($row['filePath']);
        }
        return true;
    }

    function DynamicFilter()
    {
        $servername = "localhost";
        $username = "test_user";
        $password = "1234";
        $dbh = new PDO("mysql:host=$servername;dbname=mediaember", $username, $password);
        $stmt2 = $dbh->query("SELECT DISTINCT fileType FROM fileindex");
        while ($row = $stmt2->fetch()) 
        {
            ?>
            <li>
                <input type="radio" class="form-check-input pointer" value="<?php echo $row['fileType'] ?>" name="filterItem">
                <label for="html"><?php echo $row['fileType'] ?></label>
            </li>
            <?php
        }
    }

    function PublicDynamicFilter()
    {
        $servername = "localhost";
        $username = "test_user";
        $password = "1234";
        $dbh = new PDO("mysql:host=$servername;dbname=mediaember", $username, $password);
        $stmt2 = $dbh->query("SELECT DISTINCT fileType FROM fileindex WHERE isPublic = 1");
        while ($row = $stmt2->fetch()) 
        {
            ?>
            <li>
                <input type="radio" class="form-check-input pointer" value="<?php echo $row['fileType'] ?>" name="filterItem">
                <label for="html"><?php echo $row['fileType'] ?></label>
            </li>
            <?php
        }
    }

    function encode64($input)
    {
        $enc = base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($input))))))));
        return $enc;
    }

    function decode64($input)
    {
        $decrypted = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($input))))))));
        return $decrypted;
    }   

    function sharePage()
    {
        if(isset($_GET['file']))
        {
            $servername = "localhost";
            $username = "test_user";
            $password = "1234";
            $dbh = new PDO("mysql:host=$servername;dbname=mediaember", $username, $password);
            $stmt2 = $dbh->query("SELECT * FROM fileindex WHERE ID =" . decode64($_GET['file']));
            while ($row = $stmt2->fetch()) 
            {
                ?>
                <h1 class="infoText">File Information</h1>
                <h2 id="textOverflow" class="infoText">Name: <?php echo $row['fileName'] ?></h2>
                <p class="infoText">Size: <?php echo $row['fileSize'] ?> kb</p>
                <p class="infoText">Upload Date: <?php echo $row['uploadDate'] ?></p>
                <a href="<?php echo $row['filePath'] ?>" download><button download="" class="sharePageBtn">Download</button></a>
                <?php
            }
        }
        else
        {
            echo "<h1>Wow Such Empty</h1>";
        }
    }

    function sharePagePreview()
    {
        if(isset($_GET['file']))
        {
            $servername = "localhost";
            $username = "test_user";
            $password = "1234";
            $dbh = new PDO("mysql:host=$servername;dbname=mediaember", $username, $password);
            $stmt2 = $dbh->query("SELECT * FROM fileindex WHERE ID =" . decode64($_GET['file']));
            while ($row = $stmt2->fetch()) 
            {
                if(str_contains($row['fileType'], 'image'))
                {
                    ?>
                    <h1 class="infoText">Preview</h1>
                    <img class="previewImage" src="<?php echo $row['filePath'] ?>" alt="">
                    <?php
                }

                else if(str_contains($row['fileType'], 'video'))
                {
                    ?>
                    <h1 class="infoText">Preview</h1>
                    <video width="400" controls>
                        <source src="<?php echo $row['filePath'] ?>" type="<?php echo $row['fileType'] ?>">
                        Your browser does not support the video tag.
                    </video>
                    <?php
                }

                else if(str_contains($row['fileType'], 'audio'))
                {
                    ?>
                    <h1 class="infoText">Preview</h1>
                    <audio controls>
                        <source src="<?php echo $row['filePath'] ?>" type="<?php echo $row['fileType'] ?>">
                        Your browser does not support the audio element.
                    </audio> 
                    <?php
                }

                else if(str_contains($row['fileType'], 'text/plain'))
                {
                    ?>
                    <h1 class="infoText">Preview</h1>
                    <object data="<?php echo $row['filePath'] ?>" width="400" height="300">
                        Not supported
                    </object>
                    <?php
                }

                else
                {
                    ?>
                    <h1 class="infoText">Preview</h1>
                    <img class="errorSVG" src="../media/svg/error-file.svg" alt="">
                    <?php
                }
            }
        }
    }
    ?>