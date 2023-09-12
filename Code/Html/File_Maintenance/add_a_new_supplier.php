<!--
    Author: Qadeer Hussain
    ID: C00270632
    Date: 2023.03.16
-->
<?php
    include "../connection.php";

    //Posting values
    $SupplierName=$_POST['supplierName'];
    $Street=$_POST['street'];
    $Town=$_POST['town'];
    $County=$_POST['county'];
    $PhoneNo=$_POST['phoneNo'];
    $WebsiteAddress=$_POST['websiteAddress'];
    $Email=$_POST['email'];

    //Checks the SupplierID value and increases it by one
    $sql = "SELECT MAX(SupplierID) as maxID FROM Supplier";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    $maxID = $row['maxID'] + 1;

    $SupplierID=$maxID;

    //Inserts data into supplier table
    $sql = "INSERT INTO Supplier (SupplierID, SupplierName, Street, Town, County, PhoneNo, WebsiteAddress, Email)
    VALUES ('$SupplierID', 
            '$SupplierName', 
            '$Street', 
            '$Town', 
            '$County', 
            '$PhoneNo', 
            '$WebsiteAddress', 
            '$Email')";

    if (!mysqli_query($con,$sql))
    {
        echo "Error ".mysqli_error($con);
    }
    else 
    {
        header('Location: add_a_new_supplier.html.php');
    }
mysqli_close($con);
?>
</form>