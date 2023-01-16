<!-- PDO php connection -->

<?php

// connection details
$username = "root";
$password = "0904@24MGs";


try {
    $conn = new PDO("mysql:host=localhost;dbname=dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>