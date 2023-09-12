<!--
    Author: Kelan Morgan
    ID:     C00262090
    Date:   2023.03.13
-->
<?php
include "connection.php";
session_start();

$password1 = $_POST['new_password'];
$password2 = $_POST['confirm_password'];

// check if the passwords match
if ($password1 != $password2){
    //set the match variable to false and move to the change password page
    $_SESSION['match'] = false;
    mysqli_close($con);
    header("Location: change_password.html.php");
}
else{
    //set the match variable to true
    $_SESSION['match'] = true;

    // update the password on the employee account
    $sql = "UPDATE Employee SET Password = '$password1' WHERE LoginName = '{$_SESSION["username"]}'";

    if (!mysqli_query($con, $sql)){
        echo "Error " . mysqli_error($con);
        mysqli_close($con);
    }
    else{
        //allow access to the main menu
        mysqli_close($con);
        header("Location: main_menu.php");
    }

}
?>