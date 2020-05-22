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
    vorname CHAR(200),
    nachname CHAR(200) 
)";
$pdo->exec($sql);

// CREATE TESTDATA
echo 'TRY to create testdata ...<br>';
$sql = "INSERT INTO schueler SET vorname = 'Anna', nachname = 'Arm'";
$pdo->exec($sql);
$sql = "INSERT INTO schueler SET vorname = 'Berta', nachname = 'Bein'";
$pdo->exec($sql);
$sql = "INSERT INTO schueler SET vorname = 'Carla', nachname = 'Copf'";
$pdo->exec($sql);