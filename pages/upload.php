<script>
    function goBack()
    {
        window.location.href = './private.php';
    }
</script>
<?php
session_start();
$servername = "localhost";
$username = "test_user";
$password = "1234";

define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);

$dbh = new PDO("mysql:host=$servername;dbname=mediaember", $username, $password);

$checkboxChecked = 1;
$sessionUsername = $_SESSION['username'];
$fileName = $_FILES["uploadInput"]["name"];
$filePath = "../storage/" . $_SESSION['username'] . "/" . $_FILES["uploadInput"]["name"];
$fileSize = floor($_FILES["uploadInput"]["size"] / 1024);
$fileType = $_FILES["uploadInput"]["type"];
$uploadDate = date("Y-m-d");


$stmt = $dbh->prepare("insert into fileindex (username, isPublic, fileName, filePath, fileSize, fileType, uploadDate, deletionDate) values(?,?,?,?,?,?,?,?)");
$stmt->bindParam(1, $sessionUsername);
$stmt->bindParam(2, $checkboxChecked);
$stmt->bindParam(3, $fileName);
$stmt->bindParam(4, $filePath);
$stmt->bindParam(5, $fileSize);
$stmt->bindParam(6, $fileType);
$stmt->bindParam(7, $uploadDate);
$stmt->bindParam(8, $uploadDate);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_NUM);

$target_dir = "../storage/" . $_SESSION['username'] . "/";
$target_file = $target_dir . basename($_FILES["uploadInput"]["name"]);
$uploadOk = 1;

// Check if file already exists
if (file_exists($target_file)) {
echo "Sorry, file already exists.";
$uploadOk = 0;
}

// Check file size
if ($_FILES["uploadInput"]["size"] > 2*GB) {
echo "Sorry, your file is too large.";
$uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
echo "Sorry, your file was not uploaded.";
?>
    <button onclick="goBack()">Continue</button>
<?php
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["uploadInput"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["uploadInput"]["name"])). " has been uploaded.";
    ?>
        <button onclick="goBack()">Continue</button>
    <?php
    } else {
        echo "Sorry, there was an error uploading your file.";
        ?>
            <button onclick="goBack()">Continue</button>
        <?php
    }
}
// h    