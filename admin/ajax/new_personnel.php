<?php 

require('.././db_config.php');
require('.././alert.php');
adminLogin();



if(isset($_POST['get_new_personnel'])){  
    $res = mysqli_query($con, "SELECT id, last, first, middle, suffix , gender,street,address,province,rank, unit, batch, training_status FROM personnel WHERE status='1';");

    if($res === false){
        echo "Error: " . mysqli_error($con);
    } else {
        $i=1;
        $data = "";
        while($row = mysqli_fetch_assoc($res)){

        //     if($row['training_status']==1){
   
        //         $status = "<button  onclick='toggleStatus($row[id],0)'class='btn btn-warning btn-sm shadow-none'>On Going</button>";
        
        // }else{
        
        //     $status = "<button onclick='toggleStatus($row[id],1)' class='btn btn-success btn-sm shadow-none'>Complete</button>";
        
        // }
            $data.= "
            <tr class='align-middle'>
                <td>$i</td>
                <td>$row[rank]</td>
                <td>$row[last]  $row[first] $row[middle] $row[suffix]
                <td>$row[gender]</td>
                <td>$row[street] <br> $row[address] <br> $row[province]</td>
                <td>$row[batch]</td>
                <td>$row[unit]</td>
                <td> 
                <button type='button'onclick='personnel_course($row[id])' class='btn btn-info btn-sm shadow-none me-3' data-bs-toggle='modal' data-bs-target='#edit_course'>
                <i class='bi bi-eye'></i>
                </button>
                </td>
                
            </tr>
            ";
            $i++;
        }
        echo $data;
    }
}


if(isset($_POST['get_view_training_personnel'])){  
    $res = mysqli_query($con, "SELECT id, last, first, middle, suffix ,rank, unit, batch, training_status FROM personnel WHERE status='1';");

    if($res === false){
        echo "Error: " . mysqli_error($con);
    } else {
        $i=1;
        $data = "";
        while($row = mysqli_fetch_assoc($res)){

        //     if($row['training_status']==1){
   
        //         $status = "<button  onclick='toggleStatus($row[id],0)'class='btn btn-warning btn-sm shadow-none'>On Going</button>";
        
        // }else{
        
        //     $status = "<button onclick='toggleStatus($row[id],1)' class='btn btn-success btn-sm shadow-none'>Complete</button>";
        
        // }
            $data.= "
            <tr class='align-middle'>
                <td>$i</td>
                <td>$row[rank]</td>
                <td>$row[last]  $row[first] $row[middle] $row[suffix]
                <td>$row[batch]</td>
                <td>$row[unit]</td>
                <td> 
                <button type='button'onclick='personnel_course($row[id])' class='btn btn-info btn-sm shadow-none me-3' data-bs-toggle='modal' data-bs-target='#edit_course'>
                <i class='bi bi-eye'></i>
                </button>
                </td>
                
            </tr>
            ";
            $i++;
        }
        echo $data;
    }
}










if(isset($_POST['get_retired_personnel'])){  
    $res = mysqli_query($con, "SELECT id, last, first, middle, suffix , gender,street,address,province,rank, unit, batch, training_status FROM personnel WHERE status='0';");

    if($res === false){
        echo "Error: " . mysqli_error($con);
    } else {
        $i=1;
        $data = "";
        while($row = mysqli_fetch_assoc($res)){

        //     if($row['training_status']==1){
   
        //         $status = "<button  onclick='toggleStatus($row[id],0)'class='btn btn-warning btn-sm shadow-none'>On Going</button>";
        
        // }else{
        
        //     $status = "<button onclick='toggleStatus($row[id],1)' class='btn btn-success btn-sm shadow-none'>Complete</button>";
        
        // }
            $data.= "
            <tr class='align-middle'>
                <td>$i</td>
                <td>$row[rank]</td>
                <td>$row[last]  $row[first] $row[middle] $row[suffix]
                <td>$row[gender]</td>
                <td>$row[street] <br> $row[address] <br> $row[province]</td>
                <td>$row[batch]</td>
                <td>$row[unit]</td>
                <td> 
                <button type='button'onclick='personnel_course($row[id])' class='btn btn-info btn-sm shadow-none me-3' data-bs-toggle='modal' data-bs-target='#edit_course'>
                <i class='bi bi-eye'></i>
                </button>
                </td>

                <td> 
                <button type='button 'onclick='p_retired_attachments($row[id])' class='btn btn-info btn-sm shadow-none me-3' data-bs-toggle='modal' data-bs-target='#edit_attachments'>
                <i class='bi bi-image'></i>
                </button>
                </td>

                
                
               
              
            </tr>
            ";
            $i++;
        }
        echo $data;
    }
}


