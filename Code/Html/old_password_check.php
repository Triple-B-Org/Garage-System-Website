<!--
    Author: Kelan Morgan
    ID:     C00262090
    Date:   2023.03.13
-->
<?php
include "connection.php";
session_start();

$login_password = $_POST['old_password'];

// check if the old password is correct
$sql = "SELECT * FROM Employee WHERE LoginName = '{$_SESSION["username"]}' AND Password = '$login_password'";

if (!$result = mysqli_query($con, $sql))
{
    die('Error in the SQL Query: ' . mysqli_error($con));
}

$rowcount = mysqli_num_rows($result);
if ($rowcount >= 1)
{
    // if it is correct let the user change their password
    mysqli_close($con);
    $_SESSION['old_wrong'] = false;
    header('Location: change_password.html.php');
}
else
{
    // if the password is wrong allow the usser to enter the password again
    mysqli_close($con);
    $_SESSION['old_wrong'] = true;
    header('Location: old_password.html.php');
    exit();
}
?>