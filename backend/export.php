<?php
    include './db/db.php';
    $sql = "SELECT * FROM lead";
    $result = $conn->query($sql);

    // Check if there are any results
    if ($result->num_rows > 0) {
        // Define the CSV file name
        $csvFileName = 'exported_data.csv';
    
        // Open the CSV file for writing
        $csvFile = fopen($csvFileName, 'w');
    
        // Fetch the column names and write them to the CSV file
        $columnNames = [];
        while ($row = $result->fetch_assoc()) {
            if (empty($columnNames)) {
                $columnNames = array_keys($row);
                fputcsv($csvFile, $columnNames);
            }
    
            // Write each row to the CSV file
            fputcsv($csvFile, $row);
        }
    
        // Close the CSV file
        fclose($csvFile);
    
        // Provide the CSV file for download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename=' . $csvFileName);
    
        // Output the file to the browser
        readfile($csvFileName);
    
        // You may want to delete the file after download
        unlink($csvFileName);
    } else {
        echo "No records found in the database.";
    }
        // }
?>