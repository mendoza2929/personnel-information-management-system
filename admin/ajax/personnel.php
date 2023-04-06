<?php 

require('.././db_config.php');
require('.././alert.php');
adminLogin();



if(isset($_POST['add_personnel'])){
    // $features = filteration(json_decode($_POST['features']));

    $frm_data = filteration($_POST);
    $flag = 0;

    $q1 = "INSERT INTO `personnel`(`rank`, `unit`, `last`, `first`, `middle`, `suffix`, `street`, `address`, `city`,`province`, `gender`, `birthday`, `batch`) 
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $values = [$frm_data['rank'],$frm_data['unit'],$frm_data['last'],$frm_data['first']
    ,$frm_data['middle'],$frm_data['suffix'],$frm_data['street'],$frm_data['address'],$frm_data['city'],$frm_data['province']
    ,$frm_data['gender'],$frm_data['birthday'],$frm_data['batch']];

    
    if(insert($q1,$values,'sssssssssssss')){
        $flag=1;
    }

    
    if($flag){
        echo 1;
    }else{
        echo 0;
    }


}


if(isset($_POST['get_personnel'])){  
    $res = selectAll('personnel');
    $i=1;

    $data = "";

    while($row = mysqli_fetch_assoc($res)){
        if ($row['status'] == 1) {
            $status = "<button onclick='toggleStatus($row[id],0)' class='btn btn-success btn-sm shadow-none'>Active</button>";
        } else if ($row['status'] == 2) {
            $status = "<button onclick='toggleStatus($row[id],1)' class='btn btn-danger btn-sm shadow-none'>Dismissed</button>";
        } else if ($row['status'] == 3) {
            $status = "<button onclick='toggleStatus($row[id],2)' class='btn btn-danger btn-sm shadow-none'>Suspended</button>";
        } else {
            $status = "<button onclick='toggleStatus($row[id],3)' class='btn btn-danger btn-sm shadow-none'>Retired</button>";;
        }

//     if($row['training_status']==1){
       
//         $trainingstatus = "<span  onclick='toggleStatus($row[id],0)'class=' rounded-pill bg-light text-info mb-3 text-wrap lh-base'>On Going</span>";

// }else{

//     $trainingstatus = "<span onclick='toggleStatus($row[id],1)' class=' rounded-pill bg-light text-success mb-3 text-wrap lh-base'>Completed</span>";

// }

 
   
       
    $data.= "
    <tr class='align-middle'>
        <td>$i</td>
        <td>$row[rank]</td>
        <td>$row[last], $row[first] $row[middle] $row[suffix]<br>" . date('F j, Y', strtotime($row['birthday'])) . "</td>
        <td>$row[gender]</td>
        <td>$row[street] <br> $row[address] <br> $row[city] <br> $row[province]</td>
        <td>$row[unit]</td>
        <td>$row[batch]</td>
        <td>$status</td>
        <td>
        <button type='button' onclick='personnel_details($row[id])' class='btn btn-warning btn-sm shadow-none me-3' data-bs-toggle='modal' data-bs-target='#edit-personnel'>
        <i class='i bi-pencil-square'></i>
        </button>
        </td>
    </tr>
";
$i++;



//  <button type='button' onclick='remove_room($row[id])' class='btn btn-danger btn-sm shadow-none'>

}
echo $data;
}





if(isset($_POST['toggleStatus'])){
    $frm_data = filteration($_POST);

    $q= "UPDATE `personnel` SET `status`=? WHERE `id`=?";
    $v = [$frm_data['value'],$frm_data['toggleStatus']];

    if(update($q,$v,'ii')){
        echo 1;
    }else{
        echo 0; 
    }

}


if(isset($_POST['edit_personnel'])){
    $frm_data = filteration($_POST);

    $res1 = select("SELECT * FROM `personnel` WHERE  `id`=?",[$frm_data['edit_personnel']],'i');
   


    $personneldata = mysqli_fetch_assoc($res1);

    
    // if(mysqli_num_rows($res2)>0){
    //      while($row = mysqli_fetch_assoc($res2)){
    //         array_push($features,$row['facilities_id']);
    //      }
    // }

    $data = ["personneldata"=>$personneldata];

    
    $data = json_encode($data);

    echo $data;
}





