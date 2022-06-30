<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_flight";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: ");
}
echo "successfully";

$sql="INSERT INTO tb_f(id,name,price,seat)
VALUES('$_POST[ID]','$_POST[name]','$_POST[price]','$_POST[no]')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>