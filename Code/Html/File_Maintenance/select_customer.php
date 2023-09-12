<!--
    Author: Qadeer Hussain
    ID: C00270632
    Date: 2023.03.16
-->
<?php
include "../connection.php";//database connections

date_default_timezone_set('UTC');

// Select the Customer details
$sql = "SELECT customerID,firstName,surName,street,town,county,phoneNo,email FROM Customer WHERE Deleted=0";

if (!$result=mysqli_query($con,$sql))
{
    die('Error in querying the database' . mysqli_error($con));
}
echo "<br><select name='select_customer' id ='select_customer' onclick='populate()'>";

while ($row=mysqli_fetch_array($result))
{
    // Customer details
    $CustomerID=$row['customerID'];
    $FirstName=$row['firstName'];
    $Surname=$row['surName'];
    $Street=$row['street'];
    $Town=$row['town'];
    $County=$row['county'];
    $PhoneNo=$row['phoneNo'];
    $Email=$row['email'];
    $allText = "$CustomerID,$FirstName,$Surname,$Street,$Town,$County,$PhoneNo,$Email";
    echo "<option value='$allText'>$CustomerID,$FirstName,$Surname</option>";
}
echo "</select>";
mysqli_close($con);

?>