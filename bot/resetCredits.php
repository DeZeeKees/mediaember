<?php

$servername = "localhost";
$username = "test_user";
$password = "1234";
$dbh = new PDO("mysql:host=$servername;dbname=mediaember", $username, $password);
$stmt = $dbh->prepare("UPDATE credtis SET credtis = 10 WHERE credtis < 10");
$stmt->execute();
$result2 = $stmt->setFetchMode(PDO::FETCH_NUM);

?>