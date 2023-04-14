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
    $res = selectAll("personnel_details WHERE course_id = '35'");
    $i = 1;
    $data = "";
    while($row = mysqli_fetch_assoc($res)) {
        if ($row['training_status'] == 1) {
            $status = "<button onclick='toggleStatus($row[id],0)' class='btn btn-warning btn-sm shadow-none'>On Going</button>";
        } else {
            header('Content-type:image/jpeg');
            $font = "../assets/Arial.ttf";
            $certificate_file_name = $row['personnel'].'_investigation.jpeg'; // generate a unique name for the certificate file
            $certificate_file_path = "../../img/investigation/".$certificate_file_name; // set the certificate file path
            $image = imagecreatefromjpeg("../../img/investigation.jpeg");
            $color = imagecolorallocate($image, 5 , 21 ,22);
            imagettftext($image, 50, 0 , 700,800,$color,$font,$row['personnel']);
            imagettftext($image, 30, 0 , 1700, 100,$color,$font,$row['batch']);
            imagettftext($image, 20, 0 , 1420, 1120,$color,$font,date('F d, Y')); // add date to certificate
            imagejpeg($image, $certificate_file_path); // save the certificate file
            imagedestroy($image);
            $status = "<a href='$certificate_file_path' download>
            <button onclick='toggleStatus($row[id],1)' class='btn btn-success btn-sm shadow-none disabled'>Completed </button>
            </a>";
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



if(isset($_POST['get_training1'])) {
    $res = selectAll("personnel_details WHERE course_id = '36'");
    $i = 1;
    $data = "";
    while($row = mysqli_fetch_assoc($res)) {
        if ($row['training_status'] == 1) {
            $status = "<button onclick='toggleStatus1($row[id],0)' class='btn btn-warning btn-sm shadow-none'>On Going</button>";
        } else {
            header('Content-type:image/jpeg');
            $font = "../assets/Arial.ttf";
            $certificate_file_name = $row['personnel'].'_psosec.jpeg'; // generate a unique name for the certificate file
            $certificate_file_path = "../../img/psosec/".$certificate_file_name; // set the certificate file path
            $image = imagecreatefromjpeg("../../img/psosec.jpeg");
            $color = imagecolorallocate($image, 5 , 21 ,22);
            imagettftext($image, 50, 0 , 700,800,$color,$font,$row['personnel']);
            imagettftext($image, 30, 0 , 1700, 100,$color,$font,$row['batch']);
            imagettftext($image, 20, 0 , 1420, 1120,$color,$font,date('F d, Y')); // add date to certificate
            imagejpeg($image, $certificate_file_path); // save the certificate file
            imagedestroy($image);
            $status = "<a href='$certificate_file_path' download>
            <button onclick='toggleStatus1($row[id],1)' class='btn btn-success btn-sm shadow-none disabled'>Completed </button>
            </a>";
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

if(isset($_POST['toggleStatus1'])){
    $frm_data = filteration($_POST);

    $q= "UPDATE `personnel_details` SET `training_status`=? WHERE `id`=?";
    $v = [$frm_data['value'],$frm_data['toggleStatus1']];

    if(update($q,$v,'ii')){
        echo 1;
    }else{
        echo 0; 
    }

}













if(isset($_POST['search_training'])){
    $frm_data = filteration($_POST);
    $query = "SELECT * FROM `personnel_details` WHERE `course_id` ='35'AND CONCAT(`batch`,`personnel`) LIKE ?";
    $res = select($query,["%$frm_data[name]%"],'s');
    $i=1;
    $data= "";
    while($row = mysqli_fetch_array($res)){
  
        if ($row['training_status'] == 1) {
            $status = "<button onclick='toggleStatus1($row[id],0)' class='btn btn-warning btn-sm shadow-none'>On Going</button>";
        } else {
            $status = "<button onclick='toggleStatus1($row[id],1)' class='btn btn-success btn-sm shadow-none disabled'>Complete</button>";
        }

        $data.= "
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



if(isset($_POST['search_training1'])){
    $frm_data = filteration($_POST);
    $query = "SELECT * FROM `personnel_details` WHERE `course_id` ='36'AND CONCAT(`batch`,`personnel`) LIKE ?";
    $res = select($query,["%$frm_data[name]%"],'s');
    $i=1;
    $data= "";
    while($row = mysqli_fetch_array($res)){
  
        if ($row['training_status'] == 1) {
            $status = "<button onclick='toggleStatus1($row[id],0)' class='btn btn-warning btn-sm shadow-none'>On Going</button>";
        } else {
            $status = "<button onclick='toggleStatus1($row[id],1)' class='btn btn-success btn-sm shadow-none disabled'>Complete</button>";
        }

        $data.= "
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




?>