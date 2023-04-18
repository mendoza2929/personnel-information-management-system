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
                  <li class="breadcrumb-item active">Personnel</li>
               </ol>

               <h1>Personnel Records</h1>
         </div>

                        <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">

                          
                    
                        <div class="text-end mb-4">
                        <button  class="btn btn-success btn-sm shadow-none mt-2 mb-2 text-start me-2" data-bs-toggle="modal" data-bs-target="#add-personnel">
                            <i class="bi bi-plus"></i> Add
                            </button>
                        </div>

                        <div class="d-flex align-items-center">
                        <form action="excel.php" method="post">
                        <button type="submit" name="export_excel" class="btn btn-success btn-sm shadow-none mt-2 mb-2 text-start me-2" data-bs-toggle="modal" data-bs-target="#add-room">
                            <i class="bi bi-file-earmark-spreadsheet"></i> Export to excel
                            </button>
                        </form>

                            <input type="text" oninput="search_personnel(this.value)" class="form-control shadow-none w-25 ms-auto mb-2" placeholder="Type to search..">
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
                                <th scope="col">Status</th> 
                                <th scope="col">Action</th> 
                                <th scope="col">View Course</th> 
                                </tr>
                            </thead>
                            <tbody id="personnel_data">
                          
                             
                           
                            </tbody>
                            </table>
                            </div>

                        </div>
                    </div>


                    
       <!--add personnel-->
                          
      <div class="modal fade" id="add-personnel" data-bs-backdrop="static" data-bs-keyboard= "true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form id="personnel_form" autocomplete="off">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title fw-bold"><i class="bi bi-plus-square"></i> Add Personnel</div>
                        </div>
                        <div class="modal-body"> 
                            <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Rank</label>
                                <select class='form-select shadow-none' aria-label='Default select example' name='rank' required>
                                <option disabled selected value="">Select a Rank...</option> <!-- placeholder option -->
                                <?php
                                $res = selectAll('rank');
                                while($opt = mysqli_fetch_assoc($res)){
                                    echo "<option value='$opt[name]'>$opt[name]</option>";
                                }
                                ?>
                            </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Unit</label>
                                <select class='form-select shadow-none' aria-label='Default select example' name='unit' required>
                                <option disabled selected value="">Select a Unit...</option> <!-- placeholder option -->
                                <?php
                                $res = selectAll('unit');
                                while($opt = mysqli_fetch_assoc($res)){
                                    echo "<option value='$opt[name]'>$opt[name] ($opt[description])</option>";
                                }
                                ?>
                            </select>
                            </div>
                            <div class="col-md-3  mb-3">
                                <label class="form-label fw-bold">Last Name</label>
                                <input type="text" min="1" name="last" class="form-control shadow-none">
                            </div>
                            <div class="col-md-3  mb-3">
                                <label class="form-label fw-bold">First Name</label>
                                <input type="text" min="1" name="first" class="form-control shadow-none">
                            </div>
                            <div class="col-md-3  mb-3">
                                <label class="form-label fw-bold">Middle Name</label>
                                <input type="text" name="middle" class="form-control shadow-none" placeholder="Optional ">
                            </div>
                            <div class="col-md-3  mb-3">
                                <label class="form-label fw-bold">Suffix</label>
                                <select class='form-select shadow-none' aria-label='Default select example' name='suffix' >
                                <option disabled selected value="">Select Suffix</option> <!-- placeholder option -->
                                <option value="jr">Jr.</option>
                                <option value="sr">Sr.</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Street</label>
                                <input type="text" name="street" class="form-control shadow-none">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Address</label>
                                <select class='form-select shadow-none' aria-label='Default select example' name='address' required>
                                <option disabled selected value="">Select a Barangay</option> <!-- placeholder option -->
                                <?php
                                $res = selectAll('address');
                                while($opt = mysqli_fetch_assoc($res)){
                                    echo "<option value='$opt[name]'>$opt[name]</option>";
                                }
                                ?>
                            </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">City</label>
                                <select class='form-select shadow-none' aria-label='Default select example' name='city' required>
                                <option disabled selected value="">Select a City</option> <!-- placeholder option -->
                                <?php
                                $res = selectAll('city');
                                while($opt = mysqli_fetch_assoc($res)){
                                    echo "<option value='$opt[city]'>$opt[city]</option>";
                                }
                                ?>
                            </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Province</label>
                                <select class='form-select shadow-none' aria-label='Default select example' name='province' required>
                                <option disabled selected value="">Select a Province</option> <!-- placeholder option -->
                                <?php
                                $res = selectAll('province');
                                while($opt = mysqli_fetch_assoc($res)){
                                    echo "<option value='$opt[name]'>$opt[name]</option>";
                                }
                                ?>
                            </select>
                            </div>
                        
                            <div class="col-md-3 mb-3">
                            <label class="form-label fw-bold">Gender</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="radio" name="gender" id="male" value="male">
                                <label class="form-check-label" for="female">
                                Male
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input  shadow-none" type="radio" name="gender" id="female" value="female">
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                        </div>

                            <div class="col-md-3 mb-3">
                            <label class="form-label fw-bold">Date of birth</label>
                            <input type="date"class="form-control shadow-none" name="birthday">
                            </div>

                            <div class="col-md-3  mb-3">
                                <label class="form-label fw-bold">Batch</label>
                                <select class='form-select shadow-none' aria-label='Default select example' name='batch' required>
                                <option disabled selected value="">Select a Batch</option> <!-- placeholder option -->
                                <?php
                                $res = selectAll('batch');
                                while($opt = mysqli_fetch_assoc($res)){
                                    echo "<option value='$opt[name]'>$opt[name]</option>";
                                }
                                ?>
                            </select>
                            </div>

        
                            
                            

                     
                          
                            
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary shadow-none" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success shadow-none">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

      
  
      </main>

      <div class="modal fade" id="edit_course" data-bs-backdrop="static" data-bs-keyboard= "true" tabindex="1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
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
                                <th scope="col">Course</th>
                                <th scope="col">Class Number</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Attachments</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="course-data">
                            </tbody>
                            </table>
                            
         </div>
     </div>
    </div>
