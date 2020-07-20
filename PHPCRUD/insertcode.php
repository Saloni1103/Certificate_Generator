<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'adminpanel');

if(isset($_POST['insertdata']))
{
    $fname = $_POST['fname'];
    $occupation = $_POST['occupation'];
    $duration = $_POST['duration'];
	$email_id = $_POST['email_id'];

    $query = "INSERT INTO student ('fname','occupation','duration', 'email_id') VALUES ('$fname','$occupation','$duration','$email_id')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: index.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>