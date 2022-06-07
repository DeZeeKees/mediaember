<?php

// General Functions -----------------------------------------------------------

use LDAP\Result;

function navbar($path, $path2, $path3, $path4, $path5, $path6)
{
    session_start();
?>
    <div class="navBarContainer">
        <ul class="navBarUl">
            <li class="navBarList"><a class="navBarA" href="<?php echo $path3; ?>"><img id="logo" src="<?php echo $path; ?>"></a></li>
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

function html()
{
?>
    <!doctype html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Media Ember</title>
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
                        echo "<script>alert('Email is already registerd');</script>";
                    } else {
                        $stmt = $dbh->query("SELECT COUNT(*) AS num FROM users WHERE email='$username'");
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        if ($row['num'] > 0) {
                            echo "<script>alert('Username is already in use');</script>";
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
                                        echo "<script>alert('Register Succesful');</script>";
                                        $username = "";
                                        $email = "";
                                        echo '<script>window.location.href = "login.php";</script>';
                                    } else {
                                        echo "<script>alert('OWO Somethwing gwhent wong :(');</script>";
                                    }
                                } catch (exception $e) {
                                    echo $e;
                                }
                            } else {
                                echo "<script>alert('OWO Somethwing gwhent wong :(');</script>";
                            }
                        }
                    }
                } else {
                    echo "<script>alert('Password Must Match');</script>";
                }
            } catch (PDOException $exception) {
                echo "<script>alert('OWO Somethwing gwhent wong :(');</script>";
                echo $exception;
            }
        }
    } catch (exception $e) {
        echo "<script>alert('OWO Somethwing gwhent wong :( \\n A connection to the server could not be made');</script>";
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
                    header("Location: private.php");
                } else {
                    echo "<script>alert('Email or Password incorrect');</script>";
                }
            }
        } catch (exception $e) {
            echo "<script>alert('OWO Somethwing gwhent wong :( \\n A connection to the server could not be made \\n " . $e . "');</script>";
        }
    }
        // private/public file download Functions -----------------------------------------------------------

    function printPublicItems()
    {
        $servername = "localhost";
        $username = "test_user";
        $password = "1234";

        $dbh = new PDO("mysql:host=$servername;dbname=mediaember", $username, $password);
        $stmt = $dbh->query("SELECT * FROM fileindex WHERE isPublic = 1");
        while ($row = $stmt->fetch()) {
        ?>
            <div class="publicItem">
                <p class="publicFileTitle"><?php echo $row["fileName"] ?></p>
                <p class="publicFileDate"><?php echo $row["uploadDate"] ?></p>
                <p class="publicFileSize"><?php echo $row["fileSize"] ?>kb</p>
                <div>
                    <button class="filterButton filter1 pointer download"><span class="material-symbols-outlined">download</span></button>
                    <button class="filterButton filter1"><span class="material-symbols-outlined">share</span></button>
                </div>
            </div>
        <?php
        }
    }

    function printPrivateItems()
    {
        deleteItem();
        $servername = "localhost";
        $username = "test_user";
        $password = "1234";

        $dbh = new PDO("mysql:host=$servername;dbname=mediaember", $username, $password);
        $stmt = $dbh->query("SELECT * FROM fileindex WHERE username ='". $_SESSION['username'] . "'");
        while ($row = $stmt->fetch()) {
        ?>
            <div class="publicItem">
                <p class="publicFileTitle"><?php echo $row["fileName"] ?></p>
                <p class="publicFileDate"><?php echo $row["uploadDate"] ?></p>
                <p class="publicFileSize"><?php echo $row["fileSize"] ?>kb</p>
                <div>
                    <a href="<?php echo $row['filePath'] ?>" download><button class="filterButton filter1 pointer download"><span class="material-symbols-outlined">download</span></button></a>
                    <a href="./private.php?delete=true&id=<?php echo $row['ID'] ?>"><span class="material-symbols-outlined pointer">delete</span></a>
                    <button class="filterButton filter1"><span class="material-symbols-outlined">share</span></button>
                </div>
            </div>
        <?php
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
    ?>