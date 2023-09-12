<!--
    Author: Adam Fitzpatrick
    ID: C00273365
    Date: 2023.03.07
-->

<?php
    include "../connection.php";

    // Posting values
    $FirstName = $_POST['customer_name'];
    $Surname = $_POST['customer_surname'];
    $Street = $_POST['customer_street'];
    $Town = $_POST['customer_town'];
    $County = $_POST['customer_county'];
    $Email = $_POST['customer_email'];
    $PhoneNo = $_POST['customer_phoneno'];
    
    // Get the maximum CustomerID value from the Customer table
    $sql = "SELECT MAX(CustomerID) AS prevID FROM Customer";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $prevID = $row['prevID'];
    
    // Calculate the new CustomerID value
    $CustomerID = $prevID + 1;

    if (!mysqli_query($con, $sql))
    {
        echo "Error " . mysqli_error($con);
    }
    
    // Insert the posted values into the Customer table
    $sq2 = "INSERT INTO Customer (CustomerID, FirstName, Surname, Street, Town, County, Email, PhoneNo) VALUES
            ('$CustomerID', '$FirstName', '$Surname', '$Street', '$Town', '$County', '$Email', '$PhoneNo')";
    
    if (!mysqli_query($con, $sq2))
    {
        echo "Error " . mysqli_error($con);
    }

    else
    {   
        // Script to create alert with confirmation of customer creation
        echo "<script>
            alert('$FirstName $Surname has been added. Assigned ID: $CustomerID');
            window.location = 'add_a_new_customer.html.php';
            </script>";
    }

    
    mysqli_close($con);
?>