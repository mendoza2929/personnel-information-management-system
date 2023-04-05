<?php 

require('.././db_config.php');
require('.././alert.php');
adminLogin();

date_default_timezone_set("Asia/Manila");

if(isset($_POST['add_course'])){
    $frm_data = filteration($_POST);

    $q = "INSERT INTO `course` (`name`, `description`) VALUES (?,?)";
    $values = [$frm_data['course_name'],$frm_data['desc_name']];
    $res = insert($q,$values,'ss');
    echo $res;
}


if(isset($_POST['get_course'])){
    
    $res =selectAll('course');
    
    $i = 1;

    while($row = mysqli_fetch_assoc($res)){
        echo <<<data

        <tr class="align-middle">
        <td>$i</td>
        <td>$row[name]</td>
        <td>$row[description]</td>
        <td>

        
        <button type="button" onclick="personnel_course($row[id])" class="btn btn-success btn-sm shadow-none"  data-bs-toggle='modal' data-bs-target='#add_personnel'>
        <i class="bi bi-plus"></i>Add Participant
         </button>


        
        </td>
        </tr>

        data;
        $i++;
    }

  
}


if(isset($_POST['edit_course'])){
    $frm_data = filteration($_POST);

    $res1 = select("SELECT * FROM `course` WHERE  `id`=?",[$frm_data['edit_course']],'i');
   


    $personneldata = mysqli_fetch_assoc($res1);


    // if(mysqli_num_rows($res2)>0){
    //      while($row = mysqli_fetch_assoc($res2)){
    //         array_push($features,$row['facilities_id']);
    //      }
    // }

    $data = ["coursedata"=>$coursedata];

    
    $data = json_encode($data);

    echo $data;
}



// if(isset($_POST['rem_course'])){
//     $frm_data = filteration($_POST);
//     $values = [$frm_data['rem_course']];

//     $q = "DELETE FROM `course` WHERE `id`=?";
//     $res = delete($q, $values,'i');
//     echo $res;
// }


if(isset($_POST['add_course_personnel'])){
    $frm_data = filteration($_POST);

    $q = "INSERT INTO `personnel_details` (`course_id`,`personnel_id`, `batch`,`personnel`) VALUES (?,?,?,?)";
    $values = [$frm_data['course_id'],$frm_data['personnel_name'],$frm_data['batch'],$frm_data['personnel_name_list']];
    $res = insert($q,$values,'iiss');
    echo $res;

    // $q1 = "INSERT INTO `personnel_order` (`batch`) VALUES (?)";
    // $values = [$frm_data['batch']];
    // $res1 = insert($q1,$values,'s'); // Change variable name from $res to $res1
    // echo $res1;
}





if(isset($_POST['get_personnel_course'])){

    $frm_data = filteration($_POST);
   $res = select("SELECT * FROM `personnel_details` WHERE `course_id`=? " ,[$frm_data['get_personnel_course']],'i');

   while($row = mysqli_fetch_assoc($res)){
    echo<<<data

    <tr class='align-middle'>
    <td>$row[batch]</td>
    <td>$row[personnel]</td>
    <td>$row[datentime]</td>
    
    
    </tr>

    data;
   }
}






?>