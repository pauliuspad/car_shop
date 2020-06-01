<?php
include "connection/connection_to_db.php";

include "sql_query/cars_query.php";

// Task: show data. Full query is in the car_query file.


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
        echo "<tr>";
            echo "<th>Car number</th>";
            echo "<th>Car year</th>";
            echo "<th>Car model</th>";
            echo "<th>Current segment name</th>";
            echo "<th>Current user using car </th>";
            echo "<th>Current status</th>";
            echo "<th>Last user used car</th>";
            echo "<th>Last segment name</th>";
        echo "</tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['car_number'] . "</td>";
        echo "<td>" . $row['car_year'] . "</td>";
        echo "<td>" . $row['car_model'] . "</td>";
        echo "<td>" . $row['current_segment_name'] . "</td>";
        echo "<td>" . $row['current_user_name'] . "</td>";
        echo "<td>" . $row['current_status'] . "</td>";
        echo "<td>" . $row['last_user_name'] . "</td>";
        echo "<td>" . $row['last_segment_name'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    // Close result set
    mysqli_free_result($result);
  } else {
    echo "No records matching your query were found.";
  }


include "connection/close_connection.php";
 
?>