</div>

    
       

              
      <div class="modal fade" id="edit-personnel" data-bs-backdrop="static" data-bs-keyboard= "true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form id="edit_personnel" autocomplete="off">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title fw-bold"><i class="bi bi-plus-square"></i> Edit Personnel</div>
                        </div>
                        <div class="modal-body"> 
                            <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Rank</label>
                                <select class='form-select shadow-none' aria-label='Default select example' name='rank' required>
                                <option disabled selected value="">Select a Rank...</option> <!-- placeholder option -->
                                <?php
                                $res = selectAll('rank');
                                while($opt = mysqli_fetch_assoc($res)){
                                    echo "<option value='$opt[name]'>$opt[name]</option>";
                                }
                                ?>
                            </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Unit</label>
                                <select class='form-select shadow-none' aria-label='Default select example' name='unit' required>
                                <option disabled selected value="">Select a Unit...</option> <!-- placeholder option -->
                                <?php
                                $res = selectAll('unit');
                                while($opt = mysqli_fetch_assoc($res)){
                                    echo "<option value='$opt[name]'>$opt[name] ($opt[description])</option>";
                                }
                                ?>
                            </select>
                            </div>
                            <div class="col-md-3  mb-3">
                                <label class="form-label fw-bold">Last Name</label>
                                <input type="text" min="1" name="last" class="form-control shadow-none">
                            </div>
                            <div class="col-md-3  mb-3">
                                <label class="form-label fw-bold">First Name</label>
                                <input type="text" min="1" name="first" class="form-control shadow-none">
                            </div>
                            <div class="col-md-3  mb-3">
                                <label class="form-label fw-bold">Middle Name</label>
                                <input type="text" name="middle" class="form-control shadow-none" placeholder="Optional ">
                            </div>
                            <div class="col-md-3  mb-3">
                                <label class="form-label fw-bold">Suffix</label>
                                <select class='form-select shadow-none' aria-label='Default select example' name='suffix' >
                                <option disabled selected value="">Select Suffix</option> <!-- placeholder option -->
                                <option value="jr">Jr.</option>
                                <option value="sr">Sr.</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Street</label>
                                <input type="text" name="street" class="form-control shadow-none">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Address</label>
                                <select class='form-select shadow-none' aria-label='Default select example' name='address' required>
                                <option disabled selected value="">Select a Barangay</option> <!-- placeholder option -->
                                <?php
                                $res = selectAll('address');
                                while($opt = mysqli_fetch_assoc($res)){
                                    echo "<option value='$opt[name]'>$opt[name]</option>";
                                }
                                ?>
                            </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">City</label>
                                <select class='form-select shadow-none' aria-label='Default select example' name='city' required>
                                <option disabled selected value="">Select a City</option> <!-- placeholder option -->
                                <?php
                                $res = selectAll('city');
                                while($opt = mysqli_fetch_assoc($res)){
                                    echo "<option value='$opt[city]'>$opt[city]</option>";
                                }
                                ?>
                            </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Province</label>
                                <select class='form-select shadow-none' aria-label='Default select example' name='province' required>
                                <option disabled selected value="">Select a Province</option> <!-- placeholder option -->
                                <?php
                                $res = selectAll('province');
                                while($opt = mysqli_fetch_assoc($res)){
                                    echo "<option value='$opt[name]'>$opt[name]</option>";
                                }
                                ?>
                            </select>
                            </div>
                        
                            <div class="col-md-3 mb-3">
                            <label class="form-label fw-bold">Gender</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="radio" name="gender" id="male" value="male">
                                <label class="form-check-label" for="female">
                                Male
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input  shadow-none" type="radio" name="gender" id="female" value="female">
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                        </div>

                            <div class="col-md-3 mb-3">
                            <label class="form-label fw-bold">Date of birth</label>
                            <input type="date"class="form-control shadow-none" name="birthday">
                            </div>

                            <div class="col-md-3  mb-3">
                                <label class="form-label fw-bold">Batch</label>
                                <select class='form-select shadow-none' aria-label='Default select example' name='batch' required>
                                <option disabled selected value="">Select a Batch</option> <!-- placeholder option -->
                                <?php
                                $res = selectAll('batch');
                                while($opt = mysqli_fetch_assoc($res)){
                                    echo "<option value='$opt[name]'>$opt[name]</option>";
                                }
                                ?>
                            </select>
                            </div>
     
                            <input type="hidden" name="personnel_id">
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary shadow-none" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success shadow-none">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
       
   



    


      
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

