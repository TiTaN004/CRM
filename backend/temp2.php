<?php 
    include './db/db.php';

    $q = "SELECT status, COUNT(*) as status_count
    FROM lead
    GROUP BY status;";

    $result = $conn->query($q);

    // $row = $result->fetch_assoc();

    $data = array();

    while($row=$result->fetch_assoc()){
      $data[] = $row;
      
    }
    
    $json = json_encode($data);
    echo $json;

    header('Content-type: application/json');
    ?>