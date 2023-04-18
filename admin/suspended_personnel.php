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
      <title>Suspended Personnel - Personnel Training Information Managment System</title>
      <meta name="robots" content="noindex, nofollow">
      <meta content="" name="description">
      <meta content="" name="keywords">
     
      <?php 
      
        require('./includes/nav_link.php');
      
      ?>
     
   </head>
   <body>

     
   <?php 
      
      require('./includes/header.php');
         
      require('./includes/aside.php');
    
   ?>

      <main id="main" class="main">
         <div class="pagetitle">
            <h1>Personnel</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active">Suspended Personnel</li>
               </ol>

               <h1>Suspended Personnel Records</h1>
         </div>

                        <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">

                          
                    
                        <div class="text-end mb-4">
                         
                        </div>

                        <div class="d-flex align-items-center">
                   
                            <input type="text" oninput="search_suspended_personnel(this.value)" class="form-control shadow-none w-25 ms-auto mb-2" placeholder="Type to search..">
                        </div>


                     



                           <div class="table-responsive-lg" style="height:450px; overflow-y:scroll;">
                           <table class="table table-hover border text-center">
                            <thead>
                                <tr class="text-white" style="background-color:#1d3557;">
                                <th scope="col">No.</th>
                                <th scope="col">Rank</th> 
                                <th scope="col">Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Address</th>
                                <th scope="col">Unit</th> 
                                <th scope="col">Batch</th> 
                                <th scope="col">Training Course</th> 
                                </tr>
                            </thead>
                            <tbody id="suspended_personnel_data">
                          
                             
                           
                            </tbody>
                            </table>
                            </div>

                        </div>
                    </div>

    
                    <div class="modal fade" id="edit_course" data-bs-backdrop="static" data-bs-keyboard= "true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-book"></i> Course Training</h5>
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></button>
      </div>
      <div class="modal-body">
            <div class="border-bottom border-3 pb-3 mb-3">
                <form id="add_form_course">
                <div class="row">
              
                    <h4 class="text-center fw-bold">All Training Course Records</h4>
                
                 </form>
            </div>
            
                           <table class="table table-hover border text-center">
                            <thead>
                                <tr class="text-white sticky-top" style="background-color:#1d3557;">
                                <th scope="col">Batch</th>
                                <th scope="col">Course</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody id="course-data">
                            </tbody>
                            </table>
                            
         </div>
     </div>
    </div>
</div>


                 
    
    
 
  
      </main>



      <footer id="footer" class="footer">
         <div class="copyright"> &copy; Copyright <strong><span>reuel mendoza dev</span></strong>. All Rights Reserved</div>
       
      </footer>
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
           require('./scripts/p_suspended.js');
          ?>


    </script>
             

   </body>
</html>