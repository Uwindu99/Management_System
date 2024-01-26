<?php

$Eid = $_POST["eid"];
$telephone = $_POST["tel"];
$name = $_POST["name"];
$email = $_POST["email"];
$designator = $_POST["des"]; 

$conn = mysqli_connect("localhost", "root", "", "project");
$sql = "INSERT INTO employee values('$Eid','$telephone','$name','$email','$designator')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
}
mysqli_close($conn);

?>
