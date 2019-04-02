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
        background-color: #ff00ff;
          }
        </style>";
   $flag=1;
   $name = $_POST["username"];
   $query="SELECT content, author_id FROM Posts";

   if ($result = $mysqli->query($query))
   {
     echo "<table>";
     echo "<tr><th>The posts made by $name</th></tr>";
     while ($row = $result->fetch_assoc())
     {
       if($row["author_id"] == $name)
        {
          $flag=0;
          echo "<tr><td>$row[content]</td></tr>";
        }
     }
     if($flag)
     {
       echo "</table>";
       echo "None";
     }
     else
     {
       echo "</table>";
     }
     $result->free();
   }
   $mysqli->close();
?>
