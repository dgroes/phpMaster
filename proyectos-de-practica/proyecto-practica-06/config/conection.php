<?php

$server = 'localhost';
$user = 'root';
$pasword = '';
$database = 'blog_cirice';
$db = mysqli_connect($server, $user, $pasword, $database);

mysqli_query($db, "SET NAMES 'utf8'");
