<?php
/**
 * Created by PhpStorm.
 * User: ctyi
 * Date: 4/30/15
 * Time: 9:13 PM
 */
try {
    $con = new PDO('mysql:host=mysql;dbname=whitehat;charset=utf8', 'whitehat', 'whitehat');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print "Connection failed: " . $e->getMessage() . "</br>";
}
