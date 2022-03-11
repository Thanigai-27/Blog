<?php 

session_start();

include('includes/config.php');

error_reporting(0);

if(strlen($_SESSION['admin']['username'])==0)

  { 

header('location:index.php');
}
include 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;


$connect = new PDO("mysql:host=localhost;dbname=blog", "root", "");


$query = "SELECT * FROM posts ";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();



if(isset($_POST['export']))
{
   $file = new Spreadsheet();

$active_sheet = $file->getActiveSheet();
$active_sheet->SetCellValue('A1','User_id'); 
$active_sheet->SetCellValue('B1','Title');
$active_sheet->SetCellValue('C1','Category');
$active_sheet->SetCellValue('D1','Content');
$active_sheet->SetCellValue('E1','Image');
$active_sheet->SetCellValue('F1','Views');
$active_sheet->SetCellValue('G1','Created_at');
$active_sheet->SetCellValue('H1','Active');
$active_sheet->SetCellValue('I1','Updataed_at');
$active_sheet->SetCellValue('J1','Published');
$active_sheet->SetCellValue('K1','Published_date');
$active_sheet->SetCellValue('L1','Username');
$active_sheet->SetCellValue('M1','Feedback');
$active_sheet->SetCellValue('N1','Devices');
$active_sheet->SetCellValue('O1','Likes');
$active_sheet->SetCellValue('P1','Dislikes');
$count=2;
foreach($result as $row)
  {
    $active_sheet->setCellValue('A' . $count, $row['user_id']);
    $active_sheet->setCellValue('B' . $count, $row['title']);
    $active_sheet->setCellValue('C' . $count, $row['category']);
    $active_sheet->setCellValue('D' . $count, $row['content']);
    $active_sheet->setCellValue('E' . $count, $row['image']);
    $active_sheet->setCellValue('F' . $count, $row['views']);
    $active_sheet->setCellValue('G' . $count, $row['created_at']);
    $active_sheet->setCellValue('H' . $count, $row['active']);
    $active_sheet->setCellValue('I' . $count, $row['updated_at']);
    $active_sheet->setCellValue('J' . $count, $row['published']);

$active_sheet->setCellValue('K' . $count, $row['published_date']);

$active_sheet->setCellValue('L' . $count, $row['username']);

$active_sheet->setCellValue('M' . $count, $row['feedback']);
$active_sheet->setCellValue('N' . $count, $row['devices']);
$active_sheet->setCellValue('O' . $count, $row['likes']);
$active_sheet->setCellValue('P' . $count, $row['dislikes']);


    $count = $count + 1;
  }
  $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, $_POST["file_type"]);

  $file_name = time() . '.' . strtolower($_POST["file_type"]);

  $writer->save($file_name);

  header('Content-Type: application/x-www-form-urlencoded');

  header('Content-Transfer-Encoding: Binary');

  header("Content-disposition: attachment; filename=\"".$file_name."\"");

  readfile($file_name);

  unlink($file_name);
  

  exit;


}
if(isset($_POST['delete'])){
  
$result = mysqli_query($con,"SELECT MAX(id) AS value_sum FROM posts"); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
$result = mysqli_query($con,"SELECT MIN(id) AS value_su FROM posts"); 
$row = mysqli_fetch_assoc($result); 
$su = $row['value_su'];

$query=mysqli_query($con,"DELETE from posts where id between $sum and $su");


}






?>

<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        



        <!-- App favicon -->

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App title -->

        <title>Prabhat | Data Management</title>



        <!--Morris Chart CSS -->

        <link rel="stylesheet" href="../plugins/morris/morris.css">



        <!-- jvectormap -->

        <link href="../plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />



        <!-- App css -->

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />

        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />

        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />

        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />

        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />

        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">



        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->

        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

        <!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

        <![endif]-->



        <script src="assets/js/modernizr.min.js"></script>



    </head>





    <body class="fixed-left">



        <!-- Begin page -->

        <div id="wrapper">



            <!-- Top Bar Start -->

           <?php include('includes/topheader.php');?>



            <!-- ========== Left Sidebar Start ========== -->

           <?php include('includes/leftsidebar.php');?>





            <!-- ============================================================== -->

            <!-- Start right Content here -->

            <!-- ============================================================== -->

            <div class="content-page">

                <!-- Start content -->

                <div class="content">

                    <div class="container">





                        <div class="row">

                            <div class="col-xs-12">

                                <div class="page-title-box">

                                    <h4 class="page-title">Data Management </h4>



                                    



                                    <ol class="breadcrumb p-0 m-0">

                                        

                                        



   

  

                                        <li>



                                            <a href="dashboard.php">Admin</a>

                                        </li>

                                        

                                        <li class="active">

                                            Data Management

                                        </li>

                                    </ol>

                                    <div class="clearfix"></div>

                                </div>

                            </div>

                        </div>

        <div class="panel panel-default">

          <div class="panel-heading">Import Data From Excel or CSV File  </div>

          <div class="panel-body">

          <div class="table-responsive">

           <span id="message"></span>

              <form method="post" id="import_excel_form" enctype="multipart/form-data">

                <table class="table">

                  <tr>

                    <td width="25%" align="right">Select Excel File</td>

                    <td width="50%"><input type="file" name="import_excel" /></td>

                    <td width="25%"><input type="submit" name="import" id="import" class="btn btn-primary" value="Import" /></td>
                    

                  </tr>


                </table>

              </form>

           <br />

           

              

          </div>

          </div>

        </div>

     </div>
     <div class="panel panel-default">

          <div class="panel-heading"> Export Data To Excel or CSV File</div>

          <div class="panel-body">

          <div class="table-responsive">

           <span id="message"></span>

              <form method="post" id="import_excel_form" enctype="multipart/form-data">

                <table class="table">

                  <tr>

                    <td class="col-md-4"><select name="file_type" class="form-control input-sm">
                    <option value="Xls">Xls</option>
                    <option value="Csv">Csv</option>
                  </select></td>

                  

                    <td width="25%"><input type="submit" name="export" id="import" class="btn btn-primary" value="Export" /></td>
                    <td width="25%"><input type="submit" name="delete" id="import" class="btn btn-primary" value="Delete" /></td>

                  </tr>


                </table>

              </form>

           <br />

           

              

          </div>

          </div>

        </div>
        





     </div>
   

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

  </body>

</html>

<script>

$(document).ready(function(){

  $('#import_excel_form').on('submit', function(event){

    event.preventDefault();

    $.ajax({

      url:"import.php",

      method:"POST",

      data:new FormData(this),

      contentType:false,

      cache:false,

      processData:false,

      beforeSend:function(){

        $('#import').attr('disabled', 'disabled');

        $('#import').val('Importing...');

      },

      success:function(data)

      {

        $('#message').html(data);

        $('#import_excel_form')[0].reset();

        $('#import').attr('disabled', false);

        $('#import').val('Import');

      }

    })

  });

});

</script>