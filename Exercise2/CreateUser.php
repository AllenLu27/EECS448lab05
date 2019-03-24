<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "a500l206", "Waix9eez", "a500l206");

if ($mysqli->connect_errno) {
printf("Connect failed: %s\n", $mysqli->connect_error);
exit();
}

$Userinfo = $_POST['username'];
$Textfield = $_POST['textfield'];
$query = "INSERT INTO Users(user_id) VALUES('$Userinfo')";
$query1= "INSERT INTO Posts(content, author_id) VALUES ('$Textfield', '$Userinfo')";
if ($result = $mysqli->query($query))
{
  if($result1 = $mysqli->query($query1))
    {
      echo "<p>User's information is succesfully stored</p>";
      $result1->free();
    }
    else
    {
       echo "<p>User's information fail to store</p>";
       $result1->free();
    }

$result->free();
}
 else
 {
    echo "<p>User's information fail to store</p>";
 }

$mysqli->close();
?>
