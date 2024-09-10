<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fois";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

  // Prepare and execute the SQL query
$sql = "SELECT Dmndtime, Dmndid, Zonefrom, Dvsnfrom, Sttnfrom, Sttnfromname, Zoneto, Dvsnto, Stinto, SttntoName, Raketype, Cnsr, Cnsg, Unts 
        FROM TrainSchedule";
$result = mysqli_query($conn, $sql);

// Check if there are any results and display them
if (mysqli_num_rows($result) > 0) {
    echo "<table style='text-align: center; align-items: center;'>
            <tr>
                <th>Demand Time</th>
                <th>Demand ID</th>
                <th>Zone From</th>
                <th>Division From</th>
                <th>Station From</th>
                <th>Station From Name</th>
                <th>Zone To</th>
                <th>Division To</th>
                <th>Station To</th>
                <th>Station To Name</th>
                <th>Rake Type</th>
                <th>Consignor</th>
                <th>Consignee</th>
                <th>Units</th>
            </tr>";
    
    // Fetch each row of results and display in table
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . htmlspecialchars($row["Dmndtime"]) . "</td>
                <td>" . htmlspecialchars($row["Dmndid"]) . "</td>
                <td>" . htmlspecialchars($row["Zonefrom"]) . "</td>
                <td>" . htmlspecialchars($row["Dvsnfrom"]) . "</td>
                <td>" . htmlspecialchars($row["Sttnfrom"]) . "</td>
                <td>" . htmlspecialchars($row["Sttnfromname"]) . "</td>
                <td>" . htmlspecialchars($row["Zoneto"]) . "</td>
                <td>" . htmlspecialchars($row["Dvsnto"]) . "</td>
                <td>" . htmlspecialchars($row["Stinto"]) . "</td>
                <td>" . htmlspecialchars($row["SttntoName"]) . "</td>
                <td>" . htmlspecialchars($row["Raketype"]) . "</td>
                <td>" . htmlspecialchars($row["Cnsr"]) . "</td>
                <td>" . htmlspecialchars($row["Cnsg"]) . "</td>
                <td>" . htmlspecialchars($row["Unts"]) . "</td>
            </tr>";
    }
    echo "</table>"; // Close the table
} else {
    echo "0 results";
}

// Close connection
mysqli_close($conn);
?>