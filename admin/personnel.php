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
         <div class="d-flex align-items-center justify-content-between"> <a href="dash.php" class="logo d-flex align-items-center"> <span class="d-none d-lg-block">R8 PIMS</span> </a> <i class="bi bi-list toggle-sidebar-btn"></i></div>
         
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
                  <li> <a href="course.php"> <i class="bi bi-circle"></i><span>Courses</span> </a></li>
                  <li> <a href="batch.php"> <i class="bi bi-circle"></i><span>Batch</span> </a></li>
                  <li> <a href="address.php"> <i class="bi bi-circle"></i><span>Address</span> </a></li>
                  <li> <a href="personnel.php"> <i class="bi bi-circle"></i><span>Add Personnel</span> </a></li>
               </ul>
         </li>
         <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#personnel-nav" data-bs-toggle="collapse" href="#"> <i class="bi bi-menu-button-wide"></i><span>Personnel Record</span><i class="bi bi-chevron-down ms-auto"></i> </a>
            <ul id="personnel-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li> <a href="new_personnel.php"> <i class="bi bi-circle"></i><span> Active Personnel</span> </a></li>
            <li> <a href="retired_personnel.php"> <i class="bi bi-circle"></i><span>Retired Personnel</span> </a></li>
            <li> <a href="suspended_personnel.php"> <i class="bi bi-circle"></i><span>Suspended Personnel</span> </a></li>
            <li> <a href="dismissed_personnel.php"> <i class="bi bi-circle"></i><span>Dismissed Personnel</span> </a></li>
            </ul>
         </li>
             
         <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#training-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Training</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="training-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <?php
        $res = selectAll('course');
        while($opt = mysqli_fetch_assoc($res)){
            // Get the id value of the current course
            $id = $opt['id'];
            
            // Check if the id value is set in the query parameter
            $active = '';
            if(isset($_GET['id']) && $_GET['id'] == $id){
                // Add the 'active' class to highlight the current course
                $active = 'active';
            }
            
            // Display the course in the navigation menu
            echo "<li><a class='$active' href='course.php?id=$id'><i class='bi bi-circle'></i><span>$opt[name]</span></a></li>";
        }
        ?>
    </ul>
