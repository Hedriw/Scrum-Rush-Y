<?php
$db = new PDO("pgsql:host=localhost port=5433;dbname=duvety","duvety","wHgGzY");
$result=$db->exec('SET search_path to duvetyscrum');

function db() { global $db; return $db; }



