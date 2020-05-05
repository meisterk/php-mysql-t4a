<?php
// DATA
$rootpassword = 'mysql';
$databasename = 'testdatabase';

// Root-Connection to MySQL/MariaDB
$pdo = new PDO(
    "mysql:host=localhost",
    'root',
    $rootpassword
);

// Show errors
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// CREATE DATABASE
echo 'TRY to create Database ...';
$sql = "DROP DATABASE IF EXISTS $databasename";
$pdo->exec($sql);

$sql = "CREATE DATABASE $databasename";
$pdo->exec($sql);