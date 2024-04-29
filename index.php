<?php

// Database connection parameters
$servername = "mysql-b1771805-d0ae-4ce9-b5c8-2a10cd888fae-rmmrdb2370266517-cho.h.aivencloud.com:23412"; // Change this to your database server name
$username = "avnadmin"; // Change this to your database username
$password = "AVNS_6cXtDv8x8QoCUM0Ky4S"; // Change this to your database password
$dbname = "defaultdb"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Call the stored procedure
$updated_rows = 0;
$conn->query("CALL UpdateInactiveRecords(@updated_rows)");

// Fetch the updated rows count
$result = $conn->query("SELECT @updated_rows AS updated_rows_count");
$row = $result->fetch_assoc();
$updatedRowsCount = $row['updated_rows_count'];

echo "Number of updated rows: " . $updatedRowsCount;

// Close connection
$conn->close();

?>
