<script>
    function goBack()
    {
        window.location.href = './private.php?uploadedFile';
    }
    function Error()
    {
        window.location.href = './private.php?uploadFailed';
    }
</script>
<?php
session_start();
$servername = "localhost";
$username = "test_user";
$password = "1234";

$dbh = new PDO("mysql:host=$servername;dbname=mediaember", $username, $password);

if(isset($_POST['uploadIsPublicCheckbox']))
{
    $checkboxChecked = 1;
}
else
{
    $checkboxChecked = 0;
}

$date = $_POST['dateSelect'] + 10;
$sessionUsername = $_SESSION['username'];
$fileName = $_FILES["uploadInput"]["name"];
$filePath = "../storage/" . $_SESSION['username'] . "/" . $_FILES["uploadInput"]["name"];
$fileSize = ceil($_FILES["uploadInput"]["size"] / 1024);
$fileType = $_FILES["uploadInput"]["type"];
$deleteDate = date("Y-m-d", strtotime(date("Y-m-d"). " + " . $date . " days"));
$uploadDate = date("Y-m-d");
$minusCredtis = $_POST['dateSelect'] / 2;
if($_POST['dateSelect'] = 0)
{
    $credtis = $_SESSION['credtis'];
}
else
{
    $credtis = $_SESSION['credtis'] - $minusCredtis;
}


$stmt = $dbh->prepare("insert into fileindex (username, isPublic, fileName, filePath, fileSize, fileType, uploadDate, deletionDate) values(?,?,?,?,?,?,?,?)");
$stmt->bindParam(1, $sessionUsername);
$stmt->bindParam(2, $checkboxChecked);
$stmt->bindParam(3, $fileName);
$stmt->bindParam(4, $filePath);
$stmt->bindParam(5, $fileSize);
$stmt->bindParam(6, $fileType);
$stmt->bindParam(7, $uploadDate);
$stmt->bindParam(8, $deleteDate);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_NUM);

if($result)
{
    $stmt = $dbh->prepare("INSERT INTO credtis WHERE username =" . $_SESSION['username'] . "  (credtis) values(?)");
    $stmt->bindParam(1, $credtis);
    $stmt->execute();
    $result2 = $stmt->setFetchMode(PDO::FETCH_NUM);
    if($result2)
    {
        $target_dir = "../storage/" . $_SESSION['username'] . "/";
        $target_file = $target_dir . basename($_FILES["uploadInput"]["name"]);
        $uploadOk = 1;
        
        // Check if file already exists
        if (file_exists($target_file)) {
        $uploadOk = 0;
        }
        
        // Check file size
        if ($_FILES["uploadInput"]["size"] > 50000000) {
        $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        ?>
            <script>Error()</script>
        <?php
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["uploadInput"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["uploadInput"]["name"])). " has been uploaded.";
            ?>
                <script>goBack()</script>
            <?php
            } else {
                ?>
                    <script>Error()</script>
                <?php
            }
        }
    }
}