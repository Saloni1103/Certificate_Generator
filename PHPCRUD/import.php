<?php

//import.php

if(isset($_POST["fname"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=adminpanel", "root", "");
 $fname = $_POST["fname"];
 $occupation = $_POST["occupation"];
 $duration = $_POST["duration"];
 $email_id = $_POST["email_id"];
 for($count = 0; $count < count($fname); $count++)
 {
  $query .= "
  INSERT INTO student(fname, occupation, duration, email_id) 
  VALUES ('".$fname[$count]."', '".$occupation[$count]."', '".$duration[$count]."', '".$email_id[$count]."');
  
  ";
 }
 $statement = $connect->prepare($query);
 $statement->execute();
}

?>
