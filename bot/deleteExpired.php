<?php

$servername = "localhost";
$username = "test_user";
$password = "1234";
$dbh = new PDO("mysql:host=$servername;dbname=mediaember", $username, $password);
$stmt1 = $dbh->query("SELECT * FROM `fileindex` WHERE deletionDate < NOW()");
while ($row = $stmt1->fetch()) 
{
    unlink($row['filePath']);
}

$dbh = new PDO("mysql:host=$servername;dbname=mediaember", $username, $password);
$stmt = $dbh->prepare("DELETE * FROM `fileindex` WHERE deletionDate < NOW()");
$stmt->execute();


