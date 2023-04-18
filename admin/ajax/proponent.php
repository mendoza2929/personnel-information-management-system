<?php 


require('.././db_config.php');
require('.././alert.php');
adminLogin();


if(isset($_POST['add_proponent'])){
    $frm_data = filteration($_POST);

    $q = "INSERT INTO `proponent` (`name`) VALUES (?)";
    $values = [$frm_data['name']];
    $res = insert($q,$values,'s');
    echo $res;
}

if(isset($_POST['get_proponent'])){
    
    $res =selectAll('proponent');
    $i = 1;


    while($row = mysqli_fetch_assoc($res)){
        echo <<<data

        <tr class="align-middle">
        <td>$i</td>
        <td>$row[name]</td>
        <td>


        <button type="button" onclick='proponent_details($row[id])'  class="btn btn-success btn-sm shadow-none"  data-bs-toggle='modal' data-bs-target='#edit_proponent'>
        <i class="bi bi-pencil"></i>
         </button>
        
        </td>
        </tr>

        data;
        $i++;
    }

  
}

if(isset($_POST['edit_proponent'])){
    $frm_data = filteration($_POST);

    $res1 = select("SELECT * FROM `proponent` WHERE  `id`=?",[$frm_data['edit_proponent']],'i');

    $proponentdata = mysqli_fetch_assoc($res1);

    $data = ["proponentdata"=>$proponentdata];

    $json_data = json_encode($data);

    header('Content-Type: application/json');
    echo $json_data;
    exit;
}



if(isset($_POST['submit_edit_proponent'])){

    $frm_data = filteration($_POST);

    $flag = 0;

    // check if clearance_id is present
    if(isset($frm_data['proponent_id'])){

        $q1 = "UPDATE `proponent` SET `name`=?  WHERE `id`=?";
        $values = [$frm_data['name'],$frm_data['proponent_id']];

        if(update($q1,$values,'ss')){
            $flag=1;
        }
    } else {
        // display an error message or redirect the user
        echo "Error: proponent_id is not defined";
    }

    if($flag){
        echo 1;
    }else{
        echo 0;
    }
}



?>