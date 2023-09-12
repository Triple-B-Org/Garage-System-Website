<!--
    Author: Kelan Morgan
    ID:     C00262090
    Date:   2023.03.13
-->
<?php
include "../connection.php";

//selects all fields of the employee table for a drop down menu
$sql = "SELECT EmployeeID, FirstName, Surname, Street, Town, County, PPSNumber, PhoneNo, Email, JobTitle, LoginName, Password FROM Employee WHERE Deleted = 0";

if (!$result = mysqli_query($con, $sql)){
    die('Error in querying the database' . mysqli_error($con));
}

echo "<br><select name = 'selectEmployee' id = 'selectEmployee' onclick = 'populate()'>";

//create the options with a string seperated by ", "
while ($row = mysqli_fetch_array($result)){
    $id = $row['EmployeeID'];
    $firstName = $row['FirstName'];
    $surname = $row['Surname'];
    $street = $row['Street'];
    $town = $row['Town'];
    $county = $row['County'];
    $ppsNumber = $row['PPSNumber'];
    $phoneNo = $row['PhoneNo'];
    $email = $row['Email'];
    $jobTitle = $row['JobTitle'];
    $loginName = $row['LoginName'];
    $password = $row['Password'];
    $Text = "$id, $firstName, $surname, $street, $town, $county, $ppsNumber, $phoneNo, $email, $jobTitle, $loginName, $password";
    echo "<option value='$Text'>$id - $firstName $surname</option>";
}

echo "</select>";
mysqli_close($con);
?>