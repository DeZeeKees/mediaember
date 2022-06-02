<?php
$servername = "localhost";
$username = "test_user";
$password = "1234";
$dbh = new PDO("mysql:host=localhost;dbname=mediaember", $username, $password);

$stmt = $dbh->prepare("insert into fileindex (username, isPublic, fileName, filePath, fileSize, fileType) values(?,?,?,?,?,?)");
        $stmt->bindParam(1, "test");
        $stmt->bindParam(2, 1);
        $stmt->bindParam(3, "testfile");
        $stmt->bindParam(4, "../storage/" . "test" . "/");
        $stmt->bindParam(5, floor(500000 / 1024));
        $stmt->bindParam(6, ".txt");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_NUM);
?>
