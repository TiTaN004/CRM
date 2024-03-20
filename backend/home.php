<?php  include './component/nav.php';  include './component/sidebar.php';

   include './db/db.php';

   $q = 'select count(*) as total_lead from lead';

   $result = $conn->query($q);

   $row = $result->fetch_assoc();

   $total = $row['total_lead'];

   $q = 'select count(*) as total_ordered from lead where status = "ordered" ';

   $result = $conn->query($q);

   $row = $result->fetch_assoc();

   $order = $row['total_ordered'];

   $q = 'select count(*) as total_inquiry from lead where status = "inquiry" ';

   $result = $conn->query($q);

   $row = $result->fetch_assoc();

   $newLead = $row['total_inquiry'];

   // echo $total;

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Datum | CRM Admin Dashboard Template</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="../assets/images/favicon.ico" />
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="../assets/css/backend.css?v=1.0.0">  
      <script>
         

async function fetchData1() {
      try {
        const response = await fetch('http://localhost/CRM/api/get_status_data.php');
        const data = await response.json();
        return data;
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    }

    async function renderPieChart1() {
      const statusData = await fetchData1();

      if (!statusData) {
        return;
      }

      const statusLabels = statusData.map(data => data.status);
      const statusCounts = statusData.map(data => data.status_count);

      const ctx = document.getElementById('statusPieChart').getContext('2d');
      const pieChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: statusLabels,
          datasets: [{
            data: statusCounts,
            backgroundColor: getRandomColors(statusData.length),
          }]
        }
      });
    }

    function getRandomColors(num) {
      const colors = [];
      for (let i = 0; i < num; i++) {
        colors.push(`rgba(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, 0.7)`);
      }
      return colors;
    }

    renderPieChart1();

//chart2
        async function fetchLeadData() {
            try {
                let response = await fetch('http://localhost/CRM/api/get_lead_data.php');
                let data = await response.json();
                return data;
            } catch (error) {
                console.error('Error fetching lead data:', error);
            }
        }

        async function renderBarChart1() {
            let leadData = await fetchLeadData();
            
            // Extract states and counts from leadData
            let states = leadData.map(item => item.state);
            let counts = leadData.map(item => parseInt(item.count));

            // Create a bar chart
            let ctx = document.getElementById('leadChart').getContext('2d');
            let leadChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: states,
                    datasets: [{
                        label: 'Lead Count',
                        data: counts,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        // Call the function to render the bar chart
        renderBarChart1();

        async function fetchData() {
      try {
        const response = await fetch('http://localhost/CRM/api/get_origin_data.php'); // Replace with the actual path to your PHP script
        const data = await response.json();
        return data;
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    }

    async function renderBarChart() {
      const sourceData = await fetchData();

      if (!sourceData) {
        return;
      }

      const sourceLabels = sourceData.map(data => data.source);
      const sourceCounts = sourceData.map(data => data.source_count);

      const ctx = document.getElementById('sourceBarChart').getContext('2d');
      const barChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: sourceLabels,
          datasets: [{
            label: 'Source Wise Count',
            data: sourceCounts,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    }

    renderBarChart();
    </script>
      </script>
   </head>
  <body class="  ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <div class="wrapper">
    
       
      <div class="content-page">
<div class="container-fluid">
   <div class="row">
      <div class="col-md-12 mb-4 mt-1">
         <div class="d-flex flex-wrap justify-content-between align-items-center">
             <h4 class="font-weight-bold">Overview</h4>
         </div>
      </div>
      <div class="col-lg-8 col-md-12">
         <div class="row">
            <div class="col-md-4">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-2 text-secondary">Total Lead</p>
                            <div class="d-flex flex-wrap justify-content-start align-items-center">
                               <h5 class="mb-0 font-weight-bold"><?php echo $total ?></h5>
                               <!-- <p class="mb-0 ml-3 text-success font-weight-bold">+3.55%</p> -->
                            </div>                            
                        </div>
                     </div>
                  </div>
               </div>   
            </div>
            <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-2 text-secondary">Total Order</p>
                            <div class="d-flex flex-wrap justify-content-start align-items-center">
                               <h5 class="mb-0 font-weight-bold"><?php echo $order ?></h5>
                               <!-- <p class="mb-0 ml-3 text-success font-weight-bold">+2.67%</p> -->
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>   
            </div>
            <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                           <p class="mb-2 text-secondary">New Leads</p>
                           <div class="d-flex flex-wrap justify-content-start align-items-center">
                              <h5 class="mb-0 font-weight-bold"><?php echo $newLead ?></h5>
                              <!-- <p class="mb-0 ml-3 text-danger font-weight-bold">-9.98%</p> -->
                           </div>                            
                        </div>
                    </div>
                </div>
            </div>   
            </div>
            <div class="col-md-12" >
            <div class="card" style="
               display: flex;
               align-items: center;
            ">
                <div class="card-body" style="
               display: flex;
               width: 500px;
               justify-content: center;
            ">
                  <h1>Lead Status</h1>
                  <canvas id="statusPieChart" width="400" height="200"></canvas>                   <!-- <div id="chart-apex-column-01" class="custom-chart"></div> -->
                </div>
            </div>   
            </div>
         </div>
      </div>
      <div class="col-md-4">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-body">
                  <h1>State</h1>
                  <canvas id="leadChart" width="400px" height="500px"></canvas>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-8">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-body">
                  <h1>Lead Origin</h1>
                  <canvas id="sourceBarChart" width="400" height="200"></canvas>
               </div>
            </div>
         </div>
      </div>
      </div>
      <div class="col-lg-12 col-md-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">New Customer</h4>
               </div>
            </div>   
            <div class="card-body p-0">
               <div class="table-responsive">
                  <table class="table mb-0">
                  <thead class="thead-light">
                     <tr>
                        <th scope="col">id</th>
                        <th scope="col">Fist Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <!-- <th scope="col">State</th>
                        <th scope="col">Source</th>
                        <th scope="col">Inquiry</th>
                        <th scope="col">Status</th>
                        <th scope="col" colspan="2">Edit</th> -->
                     </tr>
                  </thead>
                  <tbody>
      
      <?php 
      $offset = 0;
      $resultsPerPage = 4;
           $sql = "SELECT * FROM lead WHERE status = 'inquiry' LIMIT $offset, $resultsPerPage";
           
           $result = $conn->query($sql);
   
           while($row = $result->fetch_assoc()){
               echo "<tr>
               <th scope='row'>".$row['id']."</th>
               <td>".$row['fname']."</td>
               <td>".$row['lname']."</td>
               <td>".$row['email']."</td>
               <td>".$row['phone']."</td>
               <!--<td>".$row['state']."</td>
               <td>".$row['source']."</td>
               <td>".$row['Inquiry']."</td>
               <td>".$row['status']."</td>
               <td><a href='./operation/edit.php?id=".$row['id']."'><button type='button' class='btn btn-primary rounded-pill mt-2'>Edit</button></a>
               <a href='./operation/delete.php?id=".$row['id']."'><button type='button' class='btn btn-danger rounded-pill mt-2'>Delete</button></a>
               </td>-->
            </tr>";
           }
         ?>
         
       
      <!-- </tbody> -->
                  </table>
                  <div class="d-flex justify-content-end align-items-center border-top-table p-3">
                           <a href="./status-inquiry.php"><button class="btn btn-secondary btn-sm">See All</button></a>
                        </div>
               </div>
            </div>
         </div>
      </div>
    <!-- Page end  -->
</div>
      </div>
    </div>
    <!-- Wrapper End-->
    <?php include './component/footer.php'; ?>   <!-- Backend Bundle JavaScript -->
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