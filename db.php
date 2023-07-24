<?php
    $db = new PDO("mysql:host=localhost;dbname=code", "root", "");
    $db->exec("SET NAMES utf8");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>