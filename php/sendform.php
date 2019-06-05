<?php
    $dbhost = "localhost:3306";
    $dbuser = "theferol_admin";
    $dbpass = "Danny+Alexis2019";
    $db = "theferol_wedding";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);
    //$sql = "INSERT INTO invitations (firstname, lastname, addr1, addr2, city, [state], zip, add_guests, [location]) VALUES (DEFAULT, ?, ?, ?, ?, ?, ?, ?, ?, DEAFULT, ?)";
    $sql = "INSERT INTO invitations VALUES (DEFAULT, ?, ?, ?, ?, ?, ?, ?, ?, DEFAULT, ?)";
    $insert_query = $conn->prepare($sql);
    if ($insert_query == false) {
        echo "error";
        foreach ($conn->error_list as $error) {
            echo "Error" . $error;
        }
    } else {
        $insert_query->bind_param("sssssssis", $firstname, $lastname, $addr1, $addr2, $city, $state, $zip, $add_guests, $location);
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $addr1 = $_POST["address1"];
        $addr2 = $_POST["address2"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $zip = $_POST["zip"];
        $add_guests = $_POST["guest_num"];
        $location = $_POST["location"];
        if ($firstname != "") {
            $insert_query->execute();
            $insert_query->close();
        }
        $conn->close();
        echo "
            <html>
                <style>
                    body {
                        text-align: center;
                    }
                </style>
                <body>
                    <br>
                    <br>
                    <h3>Thank you for your RSVP!</h3>
                    <p>You will be redirected back to our website shortly...</p>
                </body>
            </html>
            <script>
                setTimeout(function(){
                    window.location.href = 'http://www.theferolinos.com'; 
                }, 3000);
            </script>"
        ;

    }
?>

