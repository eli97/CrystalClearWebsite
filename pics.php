<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "pic";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<!doctype html>
<html>
    <head>
        <title>Images</title>
    </head>
    <body>

        <h1>Images</h1>

        <?php

        $query = 'SELECT id, name, filename FROM imgs';

        $result = mysqli_query($conn, $query);

        if (!$result)
        {
            echo 'Error Message: ' . mysqli_error($conn) . '<br>';
            exit;
        }

        while ($record = mysqli_fetch_assoc($result))
        {

            echo '<hr>';

            echo '<h2>'.$record['name'].'</h2>';

            echo '<img src="images/'.$record['filename'].'">';

        }

        ?>        

    </body>
</html>