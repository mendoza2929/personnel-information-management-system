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
      <title>Personnel - Personnel Information Managment System</title>
      <meta name="robots" content="noindex, nofollow">
      <meta content="" name="description">
      <meta content="" name="keywords">
      <link href="../img/PNP_PRO_9_logo.webp" rel="icon">
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <link href="assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/css/bootstrap-icons.css" rel="stylesheet">
      <link href="assets/css/boxicons.min.css" rel="stylesheet">
      <link href="assets/css/quill.snow.css" rel="stylesheet">
      <link href="assets/css/quill.bubble.css" rel="stylesheet">
      <link href="assets/css/remixicon.css" rel="stylesheet">
      <link href="assets/css/simple-datatables.css" rel="stylesheet">
      <link href="assets/css/styles.css" rel="stylesheet">
      
   </head>
   <body>
   
      <header id="header" class="header fixed-top d-flex align-items-center">
         <div class="d-flex align-items-center justify-content-between"> <a href="dash.php" class="logo d-flex align-items-center"> <span class="d-none d-lg-block">R8 Management System</span> </a> <i class="bi bi-list toggle-sidebar-btn"></i></div>
         
         <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
               <li class="nav-item d-block d-lg-none"> <a class="nav-link nav-icon search-bar-toggle " href="#"> <i class="bi bi-search"></i> </a></li>
               <li class="nav-item dropdown pe-3">
                  <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown"> <span class="d-none d-md-block dropdown-toggle ps-2"> Admin</span> </a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                  
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li> <a class="dropdown-item d-flex align-items-center" href="logout.php"> <i class="bi bi-box-arrow-right"></i> <span>Sign Out</span> </a></li>
                  </ul>
               </li>
            </ul>
         </nav>
      </header>
      <aside id="sidebar" class="sidebar">
         <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item"> <a class="nav-link " href="dash.php"> <i class="bi bi-grid"></i> <span>Dashboard</span> </a></li>
            <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#"> <i class="bi bi-menu-button-wide"></i><span>Master List</span><i class="bi bi-chevron-down ms-auto"></i> </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li> <a href="rank.php"> <i class="bi bi-circle"></i><span>Rank</span> </a></li>
                  <li> <a href="unit.php"> <i class="bi bi-circle"></i><span>Unit</span> </a></li>
                  <li> <a href=""> <i class="bi bi-circle"></i><span>Courses</span> </a></li>
                  <li> <a href="address.php"> <i class="bi bi-circle"></i><span>Address</span> </a></li>
               </ul>
         </li>
         <li class="nav-item"> <a class="nav-link " href="personnel.php"> <i class="bi bi-person"></i> <span>Personnel</span> </a></li>
         </ul>
      </aside>
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
                            <button type="button" class="btn btn-success btn-sm shadow-none mt-2 mb-2 text-start me-2" data-bs-toggle="modal" data-bs-target="#add-personnel">
                                <i class="bi bi-file-plus"></i> Add
                            </button>
                        </div>

                        <div class="d-flex align-items-center">
                            <button type="button" class="btn btn-success btn-sm shadow-none mt-2 mb-2 text-start me-2" data-bs-toggle="modal" data-bs-target="#add-room">
                            <i class="bi bi-file-earmark-spreadsheet"></i> Export to excel
                            </button>
                            <input type="text" oninput="search_apparatus(this.value)" class="form-control shadow-none w-25 ms-auto mb-2" placeholder="Type to search..">
                        </div>


                     



                           <div class="table-responsive-lg" style="height:450px; overflow-y:scroll;">
                           <table class="table table-hover border text-center">
                            <thead>
                                <tr class="text-white" style="background-color:#1d3557;">
                                <th scope="col">No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Rank</th> 
                                <th scope="col">Course</th>
                                <th scope="col">Unit</th> 
                                <th scope="col">Batch</th> 
                                <th scope="col">Action</th> 
                                </tr>
                            </thead>
                            <tbody id="room_data">
                          
                             
                           
                            </tbody>
                            </table>
                            </div>

                        </div>
                    </div>


                          
      <div class="modal fade" id="add-personnel" data-bs-backdrop="static" data-bs-keyboard= "true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form id="room_form" autocomplete="off">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title fw-bold"><i class="bi bi-plus-square"></i> Add Personnel</div>
                        </div>
                        <div class="modal-body"> 
                            <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Rank</label>
                                <select class='form-select shadow-none' aria-label='Default select example' name='teacher' required>
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
                                <select class='form-select shadow-none' aria-label='Default select example' name='teacher' required>
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
                                <input type="text" min="1" name="area" class="form-control shadow-none">
                            </div>
                            <div class="col-md-3  mb-3">
                                <label class="form-label fw-bold">First Name</label>
                                <input type="text" min="1" name="area" class="form-control shadow-none">
                            </div>
                            <div class="col-md-3  mb-3">
                                <label class="form-label fw-bold">Middle Name</label>
                                <input type="text" name="area" class="form-control shadow-none" placeholder="Optional ">
                            </div>
                            <div class="col-md-3  mb-3">
                                <label class="form-label fw-bold">Suffix</label>
                                <select class='form-select shadow-none' aria-label='Default select example' name='year' required>
                                <option disabled selected value="">Select Suffix</option> <!-- placeholder option -->
                                <option value="jr">Jr.</option>
                                <option value="2nd">Sr.</option>
                                </select>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label class="form-label fw-bold">Street</label>
                                <input type="text" name="street" class="form-control shadow-none">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Address</label>
                                <select class='form-select shadow-none' aria-label='Default select example' name='teacher' required>
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
                                <label class="form-label fw-bold">Province</label>
                                <select class='form-select shadow-none' aria-label='Default select example' name='teacher' required>
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
                                <option disabled selected value="">Select Batch</option> <!-- placeholder option -->
                                <option value="jr">1999</option>
                                <option value="2nd">2000</option>
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
        
             
   </body>
</html>