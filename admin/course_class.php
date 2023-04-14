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
                $fetchdata = mysqli_query($con,"select * from course_class where id = $id");
                $result = mysqli_fetch_array($fetchdata);
              }
            }
            
            
            ?>
            <h1><?php echo $result['class_number']?> </h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active"><?php echo $result['class_number']?> </li>
               </ol>
         </div>
    
         
                 <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0 fw-bold"><i class="bi bi-chat-square-heart"></i> <?php echo $result['class_number']?></h5>
                            <button type="button" class="btn btn-success btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#class_<?php echo $result['id']; ?>">
                                <i class="bi bi-file-plus"></i> Add
                             </button>
                        </div>
                      

                           <div class="table-responsive-md" style="height:450px; overflow-y:scroll;">
                           <table class="table table-hover border">
                            <thead>
                                <tr class="text-white" style="background-color:#1d3557;">
                                <th scope="col">No.</th>
                                <th scope="col">Personnel</th>
                                <th scope="col">Status</th>
                             
                                </tr>
                            </thead>
                            <tbody id="classpersonnel_data">
                          
                             
                           
                            </tbody>
                            </table>
                            </div>

                        </div>
                    </div>


<div class="modal fade" id="class_<?php echo $result['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-course-id="<?php echo $result['id']; ?>">
  <div class="modal-dialog">
    <form id="class_form_<?php echo $result['id']; ?>">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="bi bi-clipboard-data"></i> <?php echo $result['class_number']; ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
        
            <label class="form-label fw-bold">Add Personnel </label>
            <input type="text" class="form-control mb-2 shadow-none" list="personnel_list_name" name="class_personnel_<?php echo $result['id']; ?>" placeholder="Type to search Personnel Name" required>
            <datalist id="personnel_list_name">
            <?php
                            $res = selectAll('personnel');
                            while($opt = mysqli_fetch_assoc($res)){
                                echo "<option value='$opt[id], $opt[last] $opt[first] $opt[middle] $opt[suffix]'></option>";
                            }
                    ?>
            </datalist>
          </div>


        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-secondary shadow-none" data-bs-dismiss="modal">Close</button>
     
          <button type="submit" class="btn btn-success shadow-none" onclick="event.preventDefault(); add_personnel(<?php echo $result['id']; ?>);">Submit</button>
        </div>
        <input type="hidden" name="class_number_id_<?php echo $result['id']; ?>" value="<?php echo $result['id']; ?>">
      </div>
    </form>
  </div>
</div>



<div class="modal fade" id="add_certificates" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-course-id="<?php echo $result['id']; ?>">
  <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="bi bi-image"></i> Certificate </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
        <div class="border-bottom border-3 pb-3">
            <form action="" id="add_certificates_form">
                <label for="" class="form-label fw-bold">Add Certificates</label>
                <input type="file" name="image" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none mb-3">
               
                <div class="mb-3">
                  <label class="form-label fw-bold">End Class</label>
                  <input type="date" name="end" class="form-control shadow-none">
                </div>

                <button type="submit" class="btn btn-success text-white shadow-none text-end">ADD</button>
                <input type="hidden" name="personnel_id">
            </form>
        </div>

        <div class="table-responsive-md" style="height:450px;">
                           <table class="table table-hover border">
                           <thead>
                                <tr class="text-white" style="background-color:#1d3557;">
                                <th scope="col" width="60%">Certificate</th>
                                <th scope="col">End of Class</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="class_certificate_data">
                          
                             
                           
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
 

 function add_personnel(personnel_id) {
  let class_form = document.getElementById("class_form_" + personnel_id);
  let data = new FormData(class_form);
  data.append('class_personnel', class_form.elements['class_personnel_' + personnel_id].value);
  data.append('class_number_id', class_form.elements['class_number_id_' + personnel_id].value);
  data.append('add_personnel', '');

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./ajax/class_course.php", true);

  xhr.onload = function() {
    if (this.responseText == 1) {
      swal("success", "Personnel Added to the class", "success");
      class_form.reset();
      get_personnel(<?php echo $result['id']; ?>);
    } else {
      swal("Error!", "Server", "error");
    }
  }

  xhr.send(data);
};




