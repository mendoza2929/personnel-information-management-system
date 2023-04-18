<?php 
require("alert.php");
require("db_config.php");
adminLogin();

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Personnel - Personnel Training Information Managment System</title>
      <meta name="robots" content="noindex, nofollow">
      <meta content="" name="description">
      <meta content="" name="keywords">
      <?php 
      
        require('./includes/nav_link.php');
      
      ?>
      
   </head>
   <body onload="print()">
   
          
   <?php 
      
      require('./includes/header.php');
         
      require('./includes/aside.php');
    
   ?>

      <main id="main" class="main">
         <div class="pagetitle">
            <h1>Certificates</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active">Certificates</li>
               </ol>

               <h1>Printing Certificates</h1>
         </div>

         <div class="container">
            <center>
                <h3>Personnel Certificates</h3>
                <h1></h1>
            </center>
            <?php 


                $get_certificate = mysqli_query($con,"SELECT * FROM certificates");

                while($row = mysqli_fetch_array($get_certificate)){
                  
          
            ?>

                    <h1><?php echo $row['cert_image']?></h1>

            <?php } ?>
         </div>

         <div class="container">
            <button type="" class="btn btn-info noprint" style="width: 100%" onclick="window.location.replace(personnel.php);">Cancel Printing</button>
         </div>

                        
       

    


    
    
  
      </main>


    


      
      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>  

        <script src="assets/js/apexcharts.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/chart.min.js"></script>
        <script src="assets/js/echarts.min.js"></script>
        <script src="assets/js/quill.min.js"></script>
        <script src="assets/js/simple-datatables.js"></script>
        <script src="assets/js/tinymce.min.js"></script>
        <script src="assets/js/validate.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


      


   
   

        
   <script>

    


        <?php 
           require('./scripts/personnel.js');
        ?>

    </script>

    
    
             

   </body>
</html>