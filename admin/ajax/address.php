<?php 

require('.././db_config.php');
require('.././alert.php');
adminLogin();

if(isset($_POST['add_barangay'])){
    $frm_data = filteration($_POST);

    $q = "INSERT INTO `address` (`name`) VALUES (?)";
    $values = [$frm_data['name']];
    $res = insert($q,$values,'s');
    echo $res;
}


if(isset($_POST['get_barangay'])){
    
    $res =selectAll('address');
    $i = 1;


    while($row = mysqli_fetch_assoc($res)){
        echo <<<data

        <tr class="align-middle">
        <td>$i</td>
        <td>$row[name]</td>
        <td>


        <button type="button" onclick="rem_barangay($row[id])" class="btn btn-danger btn-sm shadow-none">
        <i class="bi bi-trash"></i>Delete
         </button>
        
        </td>
        </tr>

        data;
        $i++;
    }

  
}

if(isset($_POST['rem_barangay'])){
    $frm_data = filteration($_POST);
    $values = [$frm_data['rem_barangay']];

    $q = "DELETE FROM `address` WHERE `id`=?";
    $res = delete($q, $values,'i');
    echo $res;
}



// province data 


if(isset($_POST['add_province'])){
    $frm_data = filteration($_POST);

    $q = "INSERT INTO `province` (`name`) VALUES (?)";
    $values = [$frm_data['name']];
    $res = insert($q,$values,'s');
    echo $res;
}


if(isset($_POST['get_province'])){
    
    $res =selectAll('province');
    $i = 1;


    while($row = mysqli_fetch_assoc($res)){
        echo <<<data

        <tr class="align-middle">
        <td>$i</td>
        <td>$row[name]</td>
        <td>


        <button type="button" onclick="rem_barangay($row[id])" class="btn btn-danger btn-sm shadow-none">
        <i class="bi bi-trash"></i>Delete
         </button>
        
        </td>
        </tr>

        data;
        $i++;
    }

  
}






?>