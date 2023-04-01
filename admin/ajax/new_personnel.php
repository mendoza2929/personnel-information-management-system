<?php 

require('.././db_config.php');
require('.././alert.php');
adminLogin();



if(isset($_POST['get_new_personnel'])){  
    $res = mysqli_query($con, "SELECT id, last, first, middle, suffix , gender,street,address,province,rank, unit, training_status FROM personnel WHERE status='1';");

    if($res === false){
        echo "Error: " . mysqli_error($con);
    } else {
        $i=1;
        $data = "";
        while($row = mysqli_fetch_assoc($res)){

            if($row['training_status']==1){
   
                $status = "<button  onclick='toggleStatus($row[id],0)'class='btn btn-warning btn-sm shadow-none'>On Going</button>";
        
        }else{
        
            $status = "<button onclick='toggleStatus($row[id],1)' class='btn btn-success btn-sm shadow-none'>Complete</button>";
        
        }
            $data.= "
            <tr class='align-middle'>
                <td>$i</td>
                <td>$row[rank]</td>
                <td>$row[last]  $row[first] $row[middle] $row[suffix]
                <td>$row[gender]</td>
                <td>$row[street] <br> $row[address] <br> $row[province]</td>
                <td>$row[unit]</td>
                <td>$status</td>
            </tr>
            ";
            $i++;
        }
        echo $data;
    }
}




if(isset($_POST['get_retired_personnel'])){  
    $res = mysqli_query($con, "SELECT id, last, first, middle, suffix , gender,street,address,province,rank, unit, training_status FROM personnel WHERE status='0';");

    if($res === false){
        echo "Error: " . mysqli_error($con);
    } else {
        $i=1;
        $data = "";
        while($row = mysqli_fetch_assoc($res)){

            if($row['training_status']==1){
   
                $status = "<button  onclick='toggleStatus($row[id],0)'class='btn btn-warning btn-sm shadow-none'>On Going</button>";
        
        }else{
        
            $status = "<button onclick='toggleStatus($row[id],1)' class='btn btn-success btn-sm shadow-none'>Complete</button>";
        
        }
            $data.= "
            <tr class='align-middle'>
                <td>$i</td>
                <td>$row[rank]</td>
                <td>$row[last]  $row[first] $row[middle] $row[suffix]
                <td>$row[gender]</td>
                <td>$row[street] <br> $row[address] <br> $row[province]</td>
                <td>$row[unit]</td>
                <td>$status</td>
            </tr>
            ";
            $i++;
        }
        echo $data;
    }
}


if(isset($_POST['get_suspended_personnel'])){  
    $res = mysqli_query($con, "SELECT id, last, first, middle, suffix , gender,street,address,province,rank, unit, training_status FROM personnel WHERE status='3';");

    if($res === false){
        echo "Error: " . mysqli_error($con);
    } else {
        $i=1;
        $data = "";
        while($row = mysqli_fetch_assoc($res)){

            if($row['training_status']==1){
   
                $status = "<button  onclick='toggleStatus($row[id],0)'class='btn btn-warning btn-sm shadow-none'>On Going</button>";
        
        }else{
        
            $status = "<button onclick='toggleStatus($row[id],1)' class='btn btn-success btn-sm shadow-none'>Complete</button>";
        
        }
            $data.= "
            <tr class='align-middle'>
                <td>$i</td>
                <td>$row[rank]</td>
                <td>$row[last]  $row[first] $row[middle] $row[suffix]
                <td>$row[gender]</td>
                <td>$row[street] <br> $row[address] <br> $row[province]</td>
                <td>$row[unit]</td>
                <td>$status</td>
            </tr>
            ";
            $i++;
        }
        echo $data;
    }
}

if(isset($_POST['get_dismissed_personnel'])){  
    $res = mysqli_query($con, "SELECT id, last, first, middle, suffix , gender,street,address,province,rank, unit, training_status FROM personnel WHERE status='2';");

    if($res === false){
        echo "Error: " . mysqli_error($con);
    } else {
        $i=1;
        $data = "";
        while($row = mysqli_fetch_assoc($res)){

            if($row['training_status']==1){
   
                $status = "<button  onclick='toggleStatus($row[id],0)'class='btn btn-warning btn-sm shadow-none'>On Going</button>";
        
        }else{
        
            $status = "<button onclick='toggleStatus($row[id],1)' class='btn btn-success btn-sm shadow-none'>Complete</button>";
        
        }
            $data.= "
            <tr class='align-middle'>
                <td>$i</td>
                <td>$row[rank]</td>
                <td>$row[last]  $row[first] $row[middle] $row[suffix]
                <td>$row[gender]</td>
                <td>$row[street] <br> $row[address] <br> $row[province]</td>
                <td>$row[unit]</td>
                <td>$status</td>
            </tr>
            ";
            $i++;
        }
        echo $data;
    }
}






if(isset($_POST['search_active_personnel'])){
    $frm_data = filteration($_POST);
    $query = "SELECT * FROM `personnel` WHERE CONCAT(`rank`, `last`,`first`,`birthday`,`unit`,`batch`) LIKE ?";
    $res = select($query,["%$frm_data[name]%"],'s');
    $i=1;
    $data= "";
    while($row = mysqli_fetch_array($res)){
       

    $data.= "
    
    <tr class='align-middle'>
                <td>$i</td>
                <td>$row[rank]</td>
                <td>$row[last]  $row[first] $row[middle] $row[suffix]
                <td>$row[gender]</td>
                <td>$row[street] <br> $row[address] <br> $row[province]</td>
                <td>$row[unit]</td>
     </tr>

    ";
    $i++;


    }
    echo $data;
}




?>