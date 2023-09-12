<!--
    Author: Kelan Morgan
    ID:     C00262090
    Date:   2023.03.13
-->
<?php
    session_start();
    include "connection.php";

    // initalize or increment the attempts variable
    if (!isset($_SESSION['attempts'])){
        $_SESSION['attempts'] = 1;
    }
    else{
        $_SESSION['attempts']++;
    }

    $login_user = $_POST['username'];
    $login_password = $_POST['password'];

    // Check if the user name and password are for the same employee
    $sql = "SELECT * FROM Employee WHERE LoginName = '$login_user' AND Password = '$login_password'";

    if (!$result = mysqli_query($con, $sql))
    {
        die('Error in the SQL Query: ' . mysqli_error($con));
    }

    $rowcount = mysqli_num_rows($result);
    if ($rowcount >= 1)
    {
        // if the username and password are correct reset the attempts and give access to the main menu
        $_SESSION['username'] = $login_user;
        $_SESSION['attempts'] = 0;
        header('Location: main_menu.php');
    }
    else
    {
        // if the username and password are incorrect send the user to the error page
        mysqli_close($con);
        header('Location: login_page_error.html.php');
        exit();
    }
?>