if(isset($_POST['get_suspended_personnel'])){  
    $res = mysqli_query($con, "SELECT id, last, first, middle, suffix , gender,street,address,province,rank, unit,batch, training_status FROM personnel WHERE status='3';");

    if($res === false){
        echo "Error: " . mysqli_error($con);
    } else {
        $i=1;
        $data = "";
        while($row = mysqli_fetch_assoc($res)){

        //     if($row['training_status']==1){
   
        //         $status = "<button  onclick='toggleStatus($row[id],0)'class='btn btn-warning btn-sm shadow-none'>On Going</button>";
        
        // }else{
        
        //     $status = "<button onclick='toggleStatus($row[id],1)' class='btn btn-success btn-sm shadow-none'>Complete</button>";
        
        // }
            $data.= "
            <tr class='align-middle'>
                <td>$i</td>
                <td>$row[rank]</td>
                <td>$row[last]  $row[first] $row[middle] $row[suffix]
                <td>$row[gender]</td>
                <td>$row[street] <br> $row[address] <br> $row[province]</td>
                <td>$row[batch]</td>
                <td>$row[unit]</td>
                <td> 
                <button type='button'onclick='personnel_course($row[id])' class='btn btn-info btn-sm shadow-none me-3' data-bs-toggle='modal' data-bs-target='#edit_course'>
                <i class='bi bi-eye'></i>
                </button>
                </td>
            </tr>
            ";
            $i++;
        }
        echo $data;
    }
}

if(isset($_POST['get_dismissed_personnel'])){  
    $res = mysqli_query($con, "SELECT id, last, first, middle, suffix , gender,street,address,province,rank, unit, batch, training_status FROM personnel WHERE status='2';");

    if($res === false){
        echo "Error: " . mysqli_error($con);
    } else {
        $i=1;
        $data = "";
        while($row = mysqli_fetch_assoc($res)){

        //     if($row['training_status']==1){
   
        //         $status = "<button  onclick='toggleStatus($row[id],0)'class='btn btn-warning btn-sm shadow-none'>On Going</button>";
        
        // }else{
        
        //     $status = "<button onclick='toggleStatus($row[id],1)' class='btn btn-success btn-sm shadow-none'>Complete</button>";
        
        // }
            $data.= "
            <tr class='align-middle'>
                <td>$i</td>
                <td>$row[rank]</td>
                <td>$row[last]  $row[first] $row[middle] $row[suffix]
                <td>$row[gender]</td>
                <td>$row[street] <br> $row[address] <br> $row[province]</td>
                <td>$row[batch]</td>
                <td>$row[unit]</td>
                <td> 
                <button type='button'onclick='personnel_course($row[id])' class='btn btn-info btn-sm shadow-none me-3' data-bs-toggle='modal' data-bs-target='#edit_course'>
                <i class='bi bi-eye'></i>
                </button>
                </td>
            </tr>
            ";
            $i++;
        }
        echo $data;
    }
}






if(isset($_POST['search_active_personnel'])){
    $frm_data = filteration($_POST);
    $query = "SELECT * FROM `personnel` WHERE `status` = '1' AND CONCAT(`rank`, `last`, `first`, `birthday`, `unit`, `batch`) LIKE ?";
    $res = select($query,["%$frm_data[name]%"],'s');
    $i=1;
    $data= "";
    while($row = mysqli_fetch_array($res)){
       

    $data.= "
    
    <tr class='align-middle'>
                <td>$i</td>
                <td>$row[rank]</td>
                <td>$row[last]  $row[first] $row[middle] $row[suffix]
                <td>$row[gender]</td>
                <td>$row[street] <br> $row[address] <br> $row[province]</td>
                <td>$row[batch]</td>
                <td>$row[unit]</td>
                <td> <button type='button'onclick='personnel_course($row[id])' class='btn btn-info btn-sm shadow-none me-3' data-bs-toggle='modal' data-bs-target='#edit_course'>
                <i class='bi bi-eye'></i>
                </button></td>
     </tr>

    ";
    $i++;


    }
    echo $data;
}



