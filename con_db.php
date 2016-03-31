<?php

function connect() {
    $host = "localhost";
    $user = "gvanin";
    $pwd = "xKwlU1GZ";

    $conn = mysql_connect($host, $user, $pwd) or die($_SERVER['PHP_SELF'] . "Connessione fallita!");

    $dbname = "gvanin-PR";
    mysql_select_db($dbname);
    
    return $conn;
}
?>
