<?php

$Tid = $_POST["tid"];
$name = $_POST["name"];
$start_date = $_POST["st"];
$end_date = $_POST["et"];
$nature = $_POST["na"]; 

$conn = mysqli_connect("localhost", "root", "", "project");
$sql = "INSERT INTO task values('$Tid','$name','$start_date','$end_date','$nature')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
}
mysqli_close($conn);

?>
