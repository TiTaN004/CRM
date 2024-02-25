<?php 
    include '../db/db.php';
    $id = $_GET['id'];

    $q = "select * from lead where id = $id";

    $result = $conn->query($q);

    $row = $result->fetch_assoc();

    $fname = $row['fname'];
    $lname = $row['lname'];
    $email = $row['email'];
    $phone = $row['phone'];
    $state = $row['state'];
    $source = $row['source'];
    $Inquiry = $row['Inquiry'];
    $status = $row['status'];
?>

<!DOCTYPE html>
<html lang="en">
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Datum | CRM Admin Dashboard Template</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
      
      <link rel="stylesheet" href="../../assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="../../assets/css/backend.css?v=1.0.0"> 
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <script>
   document.addEventListener('DOMContentLoaded', function () {
       var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
       myModal.show();
   });
</script>
      
    </head>
<body>
    
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post">
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $fname ?>" required>
                </div>
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $lname ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $email ?>" required>
                </div>
                <div class="form-group">
                    <label for="Phone">Phone</label>
                    <input type="number" class="form-control" name="phn" id="Phone" value="<?php echo $phone ?>" required>
                </div>
                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" class="form-control" name="state" id="state" value="<?php echo $state ?>" required>
                </div>
                <div class="form-group">
                    <label for="state">Source</label>
                    <input type="text" class="form-control" name="source" id="source" value="<?php echo $source ?>" required>
                </div>
                <div class="form-group">
                    <label for="Inquiry">Inquiry</label>
                    <input type="text" class="form-control" name="inquiry" id="inquiry" value="<?php echo $Inquiry ?>" required>
                </div>
                <div class="form-group">
                <label>Status</label>
                <select class="form-control mb-3" name="status">
                    <option selected="<?php echo $status ?>"><?php echo $status ?></option>
                    <option value="not-interested">Not interested</option>
                    <option value="Ordered">Ordered</option>
                    <option value="Hold">Hold</option>
                </select>
                </div>
           

            

      </div>
      <div class="modal-footer">
        <a href="../manage-lead.php"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button></a>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </div>
      </form>
      <?php 
                if (isset($_POST['submit'])) {
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $email = $_POST['email'];
                    $phn = $_POST['phn'];
                    $state = $_POST['state'];
                    $inquiry = $_POST['inquiry'];
                    $status = $_POST['status'];
                    $source = $_POST['source']; 
        
                    // $q = "insert into lead (fname,lname,email,phone,state,source,Inquiry,status) values ('$fname','$lname,'$email,$phn,'$state,'$source','$inquiry,'$status')";
        
                    $q = "update lead set fname='$fname', lname='$lname', email='$email', phone=$phn, state='$state', Inquiry='$inquiry', status='$status', source='$source' where id=$id";
        
        
                    if($conn->query($q))
                    echo "<script>alert('Lead Updated successfully'); window.location = '../manage-lead.php'</script>";   
                }
                
                
            ?>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>