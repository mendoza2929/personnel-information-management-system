<?php 




require("alert.php");
require("db_config.php");
// require("./vendor/phpoffice/phpexcel/Classes/PHPExcel.php");
adminLogin();

// Start by defining the headers to force the browser to download the file
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="Public Safety Officer Senior Executive_list.xls"');

// Then start the HTML table and add the headers
echo "<table>
        <thead>
            <tr>
                <th>#</th>
                <th>batch</th>
                <th>Name</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>";

// Retrieve the personnel data from the database and add each row to the table

$res = selectAll("personnel_details WHERE course_id = '36'");
$i = 1;
while($row = mysqli_fetch_assoc($res)){
    $courseId = $row['course_id'];      
        // Query to retrieve the course value based on course_id
        $courseQuery = "SELECT name FROM course  WHERE id = $courseId";
        $courseResult = mysqli_query($con, $courseQuery);
        $courseRow = mysqli_fetch_assoc($courseResult);
        $row['name'] = $courseRow['name'];

    if ($row['training_status'] == 1) {
        $status = "On Going";

     
    } else {
        $status = "Completed";
    }
    echo "
        <tr>
            <td>$i</td>
            <td>$row[batch]</td>
            <td>$row[personnel]</td>
            <td>$row[datentime]</td>
            <td>$status</td>
        </tr>";
    $i++;
}

// Close the table and output the HTML code
echo "</tbody></table>";
?>