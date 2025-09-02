<?php
// Database connection info
$host = 'db';
$user = 'root';
$pass = '123456';
$mydatabase = 'lms';

// Create connection
$conn = new mysqli($host, $user, $pass, $mydatabase);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Run query
$sql = "SELECT * FROM books";
$result = $conn->query($sql);

// Check if rows exist
if ($result->num_rows > 0) {
    // Fetch column names
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>";
    while ($fieldinfo = $result->fetch_field()) {
        echo "<th>" . $fieldinfo->name . "</th>";
    }
    echo "</tr>";

    // Fetch rows
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $col) {
            echo "<td>" . htmlspecialchars($col) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();
?>
