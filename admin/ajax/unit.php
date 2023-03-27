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


        <button type="button" onclick="rem_unit($row[id])" class="btn btn-danger btn-sm shadow-none">
        <i class="bi bi-trash"></i>Delete
         </button>
        
        </td>
        </tr>

        data;
        $i++;
    }

  
}

if(isset($_POST['rem_unit'])){
    $frm_data = filteration($_POST);
    $values = [$frm_data['rem_unit']];

    $q = "DELETE FROM `unit` WHERE `id`=?";
    $res = delete($q, $values,'i');
    echo $res;
}





?>