<!--
    Author: Kelan Morgan
    ID:     C00262090
    Date:   2023.03.13
-->
<?php
include "../connection.php";

// update the table with the ammended data
$sql = "UPDATE Employee SET
        FirstName = '$_POST[firstName]',
        Surname = '$_POST[surname]',
        Street = '$_POST[street]',
        Town = '$_POST[town]',
        County = '$_POST[county]',
        PPSNumber = '$_POST[ppsNumber]',
        PhoneNo = '$_POST[phoneNumber]',
        Email = '$_POST[email]',
        JobTitle = '$_POST[jobTitle]',
        LoginName = '$_POST[loginName]'
        WHERE EmployeeID = '$_POST[employeeID]'";

if (!mysqli_query($con, $sql)){
    echo "Error" . mysqli_error($con);
    mysqli_close($con);
}
else{
    mysqli_close($con);
    // send the user to back to amend view screen
    header("Location: amend_view_employee.html.php");
}
?>