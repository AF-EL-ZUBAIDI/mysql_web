<?php
/**
 * This script handles the database connection and data retrieval.
 * 
 * @author Abed Zubaidi
 * @date 12/12/23
 * 
 */


// Enable error 
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Database connection variables
$servername = "localhost";
$username = "root";  // Your MySQL username
$password = "";      // Your MySQL password
$dbname = "mydatabase"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select data from the table
$sql = "SELECT name, age FROM mytable";
$result = $conn->query($sql);

// Check if there are results from the query
if ($result->num_rows > 0) {
  // Start the table HTML
  echo "<table><tr><th>Name</th><th>Age</th></tr>";
  
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . htmlspecialchars($row["name"]) . "</td><td>" . htmlspecialchars($row["age"]) . "</td><td>";
  }
  
  // Close the table HTML
  echo "</table>";
} else {
  echo "0 results";
}

// Close the connection
$conn->close();
?>
