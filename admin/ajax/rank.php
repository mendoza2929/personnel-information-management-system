<?php 

require('.././db_config.php');
require('.././alert.php');
adminLogin();

if(isset($_POST['add_rank'])){
    $frm_data = filteration($_POST);

    $q = "INSERT INTO `rank` (`name`) VALUES (?)";
    $values = [$frm_data['rank']];
    $res = insert($q,$values,'s');
    echo $res;
}


if(isset($_POST['get_rank'])){
    
    $res =selectAll('rank');
    $i = 1;


    while($row = mysqli_fetch_assoc($res)){
        echo <<<data

        <tr class="align-middle">
        <td>$i</td>
        <td>$row[name]</td>

        <td>
        
        <button type="button" onclick='rank_details($row[id])'  class="btn btn-success btn-sm shadow-none"  data-bs-toggle='modal' data-bs-target='#edit_rank'>
        <i class="bi bi-pencil"></i>
         </button>
        
        </td>

       
        </tr>

        data;
        $i++;
    }

  
}



if(isset($_POST['edit_rank'])){
    $frm_data = filteration($_POST);

    $res1 = select("SELECT * FROM `rank` WHERE  `id`=?",[$frm_data['edit_rank']],'i');

    $rankdata = mysqli_fetch_assoc($res1);

    $data = ["rankdata"=>$rankdata];

    $json_data = json_encode($data);

    header('Content-Type: application/json');
    echo $json_data;
    exit;
}


if(isset($_POST['submit_edit_rank'])){

    $frm_data = filteration($_POST);

    $flag = 0;

    // check if clearance_id is present
    if(isset($frm_data['rank_id'])){

        $q1 = "UPDATE `rank` SET `name`=?   WHERE `id`=?";
        $values = [$frm_data['rank'],$frm_data['rank_id']];

        if(update($q1,$values,'ss')){
            $flag=1;
        }
    } else {
        // display an error message or redirect the user
        echo "Error: rank_id is not defined";
    }

    if($flag){
        echo 1;
    }else{
        echo 0;
    }
}











?>