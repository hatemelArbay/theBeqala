<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grocerydb";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "test";

$sql = "SELECT u.userPID, u.name AS custName, u.email, u.address, u.phoneNum, 
GROUP_CONCAT(CONCAT(p.productName, ' (', p.productPrice, ')', ' x ', o.quantity) SEPARATOR ', ') AS orderedItems, 
GROUP_CONCAT(o.quantity SEPARATOR ',') AS productQuantities,
o.isDelivered
FROM custOrder o
JOIN customer c ON o.custID = c.custID 
JOIN product p ON o.productID = p.productID 
JOIN user u ON c.userPID = u.userPID
GROUP BY u.userPID;";

// Execute SQL query and assign result to $result
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $userId = $row["userPID"];
        $name = $row["custName"];
        $phoneNum = $row["phoneNum"];
        $address = $row["address"];
        $email = $row["email"];
        $orderedItems = $row["orderedItems"];
        $productQuantities = $row["productQuantities"];
        $isDelivered = $row["isDelivered"];

        // Split the string into product names, prices, and quantities
        $items = explode(", ", $orderedItems);
        $quantities = explode(",", $productQuantities);
        $productNames = array();
        $productPrices = array();
        foreach ($items as $item) {
            $temp = explode(" (", $item);
            array_push($productNames, $temp[0]);
            array_push($productPrices, substr($temp[1], 0, -5));
        }

        $item = array(
            "id" => $userId,
            "name" => $name,
            "phoneNum" => $phoneNum,
            "address" => $address,
            "email" => $email,
            "productNames" => $productNames,
            "productPrices" => $productPrices,
            "productQuantities" => $quantities,
            "isDelivered" => $isDelivered
        );

        $data[$userId] = $item;
    }

    // Write data to JSON file
    $json_data = json_encode($data, JSON_PRETTY_PRINT);
    $file = 'orderData.json';
    if (file_put_contents($file, $json_data)) {
        echo "Data saved to JSON file.";
    } else {
        echo "Unable to save data to JSON file.";
    }
} else {
    echo "0 results";
}

// Close database connection
$conn->close();
