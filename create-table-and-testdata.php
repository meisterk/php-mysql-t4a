<?php
// DATA
$databasename = 'testdatabase';
$username = 'testuser';
$password = '123';

// Root-Connection to MySQL/MariaDB
$pdo = new PDO(
    "mysql:host=localhost;dbname=$databasename",
    $username,
    $password
);

// Show errors
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// CREATE TABLE
echo 'TRY to create table ...<br>';
$sql = "DROP TABLE IF EXISTS schueler";
$pdo->exec($sql);

$sql = "CREATE TABLE schueler (
    id INT PRIMARY KEY AUTO_INCREMENT,
    vorname CHAR(20),
    nachname CHAR(20) 
)";
$pdo->exec($sql);