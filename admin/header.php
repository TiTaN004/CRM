<?php
ob_start();
error_reporting(1);
session_start();
include("connect.php");

if(!$_SESSION['login_user_name'])
{
    header('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <style type="text/css">
        a
        {
            color: #000;
        }
        .box-content
        {
            background-color: #fff;
        }
        hr
        {
            display: none;
        }
        .box-inner{
            background:linear-gradient(rgba(255,255,255,1),rgba(3, 60, 115, 0.9) 60%,rgba(255,255,255,1));

        }
        body
        {
            background:linear-gradient(60deg ,rgba(4, 81, 155, 0.6), rgba(3, 60, 115, 0.9) 60%, rgba(2, 50, 95, 0.02));
        }

        input[type=date],input[type=time]
        {
            padding: 0px 10px !important;
        }
        .btn-info
        {
           border: 1px outset #fff;
        }
    </style>
    <script>

        $(document).ready(function(e){

            $(".datepicker" ).datepicker({
              dateFormat: 'dd/mm/yy',//check change
              changeMonth: true,
              changeYear: true
            });

          } );
  </script>

</head>

<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation" style="border:none">

        <div class="navbar-inner" style="background: linear-gradient(50deg,#00c6ff,#0072ff) !important;">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home.php"> <img alt="Charisma Logo" src="img/logo20.png" class="hidden-xs"/>
             </a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
               
                   <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php echo $_SESSION['login_user_name'];?></span>
                    &nbsp;&nbsp;&nbsp;
                 <a href="logout.php">Logout</a>
                
            </div>
            <!-- user dropdown ends -->

            
            <!-- theme selector ends -->

            

        </div>
    </div>
    <!-- topbar ends -->
<!--/.fluid-container-->