</li>
      
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
                            <div class="col-md-5 mb-3">
                                <label class="form-label fw-bold">Street</label>
                                <input type="text" name="street" class="form-control shadow-none">
                            </div>
                            <div class="col-md-4 mb-3">
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

                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Course</label>
                                <select class='form-select shadow-none' aria-label='Default select example' name='course' required>
                                <option disabled selected value="">Select a Course</option> <!-- placeholder option -->
                                <?php
                                $res = selectAll('course');
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

         <!---edit personnel-->


             
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
                            <div class="col-md-5 mb-3">
                                <label class="form-label fw-bold">Street</label>
                                <input type="text" name="street" class="form-control shadow-none">
                            </div>
                            <div class="col-md-4 mb-3">
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

                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Course</label>
                                <select class='form-select shadow-none' aria-label='Default select example' name='course' required>
                                <option disabled selected value="">Select a Course</option> <!-- placeholder option -->
                                <?php
                                $res = selectAll('course');
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



       
    
        
       

   
        



   
        
   <script>





    let personnel_form = document.getElementById('personnel_form')

    personnel_form.addEventListener('submit', function(e){
        e.preventDefault();
        add_personnel();
    });

    
    function add_personnel(){
        let data = new FormData();
        data.append('add_personnel','');
        data.append('rank',personnel_form.elements['rank'].value);
        data.append('unit',personnel_form.elements['unit'].value);
        data.append('last',personnel_form.elements['last'].value);
        data.append('first',personnel_form.elements['first'].value);
        data.append('middle',personnel_form.elements['middle'].value);
        data.append('suffix',personnel_form.elements['suffix'].value);
        data.append('street',personnel_form.elements['street'].value);
        data.append('address',personnel_form.elements['address'].value);
        data.append('province',personnel_form.elements['province'].value);
        data.append('gender',personnel_form.elements['gender'].value);
        data.append('birthday',personnel_form.elements['birthday'].value);
        data.append('batch',personnel_form.elements['batch'].value);
        data.append('course',personnel_form.elements['course'].value);


        let xhr  = new XMLHttpRequest();
        xhr.open("POST","./ajax/personnel.php",true);
        
        
        xhr.onload = function(){
            var myModalEl = document.getElementById('add-personnel')
            var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
            modal.hide();

            if(this.responseText==1){
                swal("Good job!", "You Successfully Create Personnel!", "success");
                personnel_form.reset();
                get_personnel();
                
            }else{
                swal("Error!", "Server Down!", "error");
            }

        }
        xhr.send(data);
    }

    function get_personnel(){
        let xhr = new XMLHttpRequest();
        xhr.open("POST","./ajax/personnel.php",true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

        xhr.onload = function(){
         document.getElementById('personnel_data').innerHTML = this.responseText;
        }
        xhr.send('get_personnel');
    }




    
function toggleStatus(id,val){
        
        let xhr = new XMLHttpRequest();
            xhr.open("POST","./ajax/personnel.php",true);
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        
            xhr.onload = function(){
                if(this.responseText==1){
                    // alert('success','Status Active');
                    get_personnel();
                }
                else{
                    alert('error','Status Not Active');
                }
            }
            xhr.send('toggleStatus='+id+'&value='+val);
    
    }




    let edit_personnel = document.getElementById('edit_personnel');

    function personnel_details(id){

        let xhr = new XMLHttpRequest();
        xhr.open("POST","./ajax/personnel.php",true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');


        xhr.onload = function(){
            let data = JSON.parse(this.responseText);
            edit_personnel.elements['rank'].value = data.personneldata.rank;
            edit_personnel.elements['unit'].value = data.personneldata.unit;
            edit_personnel.elements['last'].value = data.personneldata.last;
            edit_personnel.elements['first'].value = data.personneldata.first;
            edit_personnel.elements['middle'].value = data.personneldata.middle;
            edit_personnel.elements['suffix'].value = data.personneldata.suffix;
            edit_personnel.elements['street'].value = data.personneldata.street;
            edit_personnel.elements['address'].value = data.personneldata.address;
            edit_personnel.elements['province'].value = data.personneldata.province;
            edit_personnel.elements['gender'].value = data.personneldata.gender;
            edit_personnel.elements['birthday'].value = data.personneldata.birthday;
            edit_personnel.elements['batch'].value = data.personneldata.batch;
            edit_personnel.elements['course'].value = data.personneldata.course;
            edit_personnel.elements['personnel_id'].value = data.personneldata.id;
       }

       xhr.send('edit_personnel='+id);
    }

    
    edit_personnel.addEventListener('submit',function(e){
        e.preventDefault();
        submit_edit_personnel();
    });


    function submit_edit_personnel(){
        let data = new FormData();
        data.append('submit_edit_personnel','');
        data.append('personnel_id',edit_personnel.elements['personnel_id'].value);
        data.append('rank',edit_personnel.elements['rank'].value);
        data.append('unit',edit_personnel.elements['unit'].value);
        data.append('last',edit_personnel.elements['last'].value);
        data.append('first',edit_personnel.elements['first'].value);
        data.append('middle',edit_personnel.elements['middle'].value);
        data.append('suffix',edit_personnel.elements['suffix'].value);
        data.append('street',edit_personnel.elements['street'].value);
        data.append('address',edit_personnel.elements['address'].value);
        data.append('province',edit_personnel.elements['province'].value);
        data.append('gender',edit_personnel.elements['gender'].value);
        data.append('birthday',edit_personnel.elements['birthday'].value);
        data.append('batch',edit_personnel.elements['batch'].value);
        data.append('course',edit_personnel.elements['course'].value);

        let xhr = new XMLHttpRequest();
        xhr.open("POST","./ajax/personnel.php",true);

        xhr.onload = function(){
            var myModalEl = document.getElementById('edit-personnel')
            var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
            modal.hide();

            if(this.responseText==1){
                swal("Good job!", "You Successfully Edit Personnel!", "success");
                edit_personnel.reset();
                get_personnel();
                
            }else{
                swal("Error!", "Server Down!", "success");
            }

        }
        xhr.send(data);


    }


    function search_personnel(personnelname){
        let xhr = new XMLHttpRequest();
        xhr.open("POST","./ajax/personnel.php",true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

        xhr.onload = function(){
            document.getElementById('personnel_data').innerHTML = this.responseText;
        }
        xhr.send('search_personnel&name='+personnelname);
    }




    // let add_form_course = document.getElementById('add_form_course');

    // add_form_course.addEventListener('submit', function(e){
    //     e.preventDefault();
    //     add_course();
    // });


    // function add_course(){
    //     let data = new FormData();
    //     data.append('batch',add_form_course.elements['batch'].value);
    //     data.append('course',add_form_course.elements['course'].value);
    //     data.append('start',add_form_course.elements['start'].value);
    //     data.append('end',add_form_course.elements['end'].value);
    //     data.append('personnel_id',add_form_course.elements['personnel_id'].value);
    //     data.append('add_course','');

    //     let xhr  = new XMLHttpRequest();
    //     xhr.open("POST","./ajax/personnel.php",true);
        
        
    //     xhr.onload = function(){
    //         var myModalEl = document.getElementById('edit_course')
    //         var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
    //         modal.hide();

    //         if(this.responseText==1){
    //             swal("Success!", "You Successfully Enter a course!", "success");
    //             // personnel_course(add_form_course.elements['personnel_id'].value);
    //             add_form_course.reset();
    //             // get_course();
                
    //         }else{
    //             swal("Error!", "Server Down!", "error");
    //         }

    //     }
    //     xhr.send(data);
    // }


    // function personnel_course(id){
    //         // add_form_course.elements['personnel_id'].value = id;
    //         // add_form_course.elements['batch'].value= '';
    //         // add_form_course.elements['course'].value= '';
    //     // add_form_course.elements['start'].value= '';
    //     // add_form_course.elements['end'].value= '';

        
    //     let xhr = new XMLHttpRequest();
    //     xhr.open("POST","./ajax/personnel.php",true);
    //     xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    //     xhr.onload = function(){
    //         document.getElementById('course-data').innerHTML = this.responseText;
    //     }

    //     xhr.send('get_course='+id);
    // }



    

    window.onload = function(){
        get_personnel();
        // get_course();
    }
    


    </script>
             

   </body>
</html>