<?php include './backend/db/db.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="assets/images/favicon.ico" />
      <link rel="stylesheet" href="assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="assets/css/backend.css?v=1.0.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script>
        setInterval(() => {
            window.location = './component/popup.php'
            <?php //include_once 'temp.php'; ?>
        }, 10000);
    </script>
</head>
<body >
        <div class='container text-center'>
            <div class='row gy-1 mt-5'> 
<?php 
    $q = "select * from product";

    $result = $conn->query($q);

    while ($row=$result->fetch_assoc()) {
        echo "
            <div class='col'>
                <div class='card' style='width: 18rem;min-height: 340px;'>
                <img src='./assets/images/". $row['img_url'] ."' class='card-img-top' alt='...'>
                <div class='card-body' style='
                display: flex;
                flex-wrap: wrap;
                align-content: center;
                justify-content: center;
            '>
                    <h5 class='card-title'>".$row['name']."</h5>
                    <p class='card-text'>".$row['description']."</p>
                    <a href='#' class='btn btn-primary'>Go somewhere</a>
                </div>
                </div>
            </div>
        ";
    }
?>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>