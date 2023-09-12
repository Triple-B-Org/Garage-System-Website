<!--
    Author: Kelan Morgan
    ID:     C00262090
    Date:   2023.03.13
-->
<?php
include "../connection.php";

$id = explode(", ", $_POST['selectEmployee'])[0];
//set the deleted flag to 1 on the selected id
$sql = "UPDATE Employee SET Deleted = 1 WHERE EmployeeID = $id";

if (!mysqli_query($con, $sql)){
    echo "Error " . mysqli_error($con);
    mysqli_close($con);
}
else{
    mysqli_close($con);
    header('Location: delete_employee.html.php');
}
?>