<?php

require_once ("con_db.php");

function get_username($username) {
    $conn = connect();
    $query = "SELECT username FROM Users WHERE username=\"$username\"";
    $user_name = mysql_query($query, $conn) or die("Query fallita" . mysql_error($conn));
    $userrows = mysql_num_rows($user_name);
    if ($userrows > 0)
        return true;
    else
        return false;
}

;

function get_email($email) {
    $conn = connect();
    $query = "SELECT email FROM Users WHERE email=\"$email\"";
    $e_mail = mysql_query($query, $conn) or die("Query fallita" . mysql_error($conn));
    $emailrows = mysql_num_rows($e_mail);
    if ($emailrows > 0)
        return true;
    else
        return false;
}

;

function new_user($email, $username, $password) {
    $hpwd = sha1($password);
    $conn = connect();
    $query = "INSERT INTO Users VALUES (\"$email\", \"$username\", \"$hpwd\")";
    mysql_query($query, $conn) or die("Salvataggio dati fallito" . mysql_error($conn));
}

;

function mod_user($n_email, $n_username, $n_password) {
    $conn = connect();
    $query = "UPDATE Users SET";
    if (!empty($n_email))
        $query .= " email=\"$n_email\"";
    if (!empty($n_username)){
        if (!empty($n_email))
            $query .= ", username=\"$n_username\"";
        else
            $query .= " username=\"$n_username\"";
    }
    if(!empty($n_password)){
        $hnpwd = sha1($n_password);
        if(!empty($n_email)||!empty($n_username))
            $query .= ", password=\"$hnpwd\"";
        else
            $query .= " password=\"$hnpwd\"";
    }
    $where = " WHERE username=\"" . $_SESSION['username']. "\"";
    $query = $query . $where;
    mysql_query($query, $conn) or die("<p>Modifica fallita" . mysql_error($conn)."</p>");
}

;

function ver_email($email) {
    $find = "/^[a-zA-Z0-9-_.]+@[a-zA-Z0-9-_.]+.\bcom\b|\bit\b$/";
    if (!preg_match($find, trim($email))) {
        return true;
    } else {
        return false;
    }
}

;

function get_password($username) {
    $conn = connect();
    $query = "SELECT password FROM Users WHERE username=\"$username\"";
    $result = mysql_query($query, $conn) or die("Query fallita" . mysql_error($conn));
    $row = mysql_fetch_row($result);
    return $row[0];
}

?>
