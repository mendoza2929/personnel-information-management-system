<?php 

require('.././db_config.php');
require('.././alert.php');
adminLogin();

if(isset($_POST['add_unit'])){
    $frm_data = filteration($_POST);

    $q = "INSERT INTO `unit` (`name`,`description`) VALUES (?,?)";
    $values = [$frm_data['name'],$frm_data['desc']];
    $res = insert($q,$values,'ss');
    echo $res;
}


if(isset($_POST['get_unit'])){
    
    $res =selectAll('unit');
    $i = 1;


    while($row = mysqli_fetch_assoc($res)){
        echo <<<data

        <tr class="align-middle">
        <td>$i</td>
        <td>$row[name]</td>
        <td>$row[description]</td>
        <td>


        <button type="button" onclick='unit_details($row[id])'  class="btn btn-success btn-sm shadow-none"  data-bs-toggle='modal' data-bs-target='#edit_unit'>
        <i class="bi bi-pencil"></i>
         </button>
        
        </td>
        </tr>

        data;
        $i++;
    }

  
}


if(isset($_POST['edit_unit'])){
    $frm_data = filteration($_POST);

    $res1 = select("SELECT * FROM `unit` WHERE  `id`=?",[$frm_data['edit_unit']],'i');

    $unitdata = mysqli_fetch_assoc($res1);

    $data = ["unitdata"=>$unitdata];

    $json_data = json_encode($data);

    header('Content-Type: application/json');
    echo $json_data;
    exit;
}


if(isset($_POST['submit_edit_unit'])){

    $frm_data = filteration($_POST);

    $flag = 0;

    // check if clearance_id is present
    if(isset($frm_data['unit_id'])){

        $q1 = "UPDATE `unit` SET `name`=?, `description`=?   WHERE `id`=?";
        $values = [$frm_data['unit'],$frm_data['desc'],$frm_data['unit_id']];

        if(update($q1,$values,'sss')){
            $flag=1;
        }
    } else {
        // display an error message or redirect the user
        echo "Error: unit_id is not defined";
    }

    if($flag){
        echo 1;
    }else{
        echo 0;
    }
}





?>