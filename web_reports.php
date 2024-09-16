<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="web_reports.css">
    <title>Web Reports</title>
</head>
<body>
  <div class="main-container">
    <nav class="navbar">
      <div class="logo">
        <a href="index.html"><h1>FOIS</h1></a>
      </div>
      <ul class="nav-links">
        <li><h3>Welcome, <u><i><?php echo $_SESSION['username']; ?></u> !</i></h3></li>
        <a href="/FOIS_PROJECT/index.html">Log Out</a>
      </ul>
    </nav>
    <section class="main-content">
      <h2>List of Reports</h2>
      <table style="align-items: center;">
        <tr>
          <th>S No.</th>
          <th>Report</th>
          <th style="padding-left: 100px;">Report information</th>
          <th style="padding-left: 400px;">Date and Time</th>
        </tr>
        <tr>
          <td>1</td>
          <td><a href="/FOIS_PROJECT/report1.php">Report 1</a></td>
          <td style="padding-left: 100px;">RB125: AUTO Rakes Cancelled Demands</td>
          <td style="padding-left: 400px;">01-08-2024 09:30</td>
        </tr>
        <tr>
          <td>2</td>
          <td><a href="#">Report 2</a></td>
          <td style="padding-left: 100px;">RB647: Cumulative Commodity Wise Loading Details For Automatic Freight Rebate</td>
          <td style="padding-left: 400px;">01-08-2024 09:30</td>
        </tr>
        <tr>
          <td>3</td>
          <td><a href="#">Report 3</a></td>
          <td style="padding-left: 100px;">RB643: Light engine run In COA</td>
          <td style="padding-left: 400px;">01-08-2024 09:30</td>
        </tr>
        <tr>
          <td>4</td>
          <td><a href="#">Report 4</a></td>
          <td style="padding-left: 100px;">RB645: Shop In and Out (Dailly and Progressive)</td>
          <td style="padding-left: 400px;">01-08-2024 09:30</td>
        </tr>
        <tr>
          <td>5</td>
          <td><a href="#">Report 5</a></td>
          <td style="padding-left: 100px;">RB642: Loco Status Change Position</td>
          <td style="padding-left: 400px;">01-08-2024 09:30</td>
        </tr>
        <tr>
          <td>6</td>
          <td><a href="#">Report 6</a></td>
          <td style="padding-left: 100px;">RB641: Loco Cut In Details</td>
          <td style="padding-left: 400px;">01-08-2024 09:30</td>
        </tr>
        <tr>
          <td>7</td>
          <td><a href="#">Report 7</a></td>
          <td style="padding-left: 100px;">RB628: JUMB Loading with Exam Details</td>
          <td style="padding-left: 400px;">01-08-2024 09:30</td>
        </tr>
        <tr>
          <td>8</td>
          <td><a href="#">Report 8</a></td>
          <td style="padding-left: 100px;">RB578: Station Wise Details of Vehicle Guidance Printed</td>
          <td style="padding-left: 400px;">01-08-2024 09:30</td>
        </tr>
        <tr>
          <td>9</td>
          <td><a href="#">Report 9</a></td>
          <td style="padding-left: 100px;">RB577: Onion, Sugar; Fruits and Vegetables Loading</td>
          <td style="padding-left: 400px;">01-08-2024 09:30</td>
        </tr>
        <tr>
          <td>10</td>
          <td><a href="#">Report 10</a></td>
          <td style="padding-left: 100px;">RB446: POWER HOUSE PERFORMANCE (IN RAKES)</td>
          <td style="padding-left: 400px;">01-08-2024 09:30</td>
        </tr>
        <tr>
          <td>11</td>
          <td><a href="#">Report 11</a></td>
          <td style="padding-left: 100px;">RB348: Zone Wise Loco Utilization</td>
          <td style="padding-left: 400px;">01-08-2024 09:30</td>
        </tr>
        <tr>
          <td>12</td>
          <td><a href="#">Report 12</a></td>
          <td style="padding-left: 100px;">RB347: Terminal Wise Loading of Cement and Clinker in Rakes</td>
          <td style="padding-left: 400px;">01-08-2024 09:30</td>
        </tr>
        <tr>
          <td>13</td>
          <td><a href="#">Report 13</a></td>
          <td style="padding-left: 100px;">RB599B: Pig Iron and Finished Steel RR Wise Details with Last Year</td>
          <td style="padding-left: 400px;">01-08-2024 09:30</td>
        </tr>
        <tr>
          <td>14</td>
          <td><a href="#">Report 14</a></td>
          <td style="padding-left: 100px;">RB599C: RMSP- RR Wise Details with Last Year</td>
          <td style="padding-left: 400px;">01-08-2024 09:30</td>
        </tr>
        <tr>
          <td>15</td>
          <td><a href="#">Report 15</a></td>
          <td style="padding-left: 100px;">RBS09: Date wise Commodity wise loading and Earning</td>
          <td style="padding-left: 400px;">01-08-2024 09:30</td>
        </tr>
        <tr>
          <td>16</td>
          <td><a href="#">Report 16</a></td>
          <td style="padding-left: 100px;">RB622: Zone Wise Indent and Loading more than 650KMs</td>
          <td style="padding-left: 400px;">01-08-2024 09:30</td>
        </tr>
      </table>
    </section>
  </div>
  <footer class="footer">
    <h3>Made under CRIS</h3>
  </footer>
</body>
</html>