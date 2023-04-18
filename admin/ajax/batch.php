<?php 

require('.././db_config.php');
require('.././alert.php');
adminLogin();

if(isset($_POST['add_batch'])){
    $frm_data = filteration($_POST);

    $q = "INSERT INTO `batch` (`name`) VALUES (?)";
    $values = [$frm_data['name']];
    $res = insert($q,$values,'s');
    echo $res;
}


if(isset($_POST['get_batch'])){
    
    $res =selectAll('batch');
    $i = 1;


    while($row = mysqli_fetch_assoc($res)){
        echo <<<data

        <tr class="align-middle">
        <td>$i</td>
        <td>$row[name]</td>
        <td>


        <button type="button" onclick='batch_details($row[id])'  class="btn btn-success btn-sm shadow-none"  data-bs-toggle='modal' data-bs-target='#edit_batch'>
        <i class="bi bi-pencil"></i>
         </button>
        
        </td>
        </tr>

        data;
        $i++;
    }

  
}


if(isset($_POST['edit_batch'])){
    $frm_data = filteration($_POST);

    $res1 = select("SELECT * FROM `batch` WHERE  `id`=?",[$frm_data['edit_batch']],'i');

    $batchdata = mysqli_fetch_assoc($res1);

    $data = ["batchdata"=>$batchdata];

    $json_data = json_encode($data);

    header('Content-Type: application/json');
    echo $json_data;
    exit;
}



if(isset($_POST['submit_edit_batch'])){

    $frm_data = filteration($_POST);

    $flag = 0;

    // check if clearance_id is present
    if(isset($frm_data['batch_id'])){

        $q1 = "UPDATE `batch` SET `name`=?  WHERE `id`=?";
        $values = [$frm_data['name'],$frm_data['batch_id']];

        if(update($q1,$values,'ss')){
            $flag=1;
        }
    } else {
        // display an error message or redirect the user
        echo "Error: batch_id is not defined";
    }

    if($flag){
        echo 1;
    }else{
        echo 0;
    }
}





?>