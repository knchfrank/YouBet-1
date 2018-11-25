<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="phpcss/table.css">
    <style>
        table, th, td {
            border: 2px solid black;
            border-collapse: collapse;
        }
        table {
            width: 100%;
        }
        th {
            height: 50px;
        }
        
    </style>
</head>
<body>
<?php
require('getConnection.php');
$conn = getConnection();
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT Begindate, Handicaphome, Handicapaway, Teamhome, Oddshome,Oddsdraw,Oddsaway,Teamaway,Type
        FROM Matchinfo;";
$result = $conn->query($sql);
?> 

<?php
if ($result->num_rows > 0) {
    echo "  <table><tr>
            <th>Date<br>(GMT + 7:00)</th>
            <th>Handicap Home</th>
            <th>Handicap Away</th>
            <th>Team Home</th>
            <th>Odds Home</th>
            <th>Odds Draw</th>
            <th>Odds Away</th>
            <th>Team Away</th>
            <th>League</th>
        </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" .
            $row["Begindate"]. "</td><td>" .
            $row["Handicaphome"]. "</td><td>" .
            $row["Handicapaway"]. "</td><td>" .
            $row["Teamhome"]."<a href='https://www.google.com' target='_blank'>Click here to visit Google</a>; </td><td>" .
            $row["Oddshome"]. "</td><td>" .
            $row["Oddsdraw"]. "</td><td>" .
            $row["Oddsaway"]. "</td><td>" .
            $row["Teamaway"]. "</td><td>" .
            $row["Type"].
            "</td></td>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?> 
</body>
</html>