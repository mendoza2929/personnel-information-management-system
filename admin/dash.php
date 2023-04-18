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
      <title>Dashboard - Personnel Training Information Managment System</title>
      <meta name="robots" content="noindex, nofollow">
      <meta content="" name="description">
      <meta content="" name="keywords">
     
      <?php 
      
        require('./includes/nav_link.php');
      
      ?>

   </head>
   <body>


   <?php 

   $current_user = mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(id) AS `count` FROM `personnel` WHERE `status` = 1"));

   // $training = mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(id) AS `count` FROM `personnel_details` WHERE course_id='35' AND training_status='1';"));

   // $training1 = mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(id) AS `count` FROM `personnel_details` WHERE course_id='36' AND training_status='1';"));
   
   ?>

   
   <?php 
      
      require('./includes/header.php');
         
      require('./includes/aside.php');
    
   ?>

      
   
  
   
     

     



      <main id="main" class="main">
         <div class="pagetitle mb-4">
            <h1>Dashboard</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
               </ol>

               <h1 class="fw-bold">Welcome to Personnel Training Information Management System</h1>
         </div>

         <section class="section dashboard">
            <div class="row">
               <div class="col-lg-8">
                  <div class="row">
                  <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card customers-card">
                           <!--<div class="filter">
                              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                 <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                 </li>
                                 <li><a class="dropdown-item" href="#">Today</a></li>
                                 <li><a class="dropdown-item" href="#">This Month</a></li>
                                 <li><a class="dropdown-item" href="#">This Year</a></li>
                              </ul>
                           </div>-->
                           <div class="card-body">
                              <h5 class="card-title">Personnel <span>| Record</span></h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-people"></i></div>
                                 <div class="ps-3">
                                    <h6 class="card-title"><?php echo $current_user['count']?> <span> Active</span> </h6>
                                    <span class="text-danger small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1 fw-bold">Personnel</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>


                     <!--<div class="col-xxl-4 col-xl-12">
                        <div class="card info-card customers-card">
                           <!--<div class="filter">
                              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                 <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                 </li>
                                 <li><a class="dropdown-item" href="#">Today</a></li>
                                 <li><a class="dropdown-item" href="#">This Month</a></li>
                                 <li><a class="dropdown-item" href="#">This Year</a></li>
                              </ul>
                           </div>
                           <div class="card-body">
                              <h5 class="card-title">CCIC <span>| Record</span></h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-clipboard-data"></i> </div>
                                 <div class="ps-3">
                                    <h6 class="card-title"><?php echo $training['count']?> <span> On Going</span></h6>
                                    <span class="text-danger small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1 fw-bold">Investigation  </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>


                     <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card customers-card">
                           <div class="filter">
                              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                 <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                 </li>
                                 <li><a class="dropdown-item" href="#">Today</a></li>
                                 <li><a class="dropdown-item" href="#">This Month</a></li>
                                 <li><a class="dropdown-item" href="#">This Year</a></li>
                              </ul>
                           </div>-->
                           <!--<div class="card-body">
                              <h5 class="card-title">PSOSEC <span>| Record</span></h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-clipboard-data"></i> </div>
                                 <div class="ps-3">
                                    <h6 class="card-title"><?php echo $training1['count']?> <span> On Going</span></h6>
                                    <span class="text-danger small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1 fw-bold">Officer Senior</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>-->
         </section>
  
      </main>


      <?php 
      
      require('./includes/footer.php');
    
    ?>
   
     
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


      
             
   </body>
</html>