<script>
    function goBack()
    {
        window.location.href = "private.php";
    }
</script>
<?php
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
            echo "1";
        }
        else
        {
            $checkboxChecked = 0;
            echo "0";
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
            $target_dir = "../storage/" . $_SESSION['username'] . "/";
            $target_file = $target_dir . basename($_FILES["uploadInput"]["name"]);
            $uploadOk = 1;
    
            // Check if file already exists
            if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
            }
    
            // Check file size
            if ($_FILES["uploadInput"]["size"] > 50000000000) {
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
                }
            }
        }
    } catch(Exception $e)
    {
        echo $e;
    }
}
