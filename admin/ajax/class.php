<?php 

require('.././db_config.php');
require('.././alert.php');
adminLogin();

if(isset($_POST['add_class'])){
    $frm_data = filteration($_POST);

    $q = "INSERT INTO `class` (`class`) VALUES (?)";
    $values = [$frm_data['name']];
    $res = insert($q,$values,'s');
    echo $res;
}


if(isset($_POST['get_class'])){
    
    $res =selectAll('class');
    $i = 1;


    while($row = mysqli_fetch_assoc($res)){
        echo <<<data

        <tr class="align-middle">
        <td>$i</td>
        <td>$row[class]</td>
        <td>


        <button type="button" onclick="rem_class($row[id])" class="btn btn-danger btn-sm shadow-none">
        <i class="bi bi-trash"></i>Delete
         </button>
        
        </td>
        </tr>

        data;
        $i++;
    }

  
}

if(isset($_POST['rem_class'])){
    $frm_data = filteration($_POST);
    $values = [$frm_data['rem_class']];

    $q = "DELETE FROM `class` WHERE `id`=?";
    $res = delete($q, $values,'i');
    echo $res;
}





?>