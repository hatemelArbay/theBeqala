
<?php
if (isset($_POST['getRevenue'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "grocerydb";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Build the SQL statement
    $sql = "SELECT SUM(totalBill) AS total FROM payment";

    // Execute the SQL statement
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result) {
        // Fetch the result row as an associative array
        $row = $result->fetch_assoc();

        // Store the total bill in a variable and echo it
        $total = $row['total'];
        echo $total;
        echo "<script>document.querySelector('h1.revenue').innerHTML = : $total';</script>";
    } else {
        echo "test: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
