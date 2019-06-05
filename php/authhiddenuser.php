<?php
    session_start();
    if ($_POST["password"] == "Danny+Alexis2019") {
        $_SESSION['authed'] = "auth";
        header("Location: ./allformdata.php");
    } else {
        header("Location: ./unauthorized.php");
    }
?>