<?php
    include '../db/db.php';
    $id = $_GET['id'];

    $q = "delete from lead where id = $id";

    if($conn->query($q)){
        echo "<script>alert('deleted successfully');</script>";
        ?><script>window.location = "../manage-lead.php"</script><?php
    }
?>