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
      <title>Rank - Personnel Training Information Managment System</title>
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
         <div class="d-flex align-items-center justify-content-between"> <a href="dash.php" class="logo d-flex align-items-center"> <span class="d-none d-lg-block"> <img src="../img//PNP_PRO_9_logo.webp"> R8 PTIMS</span> </a> <i class="bi bi-list toggle-sidebar-btn"></i></div>
         
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
           
            <li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-menu-button-wide"></i>
    <span>Personnel Records</span>
    <i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#newrecords-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i>
        <span class="text-black">New Records</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="newrecords-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                  <li> <a href="rank.php"> <i class="bi bi-circle"></i><span>Rank</span> </a></li>
                  <li> <a href="unit.php"> <i class="bi bi-circle"></i><span>Unit</span> </a></li>
                  <!--<li> <a href="class.php"> <i class="bi bi-circle"></i><span>Class Number</span> </a></li>
                  <li> <a href="course.php"> <i class="bi bi-circle"></i><span>Courses</span> </a></li>-->
                  <li> <a href="batch.php"> <i class="bi bi-circle"></i><span>Batch</span> </a></li>
                  <li> <a href="address.php"> <i class="bi bi-circle"></i><span>Address</span> </a></li>
      </ul>
    </li>
    
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#other-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i>
        <span class="text-black">List of Personnel</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="other-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <!--<li> <a href="new_personnel.php"> <i class="bi bi-circle"></i><span> Active Personnel</span> </a></li>-->
            <li> <a href="personnel.php"> <i class="bi bi-circle"></i><span>Active Personnel</span> </a></li>
            <li> <a href="retired_personnel.php"> <i class="bi bi-circle"></i><span>Retired Personnel</span> </a></li>
            <li> <a href="suspended_personnel.php"> <i class="bi bi-circle"></i><span>Suspended Personnel</span> </a></li>
            <li> <a href="dismissed_personnel.php"> <i class="bi bi-circle"></i><span>Dismissed Personnel</span> </a></li>
      </ul>
    </li>
  </ul>
</li>

            
            <!--<ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li> <a href="rank.php"> <i class="bi bi-circle"></i><span>Rank</span> </a></li>
                  <li> <a href="unit.php"> <i class="bi bi-circle"></i><span>Unit</span> </a></li>
                  <li> <a href="class.php"> <i class="bi bi-circle"></i><span>Class Number</span> </a></li>
                  <li> <a href="course.php"> <i class="bi bi-circle"></i><span>Courses</span> </a></li>
                  <li> <a href="batch.php"> <i class="bi bi-circle"></i><span>Batch</span> </a></li>
                  <li> <a href="address.php"> <i class="bi bi-circle"></i><span>Address</span> </a></li>
                  <<li> <a href="personnel.php"> <i class="bi bi-circle"></i><span>All Record Personnel</span> </a></li>
               </ul>
         </li>
         <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#personnel-nav" data-bs-toggle="collapse" href="#"> <i class="bi bi-menu-button-wide"></i><span>Personnel Records</span><i class="bi bi-chevron-down ms-auto"></i> </a>
            <ul id="personnel-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li> <a href="new_personnel.php"> <i class="bi bi-circle"></i><span> Active Personnel</span> </a></li>
            <li> <a href="retired_personnel.php"> <i class="bi bi-circle"></i><span>Retired Personnel</span> </a></li>
            <li> <a href="suspended_personnel.php"> <i class="bi bi-circle"></i><span>Suspended Personnel</span> </a></li>
            <li> <a href="dismissed_personnel.php"> <i class="bi bi-circle"></i><span>Dismissed Personnel</span> </a></li>
            </ul>
         </li>-->
        
       
         <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#training-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Training Records</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="training-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
    <li> <a href="course.php"> <i class="bi bi-circle"></i><span>New Course</span> </a></li>
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
            echo "<li><a class='$active' href='course_view.php?id=$id'><i class='bi bi-circle'></i><span>$opt[name]</span></a></li>";
        }
        ?>
    </ul>
