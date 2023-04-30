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
      <title>Course View - Personnel Training Information Managment System</title>
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

                        <div class="d-flex align-items-center">
                        
                        <!--<input type="text" oninput="search_class_number(this.value)" class="form-control shadow-none w-25 ms-auto mb-2" placeholder="Type to search..">-->
                           
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
                                <th scope="col">Action</th>
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
              <select class='form-select shadow-none' aria-label='Default select example' name="proponent_<?php echo $result['id']; ?>" required>
               <option disabled selected value="">Select a Proponent</option> <!-- placeholder option -->
               <?php
                $res = selectAll('proponent');
                 while($opt = mysqli_fetch_assoc($res)){
                echo "<option value='$opt[name]'>$opt[name]</option>";
                 }
                ?>
          </select>
           
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


<div class="modal fade" id="edit_course_view" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-course-id="<?php echo $result['id']; ?>">
  <div class="modal-dialog">
    <form id="edit_course_view_form">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="bi bi-clipboard-data"></i> Edit Class Number</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label fw-bold">Class Number</label>
            <input type="text" name="class_number" class="form-control shadow-none">
          </div>
          <div class="mb-3">
          <label class="form-label fw-bold">Proponent</label>
              <select class='form-select shadow-none' aria-label='Default select example' name="proponent" required>
               <option disabled selected value="">Select a Proponent</option> <!-- placeholder option -->
               <?php
                $res = selectAll('proponent');
                 while($opt = mysqli_fetch_assoc($res)){
                echo "<option value='$opt[name]'>$opt[name]</option>";
                 }
                ?>
          </select>
           
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold">Opening Class</label>
            <input type="date" name="open" class="form-control shadow-none">
          </div>
          <input type="hidden" name="class_number_id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary shadow-none" data-bs-dismiss="modal">Close</button>
     
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
 

 function add_class(course_id) {
  let course_form = document.getElementById("course_form_" + course_id);
  let data = new FormData(course_form);
  data.append('class_number', course_form.elements['class_number_' + course_id].value);
  data.append('proponent', course_form.elements['proponent_' + course_id].value);
  data.append('open', course_form.elements['open_' + course_id].value);
  // data.append('class_id', course_id);
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



    let edit_course_view_form = document.getElementById('edit_course_view_form');

function course_view_details(id){

let xhr = new XMLHttpRequest();
xhr.open("POST", "./ajax/course.php", true);
xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');


xhr.onload = function(){
let data = JSON.parse(this.responseText);
edit_course_view_form.elements['class_number'].value = data.course_viewdata.class_number;
edit_course_view_form.elements['proponent'].value = data.course_viewdata.proponent;
edit_course_view_form.elements['open'].value = data.course_viewdata.open;
edit_course_view_form.elements['class_number_id'].value = data.course_viewdata.id;
}

xhr.send('edit_course_view='+id);
}


edit_course_view_form.addEventListener('submit',function(e){
e.preventDefault();
submit_edit_course_view();
});

function submit_edit_course_view(){
let data = new FormData();
data.append('submit_edit_course_view','');
data.append('class_number_id',edit_course_view_form.elements['class_number_id'].value);
data.append('name',edit_course_view_form.elements['class_number'].value);
data.append('proponent',edit_course_view_form.elements['proponent'].value);
data.append('open',edit_course_view_form.elements['open'].value);

let xhr = new XMLHttpRequest();
xhr.open("POST", "./ajax/course.php", true);

xhr.onload = function(){
var myModalEl = document.getElementById('edit_course_view')
var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
modal.hide();

if(this.responseText==1){
    swal("Good job!", "You Successfully Edit Batch!", "success");
    edit_course_view_form.reset();
    get_class(<?php echo $result['id']; ?>);
    
}else{
    swal("Error!", "Server Down!", "error");
}

}
xhr.send(data);
}

function search_class_number(coursename){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/course.php", true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('classnumber_data').innerHTML = this.responseText;
    }
    xhr.send('search_class_number&name='+coursename);
}











window.onload = function(){
   get_class(<?php echo $result['id']; ?>);
    }
    
    



</script>



         

        








             
   </body>
</html>