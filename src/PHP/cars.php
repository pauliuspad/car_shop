<?php
include "connection/connection_to_db.php";
include "sql_query/cars_query.php";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered '>";
        echo "<tr class='thead-dark'>";
            echo "<th>Car plate number</th>";
            echo "<th>Manufacturing year</th>";
            echo "<th>Car model</th>";
            echo "<th>Current segment</th>";
            echo "<th>Current user</th>";
            echo "<th>Current status</th>";
            echo "<th>Last user</th>";
            echo "<th>Last segment</th>";
        echo "</tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['car_number'] . "</td>";
        echo "<td>" . $row['car_year'] . "</td>";
        echo "<td>" . $row['car_model'] . "</td>";
        echo "<td class='bg-light'>" . $row['current_segment_name'] . "</td>";
        echo "<td class='bg-light'>" . $row['current_user_name'] . "</td>";
        echo "<td>" . $row['current_status'] . "</td>";
        echo "<td class='table-active'>" . $row['last_user_name'] . "</td>";
        echo '<td class="table-active">' . $row['last_segment_name'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    // Close result set
    mysqli_free_result($result);
  } else {
    echo "<h3>There are no cars found in database.</h3>";
  }


include "connection/close_connection.php";
 
?>