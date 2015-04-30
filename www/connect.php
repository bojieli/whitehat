<?php
/**
 * Created by PhpStorm.
 * User: ctyi
 * Date: 4/30/15
 * Time: 9:13 PM
 */
try {
    $con = new PDO('mysql:host=127.0.0.1;dbname=whitehat;charset=utf8', 'whitehat', 'whitehat');
} catch (PDOException $e) {
    print "Error: " . $e->getMessage() . "</br>";
}