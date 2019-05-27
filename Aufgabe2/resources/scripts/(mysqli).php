<?php

// =======================================================================
// Connect to MySQL (MySQLi)
// - PHP-Extension php_mysqli.dll nötig

function connectDB2()
{
    $servername = "localhost";
    $username = "testuser";
    $password = "testuser";
    $dbname = "mydatabase";

    try {
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM firsttable";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo $row["PrimaryKey"] . " | " . $row["SecondColumn"] . " | " . $row["ThirdColumn"] . "<br>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    } catch (Exception $e) {
        echo 'Verbindung zur Datenbank fehlgeschlagen: ' . $e->getMessage();
    }
}
