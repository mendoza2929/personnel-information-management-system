<?php 


require('.././db_config.php');
require('.././alert.php');
adminLogin();




// if(isset($_POST['user_analytics'])){  

//     $frm_data = filteration($_POST);
  
//     // $condition = "";
  
//     // if($frm_data['period']==1){
//     //   $condition = "WHERE datentime BETWEEN NOW() - INTERVAL 30 DAY AND NOW()";
//     // }
//     // else if($frm_data['period']==2){
//     //   $condition = "WHERE datentime BETWEEN NOW() - INTERVAL 90 DAY AND NOW()";
//     // }
//     // else if($frm_data['period']==3){
//     //   $condition = "WHERE datentime BETWEEN NOW() - INTERVAL 1 YEAR AND NOW()";
//     // }

      
//     $total_new_reg= mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(id) AS `count` FROM `personnel`"));
  
//     $result = ['total_new_personnel'=>$total_new_reg['count']];
  
//     $output = json_encode($result);
  
//     echo $output;
  
//   }


?>