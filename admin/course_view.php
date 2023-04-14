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
            <?php 
            
            if(isset($_GET['id'])){
                

              $id = $_GET['id'];
              if(!empty($id)){
                $fetchdata = mysqli_query($con,"select * from course where id = $id");
                $result = mysqli_fetch_array($fetchdata);
              }
            }
            
            
            ?>
            <h1><?php echo $result['description']?> </h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active"><?php echo $result['name']?> </li>
               </ol>
         </div>
    
         
                 <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0 fw-bold"><i class="bi bi-chat-square-heart"></i> <?php echo $result['name']?></h5>
                            <button type="button" class="btn btn-success btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#course_<?php echo $result['id']; ?>">
                                <i class="bi bi-file-plus"></i> Add
                             </button>
                        </div>
                      

                           <div class="table-responsive-md" style="height:450px; overflow-y:scroll;">
                           <table class="table table-hover border">
                            <thead>
                                <tr class="text-white" style="background-color:#1d3557;">
                                <th scope="col">No.</th>
                                <th scope="col">Class Number</th>
                                <th scope="col">Proponent</th>
                                <th scope="col">Opening Class</th>
                                <th scope="col">Status</th>
                      
                                </tr>
                            </thead>
                            <tbody id="classnumber_data">
                          
                             
                           
                            </tbody>
                            </table>
                            </div>

                        </div>
                    </div>


  <div class="modal fade" id="course_<?php echo $result['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-course-id="<?php echo $result['id']; ?>">
  <div class="modal-dialog">
    <form id="course_form_<?php echo $result['id']; ?>">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="bi bi-clipboard-data"></i> <?php echo $result['name']; ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label fw-bold">Class Number</label>
            <input type="text" name="class_number_<?php echo $result['id']; ?>" class="form-control shadow-none">
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold">Proponent</label>
            <input type="text" name="proponent_<?php echo $result['id']; ?>" class="form-control shadow-none">
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold">Opening Class</label>
            <input type="date" name="open_<?php echo $result['id']; ?>" class="form-control shadow-none">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary shadow-none" data-bs-dismiss="modal">Close</button>
     
          <button type="submit" class="btn btn-success shadow-none" onclick="event.preventDefault(); add_class(<?php echo $result['id']; ?>);">Submit</button>
        </div>
        <input type="hidden" name="course_id_<?php echo $result['id']; ?>" value="<?php echo $result['id']; ?>">
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
 

 function add_class(course_id) {
  let course_form = document.getElementById("course_form_" + course_id);
  let data = new FormData(course_form);
  data.append('class_number', course_form.elements['class_number_' + course_id].value);
  data.append('proponent', course_form.elements['proponent_' + course_id].value);
  data.append('open', course_form.elements['open_' + course_id].value);
  data.append('class_id', course_id);
  data.append('course_id', course_form.elements['course_id_' + course_id].value);
  data.append('add_class', '');

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./ajax/course.php", true);

  xhr.onload = function() {
   var myModalEl = document.getElementById('course_<?php echo $result['id']; ?>')
            var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
            modal.hide();
    if (this.responseText == 1) {
      swal("success", "Create Class Number", "success");
      course_form.reset();
      get_class(<?php echo $result['id']; ?>);
    } else {
      swal("Error!", "Class Number Exist!", "error");
    }
  }

  xhr.send(data);
};


function edit_course(course_id){
  let edit_course = document.getElementById("edit_course");
  // let data = new FormData(edit_course);


  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./ajax/course.php", true);
  xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

  
  xhr.onload = function(){
            let data = JSON.parse(this.responseText);
            edit_course.elements['class_number'].value = data.classnumberdata.class_number;
           
            // edit_personnel.elements['course'].value = data.personneldata.course;
            // edit_personnel.elements['personnel_id'].value = data.personneldata.id;
       }

       xhr.send('edit_course='+course_id);

}






function get_class(course_id) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./ajax/course.php", true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onload = function() {
    document.getElementById('classnumber_data').innerHTML = this.responseText;
  }

  xhr.send('get_class=' + course_id);

 
}


        
function toggleStatus1(id,val){
        
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "./ajax/course.php", true);
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        
            xhr.onload = function(){
                if(this.responseText==1){
                    // alert('success','Status Active');
                    get_class(<?php echo $result['id']; ?>);
                }
                else{
                    alert('error','Status Not Active');
                }
            }
            xhr.send('toggleStatus1='+id+'&value='+val);
    
    }






window.onload = function(){
   get_class(<?php echo $result['id']; ?>);
    }
    
    



</script>



         

        








             
   </body>
</html>