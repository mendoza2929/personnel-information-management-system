<?php 

require('.././db_config.php');
require('.././alert.php');
adminLogin();

if(isset($_POST['add_rank'])){
    $frm_data = filteration($_POST);

    $q = "INSERT INTO `rank` (`name`) VALUES (?)";
    $values = [$frm_data['name']];
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


        <button type="button" onclick="rem_rank($row[id])" class="btn btn-danger btn-sm shadow-none">
        <i class="bi bi-trash"></i>Delete
         </button>
        
        </td>
        </tr>

        data;
        $i++;
    }

  
}

if(isset($_POST['rem_rank'])){
    $frm_data = filteration($_POST);
    $values = [$frm_data['rem_rank']];

    $q = "DELETE FROM `rank` WHERE `id`=?";
    $res = delete($q, $values,'i');
    echo $res;
}





?>