function get_personnel(personnel_id) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./ajax/class_course.php", true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onload = function() {
    document.getElementById('classpersonnel_data').innerHTML = this.responseText;
  }

  xhr.send('get_personnel=' + personnel_id);

 
}


let add_certificates_form = document.getElementById('add_certificates_form');

add_certificates_form.addEventListener('submit',function(e){
    e.preventDefault();
    add_certificate();
});

function add_certificate(){
    let data = new FormData();
        data.append('image',add_certificates_form.elements['image'].files[0]);
        // data.append('status',add_certificates_form.elements['status'].value);
        data.append('end',add_certificates_form.elements['end'].value);
        data.append('personnel_id',add_certificates_form.elements['personnel_id'].value);
        data.append('add_certificate','');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "./ajax/class_course.php", true);
    

            xhr.onload = function(){
              var myModalEl = document.getElementById('add_certificates')
               var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
              modal.hide();
                if(this.responseText== 'inv_img'){
                    swal('error', 'Only JPG, WEBP or PNG images are supported');
                }else if(this.responseText== 'inv_size'){
                    swal('error', 'Image should be less than 2mb!');
                }else if(this.responseText== 'upd_failed'){
                    swal('error','Image upload failed');
                }else{
                    swal("success", "Certificate Add To The Personnel", "success");
                    // room_images(add_image_form.elements['room_id'].value,document.querySelector("#room_images .modal-title").innerText);
                    add_certificates_form.reset(); 
                   
                
                  
                   
                }
            }
        xhr.send(data);
}


function personnel_certificate(id,rname){
    document.querySelector('#add_certificates .modal-title').innerText= rname;
    add_certificates_form.elements['personnel_id'].value = id;
    add_certificates_form.elements['image'].value = '';
    add_certificates_form.elements['end'].value = '';
       
       let xhr = new XMLHttpRequest();
       xhr.open("POST", "./ajax/class_course.php", true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

        xhr.onload = function(){
     
            document.getElementById('class_certificate_data').innerHTML = this.responseText;
        } 

        xhr.send('get_certificate='+id);
}


function rem_image(img_id,class_course_id){
        let data = new FormData();
        data.append('image_id',img_id);
        data.append('class_course_id',class_course_id);
        data.append('rem_image','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "./ajax/class_course.php", true);
    

            xhr.onload = function(){
                if(this.responseText== 1){
                  swal("success", "Delete Certificates", "success");
                    // room_images(room_id,document.querySelector("#room_images .modal-title").innerText);
                }else{
                  swal("Error!", "Server", "error");
                }
               
      
    }
    xhr.send(data);
    }


       
function toggleStatus(id,val){
        
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "./ajax/class_course.php", true);
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        
            xhr.onload = function(){
                if(this.responseText==1){
                    // alert('success','Status Active');
                    get_personnel(<?php echo $result['id']; ?>);
                }
                else{
                    alert('error','Status Not Active');
                }
            }
            xhr.send('toggleStatus='+id+'&value='+val);
    
    }


  function toggleStatusDrop(id,val){
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./ajax/class_course.php", true);
  xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

  xhr.onload = function(){
    if(this.responseText==1){
      // alert('success','Status Active');
      get_personnel(<?php echo $result['id']; ?>);
      // disable all training_status buttons
      let trainingStatusBtns = document.querySelectorAll('.training-status-btn');
      for(let i=0; i<trainingStatusBtns.length; i++){
        trainingStatusBtns[i].disabled = true;
      }
    }
    else{
      alert('error','Status Not Active');
    }
  }
  xhr.send('toggleStatusDrop='+id+'&value='+val);
}

    
    








window.onload = function(){
    get_personnel(<?php echo $result['id']; ?>);

    }
    
    



</script>



         

        








             
   </body>
</html>