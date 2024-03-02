

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Datum | CRM Admin Dashboard Template</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="../assets/images/favicon.ico" />
      
      <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="../assets/css/backend.css?v=1.0.0">  </head>
  <body class=" color-light ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
    <?php include './component/nav.php'; 
     include './component/sidebar.php';
     include './db/db.php';?>
       
      <div class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
            <form method="post">
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control" name="fname" id="fname" required>
                </div>
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control" name="lname" id="lname" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="Phone">Phone</label>
                    <input type="number" class="form-control" name="phn" id="Phone" required>
                </div>
                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" class="form-control" name="state" id="state" required>
                </div>
                <div class="form-group">
                    <label for="state">Source</label>
                    <input type="text" class="form-control" name="source" id="source" required>
                </div>
                <div class="form-group">
                    <label for="Inquiry">Inquiry</label>
                    <input type="text" class="form-control" name="inquiry" id="inquiry" required>
                </div>
                <div class="form-group">
                <label>Status</label>
                <select class="form-control mb-3" name="status">
                    <option selected="not-interested">Not interested</option>
                    <option value="Ordered">Ordered</option>
                    <option value="Hold">Hold</option>
                    <option value="Interested">Interested</option>
                </select>
                </div>
                
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <!-- <button type="submit" class="btn bg-danger" name="cancel">Cancel</button> -->
            </form>
            </div>
         </div>
      </div>
      </div>
    </div>

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

            $q = "INSERT INTO lead (fname, lname, email, phone, state, source, Inquiry, status) VALUES ('$fname', '$lname', '$email', '$phn', '$state', '$source', '$inquiry', '$status')";


            if($conn->query($q))
            echo "<script>alert('Lead added successfully');</script>";   
        }
        else{
            echo "else block";
        }
    ?>

    <!-- Wrapper End-->
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="../backend/privacy-policy.html">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="../backend/terms-of-service.html">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    <span class="mr-1">
                        Copyright
                        <script>document.write(new Date().getFullYear())</script>© <a href="#" class="">Datum</a>
                        All Rights Reserved.
                    </span>
                </div>
            </div>
        </div>
    </footer>    <!-- Backend Bundle JavaScript -->
    <script src="../assets/js/backend-bundle.min.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="../assets/js/customizer.js"></script>
    
    <script src="../assets/js/sidebar.js"></script>
    
    <!-- Flextree Javascript-->
    <script src="../assets/js/flex-tree.min.js"></script>
    <script src="../assets/js/tree.js"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="../assets/js/table-treeview.js"></script>
    
    <!-- SweetAlert JavaScript -->
    <script src="../assets/js/sweetalert.js"></script>
    
    <!-- Vectoe Map JavaScript -->
    <script src="../assets/js/vector-map-custom.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="../assets/js/chart-custom.js"></script>
    <script src="../assets/js/charts/01.js"></script>
    <script src="../assets/js/charts/02.js"></script>
    
    <!-- slider JavaScript -->
    <script src="../assets/js/slider.js"></script>
    
    <!-- Emoji picker -->
    <script src="../assets/vendor/emoji-picker-element/index.js" type="module"></script>
    
    
    <!-- app JavaScript -->
    <script src="../assets/js/app.js"></script>  </body>
</html>