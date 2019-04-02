<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "a500l206", "Waix9eez", "a500l206");

if ($mysqli->connect_errno)
{
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

$counter=0;
$query = "SELECT user_id FROM Users";

if ($result = $mysqli->query($query))
{
  while ($row = $result->fetch_assoc())
  {
    $myarray[$counter]=$row["user_id"];
    $counter=$counter+1;
  }
  $result->free();
  $round = count($myarray);
  echo "<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

</style>";
  echo "<table>
        <tr><th>User's information</th></tr>
        <tr><th align='left'>All usernames</th></tr>";
        for($n = 0; $n < $round; $n++)
        {
          echo "<tr><td>$myarray[$n]</td></tr>";
        }
  echo "</table>";

}

$mysqli->close();
?>