if(isset($_POST['search_view_personnel'])){
    $frm_data = filteration($_POST);
    $query = "SELECT * FROM `personnel` WHERE `status` = '1' AND CONCAT(`rank`, `last`, `first`, `unit`, `batch`) LIKE ?";
    $res = select($query,["%$frm_data[name]%"],'s');
    $i=1;
    $data= "";
    while($row = mysqli_fetch_array($res)){
       

    $data.= "
    
    <tr class='align-middle'>
                <td>$i</td>
                <td>$row[rank]</td>
                <td>$row[last]  $row[first] $row[middle] $row[suffix]
                <td>$row[batch]</td>
                <td>$row[unit]</td>
                <td> <button type='button'onclick='personnel_course($row[id])' class='btn btn-info btn-sm shadow-none me-3' data-bs-toggle='modal' data-bs-target='#edit_course'>
                <i class='bi bi-eye'></i>
                </button></td>
     </tr>

    ";
    $i++;


    }
    echo $data;
}



if(isset($_POST['search_retired_personnel'])){
    $frm_data = filteration($_POST);
    $query = "SELECT * FROM `personnel` WHERE `status` = '0' AND CONCAT(`rank`, `last`, `first`, `birthday`, `unit`, `batch`) LIKE ?";
    $res = select($query,["%$frm_data[name]%"],'s');
    $i=1;
    $data= "";
    while($row = mysqli_fetch_array($res)){
       

    $data.= "
    
    <tr class='align-middle'>
                <td>$i</td>
                <td>$row[rank]</td>
                <td>$row[last]  $row[first] $row[middle] $row[suffix]
                <td>$row[gender]</td>
                <td>$row[street] <br> $row[address] <br> $row[province]</td>
                <td>$row[batch]</td>
                <td>$row[unit]</td>
                <td> <button type='button'onclick='personnel_course($row[id])' class='btn btn-info btn-sm shadow-none me-3' data-bs-toggle='modal' data-bs-target='#edit_course'>
                <i class='bi bi-eye'></i>
                </button></td>
     </tr>

    ";
    $i++;


    }
    echo $data;
}


if(isset($_POST['search_suspended_personnel'])){
    $frm_data = filteration($_POST);
    $query = "SELECT * FROM `personnel` WHERE `status` = '3' AND CONCAT(`rank`, `last`, `first`, `birthday`, `unit`, `batch`) LIKE ?";
    $res = select($query,["%$frm_data[name]%"],'s');
    $i=1;
    $data= "";
    while($row = mysqli_fetch_array($res)){
       

    $data.= "
    
    <tr class='align-middle'>
                <td>$i</td>
                <td>$row[rank]</td>
                <td>$row[last]  $row[first] $row[middle] $row[suffix]
                <td>$row[gender]</td>
                <td>$row[street] <br> $row[address] <br> $row[province]</td>
                <td>$row[batch]</td>
                <td>$row[unit]</td>
                <td> <button type='button'onclick='personnel_course($row[id])' class='btn btn-info btn-sm shadow-none me-3' data-bs-toggle='modal' data-bs-target='#edit_course'>
                <i class='bi bi-eye'></i>
                </button></td>
     </tr>

    ";
    $i++;


    }
    echo $data;
}

if(isset($_POST['search_dismissed_personnel'])){
    $frm_data = filteration($_POST);
    $query = "SELECT * FROM `personnel` WHERE `status` = '2' AND CONCAT(`rank`, `last`, `first`, `birthday`, `unit`, `batch`) LIKE ?";
    $res = select($query,["%$frm_data[name]%"],'s');
    $i=1;
    $data= "";
    while($row = mysqli_fetch_array($res)){
       

    $data.= "
    
    <tr class='align-middle'>
                <td>$i</td>
                <td>$row[rank]</td>
                <td>$row[last]  $row[first] $row[middle] $row[suffix]
                <td>$row[gender]</td>
                <td>$row[street] <br> $row[address] <br> $row[province]</td>
                <td>$row[batch]</td>
                <td>$row[unit]</td>
                <td> <button type='button'onclick='personnel_course($row[id])' class='btn btn-info btn-sm shadow-none me-3' data-bs-toggle='modal' data-bs-target='#edit_course'>
                <i class='bi bi-eye'></i>
                </button></td>
     </tr>

    ";
    $i++;


    }
    echo $data;
}






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
          $trainingstatus = "<span onclick='toggleStatus($row[id],0)' class='rounded-pill bg-light text-info mb-3 text-wrap lh-base'>On Going</span>";
      } else {
          $trainingstatus = "<span onclick='toggleStatus($row[id],1)' class='rounded-pill bg-light text-success mb-3 text-wrap lh-base'>Completed</span>";
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





?>