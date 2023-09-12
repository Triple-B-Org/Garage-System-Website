<!--
    Author: Gábor Major
    ID: C00271548
    Date: 2023.03.09
-->
<?php
    include "../connection.php";
    $stockID = explode('-', $_POST['stockItemListbox'])[0];
    $supplierID = explode(' - ', $_POST['supplierListbox'])[0];
    
    // update Stock table
    $sql = "UPDATE Stock
            SET PartName = '$_POST[partName]',
                Description = '$_POST[description]',
                ReorderLevel = '$_POST[reorderLevel]',
                ReorderQuantity = '$_POST[reorderQuantity]',
                CostPrice = '$_POST[costPrice]',
                RetailPrice = '$_POST[retailPrice]'
            WHERE StockID = $stockID;";

    if (!mysqli_query($con, $sql))
    {
        echo "Error " . mysqli_error($con);
        mysqli_close($con);
    }
    else
    {
        // update Stock/Supplier table
        $sql = "UPDATE `Stock/Supplier` SET SupplierID = $supplierID
                WHERE StockID = $stockID;";
        
        if (!mysqli_query($con, $sql))
        {
            echo "Error " . mysqli_error($con);
            mysqli_close($con);
        }
        else
        {
            mysqli_close($con);
            // return to previous page with confirm variable
            header('Location: amend_view_a_stock_item.html.php#confirm');
        }
    }
?>