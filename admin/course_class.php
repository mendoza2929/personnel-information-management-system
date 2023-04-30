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
      <title>Course Class - Personnel Training Information Managment System</title>
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
                                <th scope="col">Participant</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                             
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
  <label class="form-label fw-bold">Add Participant </label>
  <input type="text" class="form-control mb-2 shadow-none" list="personnel_list_code" name="class_code_<?php echo $result['id']; ?>" placeholder="Type to search Personnel Name" required>
  <datalist id="personnel_list_code">
    <?php
    $res = $con->query ('SELECT * FROM `personnel`');
    while($opt = mysqli_fetch_assoc($res)){
    ?>
      <option value="<?php echo $opt['id'];?> <?php echo $opt['rank'].' '. $opt['last'].' '.  $opt['first'].' '.$opt['middle'].' '.  $opt['suffix'] ?> "></option>
    <?php
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

                <div class="mb-3">
                  <label class="form-label fw-bold">Status</label>
                  <select class='form-select shadow-none' aria-label='Default select example' name='status' >
                  <option disabled selected value="">Select a status</option> <!-- placeholder option -->
                                <option value="Completed">Completed</option>
                                <option value="Drop">Drop</option>
                                </select>
                </div>

                <button type="submit" class="btn btn-success text-white shadow-none text-end">ADD</button>
                <input type="hidden" name="personnel_id">
            </form>
        </div>

        <div class="table-responsive-md" style="height:450px;">
                           <table class="table table-hover border">
                           <thead>
                                <tr class="text-white" style="background-color:#1d3557;">
                                <th scope="col">Status</th>
                                <th scope="col">End Class</th>
                          
                             
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
  // data.append('class_personnel', class_form.elements['class_personnel_' + personnel_id].value);
  data.append('class_number_id', class_form.elements['class_number_id_' + personnel_id].value);
  data.append('class_code', class_form.elements['class_code_' + personnel_id].value);
  data.append('add_personnel', '');

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./ajax/class_course.php", true);

  xhr.onload = function() {
    if (this.responseText == 1) {
      swal("success", "Personnel Added to the class", "success");
      class_form.reset();
      get_personnel(<?php echo $result['id']; ?>);
    } else {
      swal("Error!", "This personnel is already added", "error");
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
        data.append('status',add_certificates_form.elements['status'].value);
        data.append('end',add_certificates_form.elements['end'].value);
        data.append('personnel_id',add_certificates_form.elements['personnel_id'].value);
        data.append('add_certificate','');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "./ajax/class_course.php", true);
    

            xhr.onload = function(){
              var myModalEl = document.getElementById('add_certificates')
              var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
              modal.hide();
                if(this.responseText == 'inv_img'){
                    swal('error', 'Only JPG, WEBP or PNG images are supported');
                } else if(this.responseText == 'inv_size'){
                    swal('error', 'Image should be less than 2mb!');
                } else if(this.responseText == 'upd_failed'){
                    swal('error','Image upload failed');
                } else if(this.responseText == 'cert_exists'){
                    swal('error', 'A Attachments has already been uploaded for this personnel',"error");
                } else {
                    swal("success", "Attactments Add To The Personnel", "success");
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
    add_certificates_form.elements['status'].value = '';
       
       let xhr = new XMLHttpRequest();
       xhr.open("POST", "./ajax/class_course.php", true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

        xhr.onload = function(){
     
            document.getElementById('class_certificate_data').innerHTML = this.responseText;
        } 

        xhr.send('get_certificate='+id);
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