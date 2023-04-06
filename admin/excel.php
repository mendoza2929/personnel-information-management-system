<?php 




require("alert.php");
require("db_config.php");
// require("./vendor/phpoffice/phpexcel/Classes/PHPExcel.php");
adminLogin();

// Start by defining the headers to force the browser to download the file
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="personnel_list.xls"');

// Then start the HTML table and add the headers
echo "<table>
        <thead>
            <tr>
                <th>#</th>
                <th>Rank</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Unit</th>
                <th>Batch</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>";

// Retrieve the personnel data from the database and add each row to the table
$res = selectAll('personnel');
$i = 1;
while($row = mysqli_fetch_assoc($res)){
    if ($row['status'] == 1) {
        $status = "Active";
    } else if ($row['status'] == 2) {
        $status = "Dismissed";
    } else if ($row['status'] == 3) {
        $status = "Suspended";
    } else {
        $status = "Retired";
    }
    echo "
        <tr>
            <td>$i</td>
            <td>$row[rank]</td>
            <td>$row[last]  $row[first] $row[middle] $row[suffix]</td>
            <td>$row[gender]</td>
            <td>$row[street] <br> $row[address] <br> $row[city] <br> $row[province]</td>
            <td>$row[unit]</td>
            <td>$row[batch]</td>
            <td>$status</td>
        </tr>";
    $i++;
}

// Close the table and output the HTML code
echo "</tbody></table>";
?>