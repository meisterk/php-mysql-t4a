<?php
// DATA
$rootpassword = 'mysql';
$databasename = 'testdatabase';
$username = 'testuser';
$password = '123';

// Root-Connection to MySQL/MariaDB
$pdo = new PDO(
    "mysql:host=localhost",
    'root',
    $rootpassword
);

// Show errors
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// CREATE DATABASE
echo 'TRY to create database ...<br>';
$sql = "DROP DATABASE IF EXISTS $databasename";
$pdo->exec($sql);

$sql = "CREATE DATABASE $databasename";
$pdo->exec($sql);

// CREATE USER
echo 'TRY to create user ...<br>';
$sql = "DROP USER IF EXISTS '$username'@'localhost'";
$pdo->exec($sql);

$sql = "CREATE USER '$username'@'localhost' IDENTIFIED with mysql_native_password BY '$password'";
$pdo->exec($sql);

// SET PERMISSIONS FOR USER
echo 'TRY to set permissions ...<br>';
$sql = "GRANT ALL PRIVILEGES ON $databasename.* TO '$username'@'localhost'";
$pdo->exec($sql);