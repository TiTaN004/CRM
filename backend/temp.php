<html>
  <head>
   
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">


        // fetch('http://localhost/CRM/backend/temp2.php')
        //   .then(response => response.json())
        //   .then(data => {
        //     console.log(data)
        //   })
        //   .catch(error => console.error('error fetching data',error));

          // async function temp(){
          //   let data = await fetch('http://localhost/CRM/backend/temp2.php');
          //   let parsedData =await data.json();
          //   console.log(parsedData);
          // }
          // temp()

          async function temp() {
    try {
        let response = await fetch('http://localhost/CRM/backend/temp2.php');
        let data = await response.json();

        // Convert array of objects to an array of arrays
        let formattedData = data.map(item => [item.status, parseInt(item.status_count)]);

        console.log(formattedData);
    } catch (error) {
        console.error('Error fetching data:', error);
    }
}

temp();
      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Mushrooms', 5],
          ['Onions', 5],
          ['Olives', 1],
          ['Zucchini', 1],
          ['Pepperoni', 2]
        ]);

        // Set chart options
        var options = {'title':'How Much Pizza I Ate Last Night',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>
</html>