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
    echo " <h1 style='text-align: center;'>Report 1: AUTO Rakes Cancelled Demands </h1>
    <table style='text-align: center; align-items: center; border: 1px solid black'>
            <tr style='border: 1px solid black'>
                <th style='border: 1px solid black'>Demand Time</th>
                <th style='border: 1px solid black'>Demand ID</th>
                <th style='border: 1px solid black'>Zone From</th>
                <th style='border: 1px solid black'>Division From</th>
                <th style='border: 1px solid black'>Station From</th>
                <th style='border: 1px solid black'>Station From Name</th>
                <th style='border: 1px solid black'>Zone To</th>
                <th style='border: 1px solid black'>Division To</th>
                <th style='border: 1px solid black'>Station To</th>
                <th style='border: 1px solid black'>Station To Name</th>
                <th style='border: 1px solid black'>Rake Type</th>
                <th style='border: 1px solid black'>Consignor</th>
                <th style='border: 1px solid black'>Consignee</th>
                <th style='border: 1px solid black'>Units</th>
            </tr>";
    
    // Fetch each row of results and display in table
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr style='border: 1px solid black'>
                <td style='border: 1px solid black'>" . htmlspecialchars($row["Dmndtime"]) . "</td>
                <td style='border: 1px solid black'>" . htmlspecialchars($row["Dmndid"]) . "</td>
                <td style='border: 1px solid black'>" . htmlspecialchars($row["Zonefrom"]) . "</td>
                <td style='border: 1px solid black'>" . htmlspecialchars($row["Dvsnfrom"]) . "</td>
                <td style='border: 1px solid black'>" . htmlspecialchars($row["Sttnfrom"]) . "</td>
                <td style='border: 1px solid black'>" . htmlspecialchars($row["Sttnfromname"]) . "</td>
                <td style='border: 1px solid black'>" . htmlspecialchars($row["Zoneto"]) . "</td>
                <td style='border: 1px solid black'>" . htmlspecialchars($row["Dvsnto"]) . "</td>
                <td style='border: 1px solid black'>" . htmlspecialchars($row["Stinto"]) . "</td>
                <td style='border: 1px solid black'>" . htmlspecialchars($row["SttntoName"]) . "</td>
                <td style='border: 1px solid black'>" . htmlspecialchars($row["Raketype"]) . "</td>
                <td style='border: 1px solid black'>" . htmlspecialchars($row["Cnsr"]) . "</td>
                <td style='border: 1px solid black'>" . htmlspecialchars($row["Cnsg"]) . "</td>
                <td style='border: 1px solid black'>" . htmlspecialchars($row["Unts"]) . "</td>
            </tr>";
    }
    echo "</table>"; // Close the table
} else {
    echo "0 results";
}

// Close connection
mysqli_close($conn);
?>