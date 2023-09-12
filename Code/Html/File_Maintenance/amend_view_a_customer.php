<!--
    Author: Adam Fitzpatrick
    ID: C00273365
    Date: 2023.03.07
-->

<?php
    include "../connection.php";

    // Posting values
    $CustomerID = $_POST['customer_id'];
    $FirstName = $_POST['customer_name'];
    $Surname = $_POST['customer_surname'];
    $Street = $_POST['customer_street'];
    $Town = $_POST['customer_town'];
    $County = $_POST['customer_county'];
    $Email = $_POST['customer_email'];
    $PhoneNo = $_POST['customer_phoneno'];

    $sql = "UPDATE Customer SET
    FirstName = '$FirstName',
    Surname = '$Surname',
    Street = '$Street',
    Town = '$Town',
    County = '$County',
    Email = '$Email',
    PhoneNo = '$PhoneNo'
    WHERE CustomerID = $CustomerID
    ";

    if (!mysqli_query($con, $sql))
    {
        echo "Error " . mysqli_error($con);
    }

    else
    {   
        // Script to create alert with confirmation of customer creation
        echo "<script>
        alert('Details for $FirstName $Surname have been updated.');
        window.location = 'amend_view_a_customer.html.php';
        </script>";
    }


    mysqli_close($con);
?>