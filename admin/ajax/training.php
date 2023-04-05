<?php 

require('.././db_config.php');
require('.././alert.php');
adminLogin();


if(isset($_POST['add_training'])){
    // $features = filteration(json_decode($_POST['features']));

    $frm_data = filteration($_POST);
    $flag = 0;

    $q1 = "INSERT INTO `training`(`batch`,`personnel_name`) 
    VALUES (?,?)";
    $values = [$frm_data['batch'],$frm_data['personnel_name']];

    
    if(insert($q1,$values,'ss')){
        $flag=1;
    }

    
    if($flag){
        echo 1;
    }else{
        echo 0;
    }


}


if(isset($_POST['get_training'])) {
    $res = selectAll("personnel_details WHERE course_id = '30'");
    $i = 1;
    $data = "";
    while($row = mysqli_fetch_assoc($res)) {
        // $image = imagecreatefromjpeg("../../img/certificate.jpg");
        // $color = imagecolorallocate($image, 19 , 21 ,22);
        // imagettftext($image, 30, 0 , 500, 470,$color,$font,$row['personnel_name']);
        // $certificate_file = "../../img/Certificate/try.jpg";
        // imagejpeg($image, $certificate_file);
        // imagedestroy($image);
        // // echo "Certificate Added Success";
    
        if ($row['training_status'] == 1) {
            $status = "<button onclick='toggleStatus($row[id],0)' class='btn btn-warning btn-sm shadow-none'>On Going</button>";
        } else {
            $status = "<button onclick='toggleStatus($row[id],1)' class='btn btn-success btn-sm shadow-none disabled'>Complete</button>";
        }
        
        $data .= "
        <tr class='align-middle'>
            <td>$i</td>
            <td>$row[batch]</td>
            <td>$row[personnel]</td>
            <td>$row[datentime]</td>
            <td>$status</td>
        </tr>
        ";
        $i++;
    }
    echo $data;
}













// if(isset($_POST['get_training'])){  


//     $res = selectAll('training');
//     $i=1;



//     $data = "";

//     while($row = mysqli_fetch_assoc($res)){

//         // $image = imagecreatefromjpeg("../../img/certificate.jpg");
//         // $color = imagecolorallocate($image, 19 , 21 ,22);
//         // $name = $_POST['personnel_name'];
//         // imagettftext($image, 30, 0 , 500, 470,$color,$font,$name);
//         // imagejpeg($image,"../../img/Certificate/try.jpg");
//         // imagedestroy($image);
//         // echo "Certificate Added Success";



//         if ($row['training_status'] == 1) {
//             $status = "<button onclick='toggleStatus($row[id],0)' class='btn btn-warning btn-sm shadow-none'>On Going</button>";
//         } else {
//             $status = "<button onclick='toggleStatus($row[id],1)' class='btn btn-success btn-sm shadow-none disabled'>Complete</button>";
//         }
        

 
   
       
//     $data.= "
//     <tr class='align-middle'>
//         <td>$i</td>
//         <td>$row[batch]</td>
//         <td>$row[personnel_name]</td>
//         <td>$row[date]</td>
//         <td> $status</td>

//     </tr>
// ";
// $i++;



// //  <button type='button' onclick='remove_room($row[id])' class='btn btn-danger btn-sm shadow-none'>

// }
// echo $data;
// }



// if(isset($_POST['get_training1'])){  
//     $res = mysqli_query($con, "SELECT id, last, first, middle, suffix , batch, rank, unit, training_status FROM personnel WHERE course='PSOAC';");

//     if($res === false){
//         echo "Error: " . mysqli_error($con);
//     } else {
//         $i=1;
//         $data = "";
//         while($row = mysqli_fetch_assoc($res)){

//             if($row['training_status']==1){
   
//                 $status = "<button  onclick='toggleStatus1($row[id],0)'class='btn btn-warning btn-sm shadow-none'>On Going</button>";
        
//         }else{
        
//             $status = "<button onclick='toggleStatus1($row[id],1)' class='btn btn-success btn-sm shadow-none'>Complete</button>";
        
//         }
//             $data.= "
//             <tr class='align-middle'>
//                 <td>$i</td>
//                 <td>$row[rank]</td>
//                 <td>$row[last]  $row[first] $row[middle] $row[suffix]
//                 <td>$row[unit]</td>
//                 <td>$row[batch]</td>
//                 <td>$status</td>
//             </tr>
//             ";
//             $i++;
//         }
//         echo $data;
//     }
// }




if(isset($_POST['toggleStatus'])){
    $frm_data = filteration($_POST);

    $q= "UPDATE `personnel_details` SET `training_status`=? WHERE `id`=?";
    $v = [$frm_data['value'],$frm_data['toggleStatus']];

    if(update($q,$v,'ii')){
        echo 1;
    }else{
        echo 0; 
    }

}

// if(isset($_POST['toggleStatus1'])){
//     $frm_data = filteration($_POST);

//     $q= "UPDATE `personnel` SET `training_status`=? WHERE `id`=?";
//     $v = [$frm_data['value'],$frm_data['toggleStatus1']];

//     if(update($q,$v,'ii')){
//         echo 1;
//     }else{
//         echo 0; 
//     }

// }


// if(isset($_POST['batch'])){
//     $batch = $_POST['batch'];
//     $res =  mysqli_query($con, "SELECT id, last, first, middle, suffix , batch, rank, unit, training_status FROM personnel WHERE batch = ?); // Replace with your own function to fetch the personnel data
//     if(mysqli_num_rows($res) > 0){
//         echo "<table>";
//         echo "<thead><tr><th>Name</th><th>Age</th><th>Email</th></tr></thead>";
//         echo "<tbody>";
//         while($row = mysqli_fetch_assoc($res)){
//             echo "<tr>";
//             echo "<td>".$row['name']."</td>";
//             echo "<td>".$row['age']."</td>";
//             echo "<td>".$row['email']."</td>";
//             echo "</tr>";
//         }
//         echo "</tbody></table>";
//     } else {
//         echo "No personnel data found for the selected batch";
//     }
// }














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