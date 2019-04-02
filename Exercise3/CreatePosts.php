<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "a500l206", "Waix9eez", "a500l206");

if ($mysqli->connect_errno) {
printf("Connect failed: %s\n", $mysqli->connect_error);
exit();
}

$Userinfo = $_POST['username'];
$Textfield = $_POST['comment'];
$flag=false;
$flag1=true;
$query = "SELECT user_id FROM Users";
$query1= "INSERT INTO Posts(content, author_id) VALUES ('$Textfield', '$Userinfo')";
$query2= "SELECT content FROM Posts";
if($Textfield == "")
{
   echo "<p>Textfield is empty, store fails!</p>";
 }
else
{
 if ($result = $mysqli->query($query))
 {
   while ($row = $result->fetch_assoc())
     {
           if($row["user_id"]==$Userinfo)
           {
             $flag=1;
           }
     }
     $result->free();
   }
     if($result2 = $mysqli->query($query2))
     {
       while ($row1 = $result2->fetch_assoc())
         {
              if($row1["content"]=="$Textfield")
               {
                 $flag1=0;
               }
          }
          $result2->free();
     }
  if($flag && $flag1)
{
  if($result1 = $mysqli->query($query1))
    {
      echo "<p>User's post is succesfully stored</p>";
      $result1->free();
    }
    else
    {
       echo "<p>User's post fail to store</p>";
       $result1->free();
    }
  }
  else
  {
    if($flag == 0)
    {
     echo "<p>User does not exist in the database, content failed to be stored!</p>";
    }
    else
    {
       echo "<p>Content already exists in the database, try something else!</p>";
    }
  }
}
$mysqli->close();
?>
