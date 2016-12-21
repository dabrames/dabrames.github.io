<html>
</body>
<?php
$servername = "setapproject.org";
$username = "csc412";
$password = "csc412";
$dbname = "csc412";
$quote = $_POST["quote"];
$name = $_POST["name"];
// Create connection
$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Visitors(Attributed,Quote) VALUES('$name','$quote')";

if($conn->query($sql) === TRUE){
    echo "New record created successfully" . "<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql_print = "SELECT * FROM Visitors";
$result = $conn->query($sql_print);

if($result->num_rows > 0){
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Quote: " . $row["Quote"]. " - Author:  " . $row["Attributed"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();

?>
</body>
</html>
