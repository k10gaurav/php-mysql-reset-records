<?php

// Database connection parameters
$servername = "sql6.freesqldatabase.com"; // Change this to your database server name
$username = "sql6693962"; // Change this to your database username
$password = "VEhKY47ZDU"; // Change this to your database password
$dbname = "sql6693962"; // Change this to your database name

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