if(isset($_POST['submit_edit_personnel'])){

    $frm_data = filteration($_POST);

    $flag = 0;

    // check if clearance_id is present
    if(isset($frm_data['personnel_id'])){

        $q1 = "UPDATE `personnel` SET `rank`=?,`unit`=?,`last`=?,`first`=?,`middle`=?,`suffix`=?,`street`=?,`address`=?,`city`=?,`province`=?,`gender`=?,`birthday`=?,`batch`=?   WHERE `id`=?";
        $values = [$frm_data['rank'],$frm_data['unit'],$frm_data['last'],$frm_data['first']
        ,$frm_data['middle'],$frm_data['suffix'],$frm_data['street'],$frm_data['address'],$frm_data['city'],$frm_data['province']
        ,$frm_data['gender'],$frm_data['birthday'],$frm_data['batch'],$frm_data['personnel_id']];

        if(update($q1,$values,'ssssssssssssss')){
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


    if(isset($_POST['search_personnel'])){
        $frm_data = filteration($_POST);
        $query = "SELECT * FROM `personnel` WHERE CONCAT(`rank`, `last`,`first`,`birthday`,`unit`,`batch`) LIKE ?";
        $res = select($query,["%$frm_data[name]%"],'s');
        $i=1;
        $data= "";
        while($row = mysqli_fetch_array($res)){
            if($row['status']==1){
    
                $status = "<button  onclick='toggleStatus($row[id],0)'class='btn btn-success btn-sm shadow-none'>Active</button>";
        
        }else{
        
            $status = "<button onclick='toggleStatus($row[id],1)' class='btn btn-danger btn-sm shadow-none'>Not active</button>";
        
        }

        $data.= "
        
        <tr class='align-middle'>
            <td>$i</td>
            <td>$row[rank]</td>
            <td>$row[last], $row[first] $row[middle] $row[suffix]<br>" . date('F j, Y', strtotime($row['birthday'])) . "</td>
            <td>$row[gender]</td>
            <td>$row[street] <br> $row[address] <br> $row[province]</td>
            <td>$row[unit]</td>
            <td>$row[batch]</td>
            <td>$status</td>
            <td>
            <button type='button' onclick='personnel_details($row[id])' class='btn btn-warning btn-sm shadow-none me-3' data-bs-toggle='modal' data-bs-target='#edit-personnel'>
            <i class='i bi-pencil-square'></i>
            </button>
            </td>
        </tr>

        ";
        $i++;


        }
        echo $data;
    }



if(isset($_POST['add_course'])){

    $frm_data = filteration($_POST);
    $flag = 0;

    $q1 = "INSERT INTO `personnel_course` (`personnel_id`, `batch`,`course`,`start`,`end`) 
    VALUES (?,?,?,?,?)";
    $values = [$frm_data['personnel_id'],$frm_data['batch'],$frm_data['course'],$frm_data['start'],$frm_data['end']];

    
    if(insert($q1,$values,'issss')){
        $flag=1;
    }

    
    if($flag){
        echo 1;
    }else{
        echo 0;
    }
}


// if(isset($_POST['get_course'])){

//     $frm_data = filteration($_POST);
//     $res = select("SELECT * FROM `personnel_details` WHERE `personnel_id`=? AND `course_id`=? ",[$frm_data['get_course']],'i');

//    while($row = mysqli_fetch_assoc($res)){
//     echo<<<data

//     <tr class='align-middle'>
//     <td>$row[batch]</td>

    
    
//     </tr>

//     data;
//    }
// }

if(isset($_POST['get_course'])){
    $frm_data = filteration($_POST);
    $res = select("SELECT * FROM `personnel_details` WHERE `personnel_id`=?",[$frm_data['get_course']],'i');

    while($row = mysqli_fetch_assoc($res)){
        // Retrieve the course_id value
        $courseId = $row['course_id'];
        
        // Query to retrieve the course value based on course_id
        $courseQuery = "SELECT name FROM course  WHERE id = $courseId";
        $courseResult = mysqli_query($con, $courseQuery);
        $courseRow = mysqli_fetch_assoc($courseResult);
        $row['name'] = $courseRow['name'];

      // Retrieve the training_status value
      $trainingStatus = $row['training_status'];

      // Use the retrieved values as needed
      if($trainingStatus == 1){
          $trainingstatus = "<span onclick='toggleStatus($row[id],0)' class='rounded-pill bg-light text-warning mb-3 text-wrap lh-base fw-bold'>On Going</span>";
      } else {
          $trainingstatus = "<span onclick='toggleStatus($row[id],1)' class='rounded-pill bg-light text-success mb-3 text-wrap lh-base fw-bold'>Completed</span>";
      }
        
        // Use the retrieved values as needed
        echo<<<data
        <tr class='align-middle'>
        <td>{$row['batch']}</td>
        <td>{$row['name']}</td>
        <td>{$row['datentime']}</td>
        <td>{$trainingstatus}</td>
        </tr>
        data;
    }
}






// if(isset($_POST['get_course'])){

//     $frm_data = filteration($_POST);
//    $res = select("SELECT * FROM `personnel_course` WHERE `personnel_id`=?",[$frm_data['get_course']],'i');

//    while($row = mysqli_fetch_assoc($res)){
//     echo<<<data

//     <tr class='align-middle'>
//     <td>$row[batch]</td>
//     <td>$row[course]</td>
//     <td>Start Date: $row[start] <br> End Date: $row[end]</td>
    
    
//     </tr>

//     data;
//    }
// }













?>