<?php
include '../backend/db/db.php';

$q = "SELECT state, COUNT(*) as count FROM lead GROUP BY state";
$result = $conn->query($q);

$data = array();

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

header('Content-type: application/json');
echo json_encode($data);

$conn->close();
?>
