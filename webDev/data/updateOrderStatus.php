<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $emails = explode(',', $_GET['emails']);
    // echo $emails;
    $user = 'root';
    $pass = '';
    $db = 'grocerydb';
    $conn = mysqli_connect('localhost', $user, $pass, $db);
    if (mysqli_connect_errno()) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }

    // create the statement object
    $stmt = mysqli_prepare($conn, "UPDATE custorder, user, customer 
    SET custorder.isDelivered = true
    WHERE 
        user.userPID = customer.userPID 
        AND customer.custID = custorder.custId 
        AND user.email =?;
    ");



    // loop through the emails and execute the query
    foreach ($emails as $email) {
        // bind the email parameter to the statement

        mysqli_stmt_bind_param($stmt, "s", $email);

        // execute the statement
        mysqli_stmt_execute($stmt);
    }

    // close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
