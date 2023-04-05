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
      <title>Course - Personnel Training Information Managment System</title>
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
            <h1>Courses</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active">Course</li>
               </ol>
         </div>
    
         
                 <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0 fw-bold"><i class="bi bi-chat-square-heart"></i> Course</h5>
                            <button type="button" class="btn btn-success btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#course">
                            <i class="bi bi-file-plus"></i> Add
                            </button>
                        </div>


                           <div class="table-responsive-md" style="height:450px; overflow-y:scroll;">
                           <table class="table table-hover border">
                            <thead>
                                <tr class="text-white" style="background-color:#1d3557;">
                                <th scope="col">No.</th>
                                <th scope="col">Course</th>
                                <th scope="col">description</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="course_data">
                          
                             
                           
                            </tbody>
                            </table>
                            </div>

                        </div>
                    </div>



                    
        <div class="modal fade" id="course" data-bs-backdrop="static" data-bs-keyboard= "true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="course_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title"><i class="bi bi-clipboard-data"></i> Add Course</div>
                        </div>
                        <div class="modal-body"> 
                            <div class="mb-3">
                                <label class="form-label fw-bold">Course</label>
                                <input type="text" name="course_name" class="form-control shadow-none">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Description</label>
                                <input type="text" name="desc_name" class="form-control shadow-none">
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

<?php 




?>
        
              
    <div class="modal fade" id="add_personnel" data-bs-backdrop="static" data-bs-keyboard= "true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-book"></i> Course Training</h5>
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></button>
      </div>
      <div class="modal-body">
      <div id="image-alert">

</div>
            <div class="border-bottom border-3 pb-3 mb-3">
                <form id="add_personnel_course">
                <div class="row">
                <label class="form-label fw-bold">Add Course Training</label>

            
                                <label class="form-label fw-bold">Batch</label>
                                <select class='form-select shadow-none mb-2' aria-label='Default select example' name='batch' required>
                                <option disabled selected value="">Select a Batch</option> <!-- placeholder option -->
                                <?php
                                $res = selectAll('batch');
                                while($opt = mysqli_fetch_assoc($res)){
                                    echo "<option value='$opt[name]'>$opt[name]</option>";
                                }
                                ?>
                            </select>
                            
                
                <input type="text" class="form-control mb-2 shadow-none" list="personnel_list" name="personnel_name" placeholder="Type to search personnel ID">
                <datalist id="personnel_list" >
                <?php
                                $res = selectAll('personnel');
                                while($opt = mysqli_fetch_assoc($res)){
                                    echo "<option value='$opt[id], $opt[last] $opt[first] $opt[suffix]'></option>";
                                }
                         ?>
                </datalist>

                <input type="text" class="form-control mb-2 shadow-none" list="personnel_list_name" name="personnel_name_list" placeholder="Type to search personnel ID">
                <datalist id="personnel_list_name">
                <?php
                                $res = selectAll('personnel');
                                while($opt = mysqli_fetch_assoc($res)){
                                    echo "<option value='$opt[rank], $opt[last] $opt[first] $opt[suffix]'></option>";
                                }
                         ?>
                </datalist>

              

                    <input type="hidden" name="course_id">
                    </div>
                     <button type="submit" class="btn btn-success shadow-none">Submit</button>
                 </form>
            </div>
            <div class="table-responsive-lg" style="height:350px; overflow-y:scroll;">
                           <table class="table table-hover border text-center">
                            <thead>
                                <tr class="text-white sticky-top" style="background-color:#1d3557;">
                                <th scope="col">Class Batch</th>
                                <th scope="col">Personnel Name</th>
                                <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody id="course-personnel-data">
                            </tbody>
                            </table>
                            </div>
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
            let course_form = document.getElementById("course_form");


            course_form.addEventListener('submit', function(e){
               e.preventDefault();
               add_course();
            });

            function add_course(){
               let data = new FormData();
               data.append('course_name',course_form.elements['course_name'].value);
               data.append('desc_name',course_form.elements['desc_name'].value);
               data.append('add_course','');

               let xhr = new XMLHttpRequest();
               xhr.open("POST","./ajax/course.php",true);

               xhr.onload = function(){
               var myModalEl = document.getElementById('course')
               var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
              modal.hide();

            if(this.responseText==1){
               swal("Good job!", "You Successfully Create!", "success");

               course_form.elements['course_name'].values='';
                get_course();
            }else{
               swal("Error!", "Server Down!", "error");
            }

        }
        xhr.send(data);

            };


            function get_course(){
               let xhr = new XMLHttpRequest();
               xhr.open("POST","./ajax/course.php",true);
               xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

               xhr.onload = function (){
            document.getElementById('course_data').innerHTML = this.responseText;
          }

          xhr.send('get_course');

               
            }


            function rem_course(val){
               let xhr = new XMLHttpRequest();
               xhr.open("POST","./ajax/course.php",true);
               xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

             xhr.onload = function (){
            if(this.responseText==1){
               swal("Good job!", "Remove Course Successfully!", "success");
                get_course();
            }
            else{
               swal("Error!", "Server Down!", "success");
            }
        }

        xhr.send('rem_course='+val);
            }



            
    let add_personnel_course = document.getElementById('add_personnel_course');

    add_personnel_course.addEventListener('submit', function(e){
    e.preventDefault();
    add_course_personnel();
});


function add_course_personnel(){
    let data = new FormData();
    data.append('batch',add_personnel_course.elements['batch'].value);
    data.append('personnel_name',add_personnel_course.elements['personnel_name'].value);
    data.append('personnel_name_list',add_personnel_course.elements['personnel_name_list'].value);
    data.append('course_id',add_personnel_course.elements['course_id'].value);
    data.append('add_course_personnel','');

    let xhr  = new XMLHttpRequest();
    xhr.open("POST","./ajax/course.php",true);
    
    
    xhr.onload = function(){
        var myModalEl = document.getElementById('add_personnel')
        var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
        modal.hide();

        if(this.responseText==1){
         // alertCourse('success','New Image Added','image-alert');
            swal("Success!", "You Successfully Enter a course!", "success");
            // add_course_personnel(add_personnel_course.elements['personnel_id'].value,document.querySelectorAll("#add_personnel .modal-title").innerText);
            add_personnel_course.reset();
          
            // get_personnel_course();
            
        }else{
            swal("Error!", "Server Down!", "error");
        }

    }
    xhr.send(data);
}


function personnel_course(id){
   add_personnel_course.elements['course_id'].value = id;
   add_personnel_course.elements['batch'].value= '';
    add_personnel_course.elements['personnel_name_list'].value='';
   add_personnel_course.elements['personnel_name'].value='';

        
        let xhr = new XMLHttpRequest();
        xhr.open("POST","./ajax/course.php",true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

        xhr.onload = function(){
         //   document.querySelectorAll("#add_personnel .modal-title").innerHTML = id;
            document.getElementById('course-personnel-data').innerHTML = this.responseText;
        }

        xhr.send('get_personnel_course='+id);
    }











            window.onload = function(){
               get_course();
               // get_personnel_course();
            }

         

        </script>








             
   </body>
</html>