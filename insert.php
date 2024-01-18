<?php
$host = 'drona.db.elephantsql.com';
$dbname = 'oslqsnga';
$user = 'oslqsnga';
$password = 'qEp_-VaAjMOnNyCDUnKKl40zNI2YVSuz';

// Establish a connection to the database
$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $target = $_POST['target'];
    $date = $_POST['date'];
    $rating = $_POST['rating'];

    // Insert data into the 'goals' table
    $result = pg_query_params($conn, 'INSERT INTO goals (target, date, rating) VALUES ($1, $2, $3)', array($target, $date, $rating));

    if ($result) {
        echo "Goal added successfully!";
    } else {
        echo "Error adding goal: " . pg_last_error();
    }
}

// Close the database connection
pg_close($conn);
?>
