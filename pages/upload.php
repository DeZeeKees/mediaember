<script>
    function goBack()
    {
        window.location.href = "private.php";
    }
</script>
<?php
session_start();
$target_dir = "../storage/" . $_SESSION['username'] . "/";
$target_file = $target_dir . basename($_FILES["uploadInput"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

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