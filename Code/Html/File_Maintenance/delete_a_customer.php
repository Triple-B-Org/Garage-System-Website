<!--
    Author: Qadeer Hussain
    ID: C00270632
    Date: 2023.03.16
-->
<?php
    include "../connection.php";

    // Explodes splits into an array the first item of the array is gotten which is the CustomerID then set to deleted = 1
    $customerID = explode(",", $_POST['select_customer'])[0];
    $sql = "UPDATE Customer SET Deleted = 1 WHERE CustomerID = $customerID";

    if (!mysqli_query($con,$sql)){
        echo "Error ".mysqli_error($con);
    }
    else{
        mysqli_close($con);
        header('Location: delete_a_customer.html.php');
    }

?>