<?php 

require('.././db_config.php');
require('.././alert.php');
adminLogin();

date_default_timezone_set("Asia/Manila");

if(isset($_POST['add_personnel'])){
  $frm_data = filteration($_POST);
  
  // Retrieve the class number and course ID from the form data
  $course_class_id = $frm_data['class_number_id'];
  $code_class_id = $frm_data['class_code'];

  // Query the database to check if personnel already exists for this class number
  $existing_personnel = select("SELECT * FROM `course_personnel` WHERE `code_id`=? AND `class_number_id`=?", [$code_class_id, $course_class_id], 'ii');

  // Check if personnel already exists for this class number
  if(mysqli_num_rows($existing_personnel) > 0){
    // Personnel already exists for this class number, display an error message or redirect to a different page
    echo "This personnel is already added to the selected class number.";
    return;
  }

  // Personnel doesn't exist for this class number, proceed with insertion
  $q = "INSERT INTO `course_personnel` (`class_number_id`,`code_id`) VALUES (?,?)";
  $values = [$course_class_id,$code_class_id ];
  $res = insert($q,$values,'ii');
  echo $res;
}

if(isset($_POST['get_personnel'])){
  $frm_data = filteration($_POST);
  $personnel_id = $frm_data['get_personnel'];

  $i = 1;

  $res = select("SELECT t.*, Concat(p.rank, ' ', p.last, ' ', p.first, ' ', p.middle, ' ', p.suffix) as pname, c.cert_status 
                 FROM course_personnel t 
                 INNER JOIN personnel p ON p.id = t.code_id 
                 LEFT JOIN certificates c ON c.class_course_id = t.id 
                 WHERE t.class_number_id = ?", [$personnel_id], 'i');

  while($row = mysqli_fetch_assoc($res)){
    // if ($row['training_status'] == 1) {
    //   $status = "<button onclick='toggleStatus($row[id], 0)' class='btn btn-warning btn-sm shadow-none'>Completed</button>";
    // } else if ($row['training_status'] == 2) {
    //   $status = "<button onclick='toggleStatus($row[id], 1)' class='btn btn-warning btn-sm shadow-none'>On Going</button>";
    // } else if ($row['training_status'] == 3) {
    //   $status = "<button onclick='toggleStatus($row[id], 2)' class='btn btn-warning btn-sm shadow-none'>Test</button>";
    // }else{
    //   $status = "<button onclick='toggleStatus($row[id], 3)' class='btn btn-warning btn-sm shadow-none'>Drop</button>";
    // }

    // retrieve cert_status value from the row
    $cert_status = $row['cert_status'] ?? ''; // Use the null coalescing operator to handle cases where cert_status is null

    echo<<<data
      <tr class='align-middle'>
          <td>$i</td>
          <td width="50%">$row[pname]</td>
          <td><span class='rounded-pill bg-light text-primary mb-3 text-wrap lh-bas fw-bold'>$cert_status</span></td> <!-- Display cert_status value in the table -->
          <td> <button type="button" onclick="personnel_certificate($row[id], '$row[code_id]')" class="btn btn-success btn-sm shadow-none"  data-bs-toggle='modal' data-bs-target='#add_certificates'>
          <i class="bi bi-image"></i>
          </button></td>
      </tr>
    data;
    $i++;
  }
}



// $status = "<button type='button' onclick='personnel_certificate($row[id],$row[code_id], 1)' class='btn btn-success btn-sm shadow-none' data-bs-toggle='modal' data-bs-target='#add_certificates'>Status</button>";




if(isset($_POST['toggleStatus'])){
  $frm_data = filteration($_POST);

  $q= "UPDATE `course_personnel` SET `training_status`=? WHERE `id`=?";
  $v = [$frm_data['value'],$frm_data['toggleStatus']];

  if(update($q,$v,'ii')){
      echo 1;
  }else{
      echo 0; 
  }

}



if(isset($_POST['add_certificate'])){
  $frm_data = filteration($_POST);

  // Check if a certificate has already been uploaded for this personnel
  $q = "SELECT * FROM `certificates` WHERE `class_course_id`=?";
  $result = select($q, [$frm_data['personnel_id']], 'i');

  if ($result && mysqli_num_rows($result) > 0) {
    echo "cert_exists";
  } else {
    $img_r = uploadImage($_FILES['image'], CERTIFICATE_FOLDER);

    if($img_r == 'inv_image'){
      echo $img_r;

    }else if($img_r == 'inv_size'){
      echo $img_r;
    }else if($img_r == 'upd_failed'){
      echo $img_r;
    }else {
      $q = "INSERT INTO `certificates` (`class_course_id`,`cert_image`,`end_class`,`cert_status`) VALUES (?,?,?,?) ";
      $values  = [$frm_data['personnel_id'],$img_r,$frm_data['end'],$frm_data['status']];
      $res = insert($q,$values,'isss');
      echo $res;
    }
  }
}


if(isset($_POST['get_certificate'])){
  $frm_data = filteration($_POST);
  $res = select("SELECT * FROM `certificates` WHERE `class_course_id`= ?", [$frm_data['get_certificate']],'i'); 

  $path = CERTIFICATE_IMG_PATH;


  while($row = mysqli_fetch_assoc($res)){
    echo<<<data

    
      <tr class='align-middle'>
      
      <td> <span class='rounded-pill bg-light text-success mb-3 text-wrap lh-bas fw-bold'>
      <a href='$path$row[cert_image]'>{$row['cert_status']}</a>
      </span></td>
    

      <td>$row[end_class]</td>

      </tr>
    data;
  }





  





}