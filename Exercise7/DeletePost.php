<?php
  $mysqli = new mysqli("mysql.eecs.ku.edu", "a500l206", "Waix9eez", "a500l206");

  if ($mysqli->connect_errno)
   {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
   }
   echo "<style>
         table {
         font-family: arial, sans-serif;
         border-collapse: collapse;
         width: 100%;
          }

        td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
                }

        tr:nth-child(odd) {
        background-color: #dddddd;
          }
        </style>";
   $posts = $_POST["post"];
   $query="SELECT content, author_id FROM Posts";
   for($i=0; $i<count($posts); $i++)
   {
     $myarray[$i]="DELETE FROM Posts WHERE post_id=$posts[$i]";
   }
   for($j=0; $j<count($posts); $j++)
   {
      $query1=$myarray[$j];
     if ($mysqli->query($query1))
       {
         }
      else
      {
          echo "Error deleting record: " . $mysqli->error;
      }
   }
   if ($result = $mysqli->query($query))
   {
     echo "<table>";
     echo "<tr><th colspan='2'>Here is the new table after changes</th></tr>";
     echo "<tr><th>Posts</th><th>Username</th></tr>";
     while ($row = $result->fetch_assoc())
     {
          echo "<tr><td>$row[content]</td><td>$row[author_id]</td></tr>";
     }
     $result->free();
     echo "</table><br>";
     echo "Make sure to refresh your page to see the update!";
   }
   $mysqli->close();
?>
