<!--
    Author: Qadeer Hussain
    ID: C00270632
    Date: 2023.03.18
-->
<?php
    include "../connection.php";//database connections

    // Select the customer ID, Name and Date and Time from both tables and Inner Join the Bookings table Customer ID and Customer table Customer ID And only select the customer which is from todays date
    $sql = "SELECT Bookings.CustomerID, Customer.FirstName, Customer.Surname, Bookings.DateAndTime 
    FROM Bookings, Customer 
    WHERE Bookings.CustomerID = Customer.CustomerID 
    AND DATE(Bookings.DateAndTime) = CURDATE()"; 

    if (!$result=mysqli_query($con,$sql))
    {
        die('Error in querying the database' . mysqli_error($con));
    }

    echo "<br><select name='select_customer_bookings' id ='select_customer_bookings'>";

    while ($row=mysqli_fetch_array($result))
    {
        // Customer Details
        $CustomerID=$row['CustomerID'];
        $FirstName=$row['FirstName'];
        $Surname=$row['Surname'];
        $allText = "$CustomerID,$FirstName,$Surname";
        echo "<option value='$allText'>$CustomerID,$FirstName,$Surname</option>";
    }
    echo "</select>";
    mysqli_close($con);

?>