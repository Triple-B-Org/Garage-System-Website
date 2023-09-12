<!--
    Author: Kelan Morgan
    ID:     C00262090
    Date:   2023.03.13
-->
<?php
include "../connection.php";

// get values from form
$employeeID = $_POST['employeeID'];
$firstName = $_POST['firstName'];
$surname = $_POST['surname'];
$street = $_POST['street'];
$town = $_POST['town'];
$county = $_POST['county'];
$ppsNumber = $_POST['ppsNumber'];
$phoneNumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$jobTitle = $_POST['jobTitle'];
$loginName = $_POST['loginName'];
$password = $_POST['password'];

// create sql query to insert a new row to the table
$sql = "INSERT INTO Employee (employeeID, FirstName,Surname,Street,Town,County,PPSNumber,PhoneNo,Email,JobTitle,LoginName,Password) 
VALUES ('$employeeID', '$firstName', '$surname', '$street', '$town', '$county', '$ppsNumber', '$phoneNumber', '$email', '$jobTitle', '$loginName', '$password')";

// check for errors
if (!mysqli_query($con, $sql)){
    echo "Error " . mysqli_error($con);
    mysqli_close($con);
}
else{
    mysqli_close($con);
    header('Location: add_new_employee.html.php');
}
?>