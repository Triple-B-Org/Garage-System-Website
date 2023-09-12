<!--
    Author: Gábor Major
    ID: C00271548
    Date: 2023.03.09
-->
<?php
    include "../connection.php";
    
    // insert new row into Stock table
    $sql = "INSERT INTO Stock (StockID, PartName, Description, ReorderLevel, ReorderQuantity, CostPrice, RetailPrice)
            VALUES ('$_POST[stockID]',
                    '$_POST[partName]',
                    '$_POST[description]',
                    '$_POST[reorderLevel]',
                    '$_POST[reorderQuantity]',
                    '$_POST[costPrice]',
                    '$_POST[retailPrice]');";

    if (!mysqli_query($con, $sql))
    {
        echo "Error " . mysqli_error($con);
        mysqli_close($con);
    }
    else
    {
        $supplierID = explode(' - ', $_POST['supplierListbox'])[0];
        
        // insert new row into Stock/Supplier table
        $sql = "INSERT INTO `Stock/Supplier` (StockID, SupplierID)
                VALUES ('$_POST[stockID]', '$supplierID');";
    
        if (!mysqli_query($con, $sql))
        {
            echo "Error " . mysqli_error($con);
            mysqli_close($con);
        }
        else
        {
            mysqli_close($con);
            // return to previous page with confirm variable
            header('Location: add_a_new_stock_item.html.php#confirm');
        }
    }
?>