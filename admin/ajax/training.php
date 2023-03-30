<?php 

require('.././db_config.php');
require('.././alert.php');
adminLogin();



if(isset($_POST['get_training'])){  
    $res = mysqli_query($con, "SELECT id, last, first, middle, suffix , batch, rank, unit, training_status FROM personnel WHERE course='PSOSEC';");

    if($res === false){
        echo "Error: " . mysqli_error($con);
    } else {
        $i=1;
        $data = "";
        while($row = mysqli_fetch_assoc($res)){

            if($row['training_status']==1){
   
                $status = "<button  onclick='toggleStatus($row[id],0)'class='btn btn-warning btn-sm shadow-none'>On Going</button>";
        
        }else{
        
            $status = "<button onclick='toggleStatus($row[id],1)' class='btn btn-success btn-sm shadow-none'>Complete</button>";
        
        }
            $data.= "
            <tr class='align-middle'>
                <td>$i</td>
                <td>$row[rank]</td>
                <td>$row[last]  $row[first] $row[middle] $row[suffix]
                <td>$row[unit]</td>
                <td>$row[batch]</td>
                <td>$status</td>
            </tr>
            ";
            $i++;
        }
        echo $data;
    }
}



if(isset($_POST['get_training1'])){  
    $res = mysqli_query($con, "SELECT id, last, first, middle, suffix , batch, rank, unit, training_status FROM personnel WHERE course='PSOAC';");

    if($res === false){
        echo "Error: " . mysqli_error($con);
    } else {
        $i=1;
        $data = "";
        while($row = mysqli_fetch_assoc($res)){

            if($row['training_status']==1){
   
                $status = "<button  onclick='toggleStatus1($row[id],0)'class='btn btn-warning btn-sm shadow-none'>On Going</button>";
        
        }else{
        
            $status = "<button onclick='toggleStatus1($row[id],1)' class='btn btn-success btn-sm shadow-none'>Complete</button>";
        
        }
            $data.= "
            <tr class='align-middle'>
                <td>$i</td>
                <td>$row[rank]</td>
                <td>$row[last]  $row[first] $row[middle] $row[suffix]
                <td>$row[unit]</td>
                <td>$row[batch]</td>
                <td>$status</td>
            </tr>
            ";
            $i++;
        }
        echo $data;
    }
}




if(isset($_POST['toggleStatus'])){
    $frm_data = filteration($_POST);

    $q= "UPDATE `personnel` SET `training_status`=? WHERE `id`=?";
    $v = [$frm_data['value'],$frm_data['toggleStatus']];

    if(update($q,$v,'ii')){
        echo 1;
    }else{
        echo 0; 
    }

}

if(isset($_POST['toggleStatus1'])){
    $frm_data = filteration($_POST);

    $q= "UPDATE `personnel` SET `training_status`=? WHERE `id`=?";
    $v = [$frm_data['value'],$frm_data['toggleStatus1']];

    if(update($q,$v,'ii')){
        echo 1;
    }else{
        echo 0; 
    }

}










// if(isset($_POST['search_training'])){
//     $frm_data = filteration($_POST);
//     $query = "SELECT * FROM `personnel` WHERE CONCAT(`rank`, `last`,`first`,`unit`,`batch`) LIKE ?";
//     $res = select($query,["%$frm_data[name]%"],'s');
//     $i=1;
//     $data= "";
//     while($row = mysqli_fetch_array($res)){
//         if($row['status']==1){
   
//             $status = "<button  onclick='toggleStatus($row[id],0)'class='btn btn-success btn-sm shadow-none'>Active</button>";
    
//     }else{
    
//         $status = "<button onclick='toggleStatus($row[id],1)' class='btn btn-danger btn-sm shadow-none'>Not active</button>";
    
//     }

//     $data.= "
    
//     <tr class='align-middle'>
//     <td>$i</td>
//     <td>$row[rank]</td>
//     <td>$row[last]  $row[first] $row[middle] $row[suffix]</td>
//     <td>$row[unit]</td>
//     <td>$row[batch]</td>
//     <td>$status</td>
//     </tr>

//     ";
//     $i++;


//     }
//     echo $data;
// }




?>