<?php
    session_start();
    if (!isset($_SESSION['authed'])) {
        header("Location: ./unauthorized.php");
        return;
    }
    $dbhost = "localhost:3306";
    $dbuser = "theferol_admin";
    $dbpass = "Danny+Alexis2019";
    $db = "theferol_wedding";
    $id = $_GET["id"];
    $val = $_GET["val"];
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);
    $query = "update invitations set invissent = " . $val . " where id = " . $id . ";";
    $result = $conn->query($query);
    $conn -> close();
    header("Location: ./allformdata.php");
?>
