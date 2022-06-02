<script>
    function goBack()
    {
        window.location.href = "private.php";
    }
</script>
<?php
require '../inc/functions.php';
session_start();
$servername = "localhost";
$username = "test_user";
$password = "1234";
try {$dbh = new PDO("mysql:host=$servername;dbname=mediaember", $username, $password); } catch(Exception $e) { echo $e; }
$checkboxChecked;
if(isset($_POST['submit']))
{
    try
    {
        if(isset($_POST['uploadIsPublicCheckbox']))
        {
            $checkboxChecked = 1;
        }
        else
        {
            $checkboxChecked = 0;
        }
        $stmt = $dbh->prepare("insert into fileindex (username, isPublic, fileName, filePath, fileSize, fileType, uploadDate, deletionDate) values(?,?,?,?,?,?,?,?)");
        $stmt->bindParam(1, $_SESSION['username']);
        $stmt->bindParam(2, $checkboxChecked);
        $stmt->bindParam(3, $_FILES["uploadInput"]["name"]);
        $stmt->bindParam(4, "../storage/" . $_SESSION['username'] . "/");
        $stmt->bindParam(5, floor($_FILES["uploadInput"]["size"] / 1024));
        $stmt->bindParam(6, $_FILES["uploadInput"]["type"]);
        $stmt->bindParam(7, date("Y-m-d"));
        $stmt->bindParam(8, date("Y-m-d"));
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_NUM);
        if($result)
        {
            uploadScript();
        }
    } catch(Exception $e)
    {
        echo $e;
    }
}
