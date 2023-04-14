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
        <td><a href='course_view.php?id=$row[id]'>$row[name]</a></td>
        <td>$row[description]</td>
        <td>

        
        <button type="button" onclick='course_details($row[id])'  class="btn btn-success btn-sm shadow-none"  data-bs-toggle='modal' data-bs-target='#edit_course'>
        <i class="bi bi-pencil"></i>
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

    $data = ["coursedata"=>$personneldata];

    $json_data = json_encode($data);

    header('Content-Type: application/json');
    echo $json_data;
    exit;
}

if(isset($_POST['submit_edit_course'])){

    $frm_data = filteration($_POST);

    $flag = 0;

    // check if clearance_id is present
    if(isset($frm_data['course_id'])){

        $q1 = "UPDATE `course` SET `name`=?,`description`=?   WHERE `id`=?";
        $values = [$frm_data['course_name'],$frm_data['desc_name'],$frm_data['course_id']];

        if(update($q1,$values,'sss')){
            $flag=1;
        }
    } else {
        // display an error message or redirect the user
        echo "Error: personnel_id is not defined";
    }

    if($flag){
        echo 1;
    }else{
        echo 0;
    }
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


if(isset($_POST['add_class'])){
    $frm_data = filteration($_POST);
    
    // Retrieve the class number and course ID from the form data
    $class_number = $frm_data['class_number'];
    $course_id = $frm_data['course_id'];
    $proponent = $frm_data['proponent'];
    $open = $frm_data['open'];
  
    // Use the class number and course ID in your SQL query
    $q = "INSERT INTO `course_class` (`class_number`, `class_id`, `course_id`,`proponent`,`open`) VALUES (?, ?, ?,?,?)";
    $values = [$class_number, $frm_data['class_id'], $course_id,$proponent,$open];
    $res = insert($q,$values,'siiss');
    echo $res;
  }



  if(isset($_POST['get_class'])){
    $frm_data = filteration($_POST);
    $course_id = $frm_data['get_class'];

    $i = 1;

    $res = select("SELECT * FROM `course_class` WHERE `course_id`=?", [$course_id], 'i');

    while($row = mysqli_fetch_assoc($res)){

        if ($row['status'] == 1) {
            $status = "<button onclick='toggleStatus1($row[id],0)' class='btn btn-warning btn-sm shadow-none'>On Going</button>";
        } else {
            $status = "<button onclick='toggleStatus1($row[id],1)' class='btn btn-success btn-sm shadow-none disabled'>Complete</button>";
        }

        echo<<<data
        <tr class='align-middle'>
            <td>$i</td>
            <td><a href='course_class.php?id=$row[id]'>$row[class_number]</a></td>
            <td>$row[proponent]</td>
            <td>$row[open]</td>
            <td>$status</td>


          
        </tr>
        data;
        $i++;
    }
}


if(isset($_POST['toggleStatus1'])){
    $frm_data = filteration($_POST);

    $q= "UPDATE `course_class` SET `status`=? WHERE `id`=?";
    $v = [$frm_data['value'],$frm_data['toggleStatus1']];

    if(update($q,$v,'ii')){
        echo 1;
    }else{
        echo 0; 
    }

}





?>