<?php
    session_start();
    if (!isset($_SESSION['authed'])) {
        header("Location: ./unauthorized.php");
        return;
    }
?>

<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    </head>
    <body>
        <table class='table table-striped' id="data">
            <tr>
                <th class='text-center'>First Name</th>
                <th class='text-center'>Last Name</th>
                <th class='text-center'>Address Line 1</th>
                <th class='text-center'>Address Line 2</th>
                <th class='text-center'>City</th>
                <th class='text-center'>State</th>
                <th class='text-center'>Zip</th>
                <th class='text-center'>Additional Guests</th>
                <th class='text-center'>Location</th>
                <th class='text-center'>Invitation Sent</th>
                <th></th>
            </tr>
            <?php
                $dbhost = "localhost:3306";
                $dbuser = "theferol_admin";
                $dbpass = "Danny+Alexis2019";
                $db = "theferol_wedding";
                $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);
                $query = "select * from invitations";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if ($row["invissent"] == true) {
                            echo "<tr>
                            <td class='text-center'>" . $row["firstname"]. "</td>
                            <td class='text-center'>" . $row["lastname"]. "</td>
                            <td class='text-center'>" . $row["addr1"]. "</td>
                            <td class='text-center'>" . $row["addr2"]. "</td>
                            <td class='text-center'>" . $row["city"]. "</td>
                            <td class='text-center'>" . $row["state"]. "</td>
                            <td class='text-center'>" . $row["zip"]. "</td>
                            <td class='text-center'>" . $row["add_guests"]. "</td>
                            <td class='text-center'>" . $row["location"]. "</td>
                            <td class='text-center'><i style='color:green;' class='far fa-check-circle'></i></td>
                            <td class='text-center'><a href='./togglesentbyid.php?id=" . $row["id"]. "&val=0' class='btn btn-xs btn-danger'>Mark as Unsent</a></td>
                            </tr>";
                        } else {
                            echo "<tr>
                            <td class='text-center'>" . $row["firstname"]. "</td>
                            <td class='text-center'>" . $row["lastname"]. "</td>
                            <td class='text-center'>" . $row["addr1"]. "</td>
                            <td class='text-center'>" . $row["addr2"]. "</td>
                            <td class='text-center'>" . $row["city"]. "</td>
                            <td class='text-center'>" . $row["state"]. "</td>
                            <td class='text-center'>" . $row["zip"]. "</td>
                            <td class='text-center'>" . $row["add_guests"]. "</td>
                            <td class='text-center'>" . $row["location"]. "</td>
                            <td class='text-center'><i style='color:red;' class='fas fa-ban'></i></td>
                            <td class='text-center'><a href='./togglesentbyid.php?id=" . $row["id"]. "&val=1' class='btn btn-xs btn-success'>Mark as Sent</a></td>
                            </tr>";
                        }
                    }
                } else {
                    echo "0 results";
                }
                $conn -> close();
            ?>
        </table>
    </body>
</html>