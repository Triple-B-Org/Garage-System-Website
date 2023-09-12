<!--
    Author: Gábor Major
    ID: C00271548
    Date: 2023.03.09
-->
<?php
    include "../connection.php";
    $stockID = explode('-', $_POST['stockItemListbox'])[0];
    
    // update Stock table
    $sql = "UPDATE Stock SET Deleted = 1
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
        header('Location: delete_a_stock_item.html.php#confirm');
    }
?>