<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../../assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="../../assets/css/backend.css?v=1.0.0"> 
      
      <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
   document.addEventListener('DOMContentLoaded', function () {
       var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
       myModal.show();
    });
    </script>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<?php
    include '../db/db.php';

    if (isset($_POST['submit'])) {
        $txt = $_POST['txt'];

        $q = "SELECT * FROM lead WHERE 
        fname LIKE '%$txt%' OR 
        lname LIKE '%$txt%' OR 
        email LIKE '%$txt%' OR 
        phone LIKE '%$txt%' OR 
        status LIKE '%$txt%' OR 
        state LIKE '%$txt%' OR 
        Inquiry LIKE '%$txt'";

        $result = $conn->query($q);

        // $row = $result->fetch_assoc();
        ?>
    
<body>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Result</h1>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <div class="modal-body">
      <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Fist Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">State</th>
                <th scope="col">Source</th>
                <th scope="col">Inquiry</th>
                <th scope="col">Status</th>
                <th scope="col" colspan="2">Edit</th>
            </tr>
        </thead>
        <tbody>
                <?php
                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                        <th scope='row'>".$row['id']."</th>
                        <td>".$row['fname']."</td>
                        <td>".$row['lname']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['phone']."</td>
                        <td>".$row['state']."</td>
                        <td>".$row['source']."</td>
                        <td>".$row['Inquiry']."</td>
                        <td>".$row['status']."</td>
                        <td><a href='./operation/edit.php?id=".$row['id']."'><button type='button' class='btn btn-primary rounded-pill mt-2'>Edit</button></a>
                        <a href='./operation/delete.php?id=".$row['id']."'><button type='button' class='btn btn-danger rounded-pill mt-2'>Delete</button></a>
                        </td>
                     </tr>";
                    }
                ?>
        </tbody>

        </table>
      </div>
      <div class="modal-footer">
        <a href="../manage-lead.php"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button></a>
        <!-- <button type="submit" class="btn btn-primary" name="submit">Submit</button> -->
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

<?php }


?>

