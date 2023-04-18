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


        <button type="button" onclick='address_details($row[id])'  class="btn btn-success btn-sm shadow-none"  data-bs-toggle='modal' data-bs-target='#edit_address'>
        <i class="bi bi-pencil"></i>
         </button>
        
        </td>
        </tr>

        data;
        $i++;
    }

  
}

if(isset($_POST['edit_address'])){
    $frm_data = filteration($_POST);

    $res1 = select("SELECT * FROM `address` WHERE  `id`=?",[$frm_data['edit_address']],'i');

    $addressdata = mysqli_fetch_assoc($res1);

    $data = ["addressdata"=>$addressdata];

    $json_data = json_encode($data);

    header('Content-Type: application/json');
    echo $json_data;
    exit;
}



if(isset($_POST['submit_edit_address'])){

    $frm_data = filteration($_POST);

    $flag = 0;

    // check if clearance_id is present
    if(isset($frm_data['address_id'])){

        $q1 = "UPDATE `address` SET `name`=?  WHERE `id`=?";
        $values = [$frm_data['name'],$frm_data['address_id']];

        if(update($q1,$values,'ss')){
            $flag=1;
        }
    } else {
        // display an error message or redirect the user
        echo "Error: address_id is not defined";
    }

    if($flag){
        echo 1;
    }else{
        echo 0;
    }
}






if(isset($_POST['add_city'])){
    $frm_data = filteration($_POST);

    $q = "INSERT INTO `city` (`city`) VALUES (?)";
    $values = [$frm_data['city']];
    $res = insert($q,$values,'s');
    echo $res;
}

if(isset($_POST['get_city'])){
    
    $res =selectAll('city');
    $i = 1;


    while($row = mysqli_fetch_assoc($res)){
        echo <<<data

        <tr class="align-middle">
        <td>$i</td>
        <td>$row[city]</td>
        <td>


        <button type="button" onclick='city_details($row[id])'  class="btn btn-success btn-sm shadow-none"  data-bs-toggle='modal' data-bs-target='#edit_city'>
        <i class="bi bi-pencil"></i>
         </button>
        
        </td>
        </tr>

        data;
        $i++;
    }


  
}


if(isset($_POST['edit_city'])){
    $frm_data = filteration($_POST);

    $res1 = select("SELECT * FROM `city` WHERE  `id`=?",[$frm_data['edit_city']],'i');

    $citydata = mysqli_fetch_assoc($res1);

    $data = ["citydata"=>$citydata];

    $json_data = json_encode($data);

    header('Content-Type: application/json');
    echo $json_data;
    exit;
}


if(isset($_POST['submit_edit_city'])){

    $frm_data = filteration($_POST);

    $flag = 0;

    // check if clearance_id is present
    if(isset($frm_data['city_id'])){

        $q1 = "UPDATE `city` SET `city`=?  WHERE `id`=?";
        $values = [$frm_data['city'],$frm_data['city_id']];

        if(update($q1,$values,'ss')){
            $flag=1;
        }
    } else {
        // display an error message or redirect the user
        echo "Error: city_id is not defined";
    }

    if($flag){
        echo 1;
    }else{
        echo 0;
    }
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


      
        <button type="button" onclick='province_details($row[id])'  class="btn btn-success btn-sm shadow-none"  data-bs-toggle='modal' data-bs-target='#edit_province'>
        <i class="bi bi-pencil"></i>
         </button>
        
        </td>
        </tr>

        data;
        $i++;
    }

  
}

if(isset($_POST['edit_province'])){
    $frm_data = filteration($_POST);

    $res1 = select("SELECT * FROM `province` WHERE  `id`=?",[$frm_data['edit_province']],'i');

    $provincedata = mysqli_fetch_assoc($res1);

    $data = ["provincedata"=>$provincedata];

    $json_data = json_encode($data);

    header('Content-Type: application/json');
    echo $json_data;
    exit;
}


if(isset($_POST['submit_edit_province'])){

    $frm_data = filteration($_POST);

    $flag = 0;

    // check if clearance_id is present
    if(isset($frm_data['province_id'])){

        $q1 = "UPDATE `province` SET `name`=?  WHERE `id`=?";
        $values = [$frm_data['name'],$frm_data['province_id']];

        if(update($q1,$values,'ss')){
            $flag=1;
        }
    } else {
        // display an error message or redirect the user
        echo "Error: province_id is not defined";
    }

    if($flag){
        echo 1;
    }else{
        echo 0;
    }
}








?>