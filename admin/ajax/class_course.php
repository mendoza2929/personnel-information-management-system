<?php 

require('.././db_config.php');
require('.././alert.php');
adminLogin();

date_default_timezone_set("Asia/Manila");

if(isset($_POST['add_personnel'])){
  $frm_data = filteration($_POST);
  
  // Retrieve the class number and course ID from the form data
  $class_personnel = $frm_data['class_personnel'];
  $course_class_id = $frm_data['class_number_id'];

  // Use the class number and course ID in your SQL query
  $q = "INSERT INTO `course_training` (`class_number_id`,`personnel_name`) VALUES (?,?)";
  $values = [$course_class_id,$class_personnel ];
  $res = insert($q,$values,'is');
  echo $res;
}


if(isset($_POST['get_personnel'])){
  $frm_data = filteration($_POST);
  $personnel_id = $frm_data['get_personnel'];

  $i = 1;

  $res = select("SELECT * FROM `course_training` WHERE `class_number_id`=?", [$personnel_id], 'i');

  while($row = mysqli_fetch_assoc($res)){
    
    if ($row['training_status'] == 1) {
      $status = "<button onclick='toggleStatus($row[id],0)' class='btn btn-warning btn-sm shadow-none'>On Going</button>";
  } else {
      $status = " <button type='button' onclick='personnel_certificate($row[id],$row[personnel_name])' class='btn btn-success btn-sm shadow-none'  data-bs-toggle='modal' data-bs-target='#add_certificates'>
      Complete
       </button>";
  }
  
  // if ($row['drop_status'] == 1) {
  //     $drop_status = "<button onclick='toggleStatusDrop($row[id],0)' class='btn btn-danger btn-sm shadow-none' id='toggleDropBtn$row[id]'>Drop</button>";
  // } else {
  //     $drop_status = "<button onclick='toggleStatusDrop($row[id],1)' class='btn btn-danger btn-sm shadow-none disabled' id='toggleDropBtn$row[id]'>Drop</button>";
  // }

      echo<<<data
      <tr class='align-middle'>
          <td>$i</td>
          <td>$row[personnel_name]</td>
          <td>$status</td>

          
      </tr>
      data;
      $i++;
  }
}


// <button type="button" onclick="personnel_certificate($row[id], '$row[personnel_name]')" class="btn btn-info btn-sm shadow-none"  data-bs-toggle='modal' data-bs-target='#add_certificates'>
// <i class="bi bi-image"></i>
//  </button>

if(isset($_POST['toggleStatus'])){
  $frm_data = filteration($_POST);

  $q= "UPDATE `course_training` SET `training_status`=? WHERE `id`=?";
  $v = [$frm_data['value'],$frm_data['toggleStatus']];

  if(update($q,$v,'ii')){
      echo 1;
  }else{
      echo 0; 
  }

}

if(isset($_POST['toggleStatusDrop'])){
  $frm_data = filteration($_POST);

  $q= "UPDATE `course_training` SET `drop_status`=? WHERE `id`=?";
  $v = [$frm_data['value'],$frm_data['toggleStatusDrop']];

  if(update($q,$v,'ii')){
      echo 1;
  }else{
      echo 0; 
  }

}



if(isset($_POST['add_certificate'])){
  $frm_data = filteration($_POST);

  $img_r = uploadImage($_FILES['image'], CERTIFICATE_FOLDER);

  if($img_r == 'inv_image'){
    echo $img_r;

  }else if($img_r == 'inv_size'){
    echo $img_r;
  }else if($img_r == 'upd_failed'){
    echo $img_r;
  }else {
    $q = "INSERT INTO `certificates` (`class_course_id`,`image`,`end_class`) VALUES (?,?,?) ";
    $values  = [$frm_data['personnel_id'],$img_r,$frm_data['end']];
    $res = insert($q,$values,'iss');
    echo $res;
  }

}



if(isset($_POST['get_certificate'])){
  $frm_data = filteration($_POST);
  $res = select("SELECT * FROM `certificates` WHERE `class_course_id`= ?", [$frm_data['get_certificate']],'i'); 

  $path = CERTIFICATE_IMG_PATH;


  while($row = mysqli_fetch_assoc($res)){
    echo<<<data
      <tr class='align-middle'>
      
      <td><img src='$path$row[image]' class='img-fluid w-100'></td>
      <td>$row[end_class]</td>
      <td>
      <button type='button' onclick='' class='btn btn-success btn-sm shadow-none'><i class="bi bi-printer"></i> Print</button>             
      </td>
      </tr>
    data;
  }


  
//   if(isset($_POST['rem_image'])){
//     $frm_data = filteration($_POST);

//     $values = [$frm_data['image_id'],$frm_data['class_course_id']];

//     $pre_q = "SELECT * FROM `certificates` WHERE `id`=? AND `class_course_id`=?";
//     $res = select($pre_q,$values,'ii');
//     $img = mysqli_fetch_assoc($res);

//     if(deleteImage($img['image'],CERTIFICATE_FOLDER)){
//         $q = "DELETE FROM `certificates` WHERE `id`=? AND `class_course_id`=?";
//         $res = delete($q,$values,'ii');
//         echo $res;
//     }else{  
//         echo 0;
//     }

// }





}