<?php
$db = new PDO("pgsql:host=localhost;dbname=g246","g246","ZXQewP");
$result=$db->exec('SET search_path to g246scrum');

function db() { global $db; return $db; }