</li>
      
      
      
         </ul>
      </aside>
      <main id="main" class="main">
         <div class="pagetitle">
            <h1>Rank</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active">Rank</li>
               </ol>
         </div>
    
         
                 <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0 fw-bold"><i class="bi bi-chat-square-heart"></i> Rank</h5>
                            <button type="button" class="btn btn-success btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#rank">
                            <i class="bi bi-file-plus"></i> Add
                            </button>
                        </div>


                           <div class="table-responsive-md" style="height:450px; overflow-y:scroll;">
                           <table class="table table-hover border">
                            <thead>
                                <tr class="text-white" style="background-color:#1d3557;">
                                <th scope="col">No.</th>
                                <th scope="col">Rank</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="rank_data">
                          
                             
                           
                            </tbody>
                            </table>
                            </div>

                        </div>
                    </div>



                    
        <div class="modal fade" id="rank" data-bs-backdrop="static" data-bs-keyboard= "true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="rank_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title"><i class="bi bi-clipboard-data"></i> Add Rank</div>
                        </div>
                        <div class="modal-body"> 
                            <div class="mb-3">
                                <label class="form-label fw-bold">Rank</label>
                                <input type="text" name="rank_name" class="form-control shadow-none">
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

        
                    
        <div class="modal fade" id="edit_rank" data-bs-backdrop="static" data-bs-keyboard= "true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="edt_rank_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title"><i class="bi bi-clipboard-data"></i> Add Rank</div>
                        </div>
                        <div class="modal-body"> 
                            <div class="mb-3">
                                <label class="form-label fw-bold">Rank</label>
                                <input type="text" name="rank_name" class="form-control shadow-none">
                            </div>
                            <input type="hidden" name="rank_id">
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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>




        <script>
            let rank_form = document.getElementById("rank_form");


            rank_form.addEventListener('submit', function(e){
               e.preventDefault();
               add_rank();
            });

            function add_rank(){
               let data = new FormData();
               data.append('rank',rank_form.elements['rank_name'].value);
               data.append('add_rank','');

               let xhr = new XMLHttpRequest();
               xhr.open("POST","./ajax/rank.php",true);

               xhr.onload = function(){
               var myModalEl = document.getElementById('rank')
               var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
              modal.hide();

            if(this.responseText==1){
               swal("Success", "", "success");

                rank_form.elements['rank_name'].values='';
                get_rank();
            }else{
               swal("Error!", "Server Down!", "error");
            }

        }
        xhr.send(data);

            };


            function get_rank(){
               let xhr = new XMLHttpRequest();
               xhr.open("POST","./ajax/rank.php",true);
               xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

               xhr.onload = function (){
            document.getElementById('rank_data').innerHTML = this.responseText;
          }

          xhr.send('get_rank');

               
            }


            function rem_rank(val){
               let xhr = new XMLHttpRequest();
               xhr.open("POST","./ajax/rank.php",true);
               xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

             xhr.onload = function (){
            if(this.responseText==1){
               swal("Good job!", "Remove Rank Successfully!", "success");
                get_rank();
            }
            else{
               swal("Error!", "Server Down!", "success");
            }
        }

        xhr.send('rem_rank='+val);
            }




let edt_rank_form = document.getElementById('edt_rank_form');

function rank_details(id){

    let xhr = new XMLHttpRequest();
    xhr.open("POST","./ajax/rank.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');


    xhr.onload = function(){
        let data = JSON.parse(this.responseText);
        edt_rank_form.elements['rank_name'].value = data.rankdata.name;
        edt_rank_form.elements['rank_id'].value = data.rankdata.id;
   }

   xhr.send('edit_rank='+id);
}


    
edt_rank_form.addEventListener('submit',function(e){
        e.preventDefault();
        submit_edit_rank();
    });




function submit_edit_rank(){
        let data = new FormData();
        data.append('submit_edit_rank','');
        data.append('rank_id',edt_rank_form.elements['rank_id'].value);
        data.append('rank',edt_rank_form.elements['rank_name'].value);
    


        
        let xhr = new XMLHttpRequest();
        xhr.open("POST","./ajax/rank.php",true);

        xhr.onload = function(){
            var myModalEl = document.getElementById('edit_rank')
            var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
            modal.hide();

            if(this.responseText==1){
                swal("Good job!", "You Successfully Edit Rank!", "success");
                edt_rank_form.reset();
                get_rank();
                
            }else{
                swal("Error!", "Server Down!", "error");
            }

        }
        xhr.send(data);
       
    }




function rank_record(id){
    let xhr = new XMLHttpRequest();
    xhr.open("POST","./ajax/rank.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('rank-data').innerHTML = this.responseText;
    }

    xhr.send('get_rank_personnel='+id);
}






            window.onload = function(){
               get_rank();
            }

         

        </script>








             
   </body>
</html>