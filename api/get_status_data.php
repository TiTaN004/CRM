<?php
// Assuming you have a database connection in db.php
include '../backend/db/db.php';

// Fetch data from the lead table
$query = "SELECT status, COUNT(*) as status_count FROM lead GROUP BY status";
$result = $conn->query($query);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
header('Content-type: application/json');
echo json_encode($data);

// Close the database connection
$conn->close();
?>
