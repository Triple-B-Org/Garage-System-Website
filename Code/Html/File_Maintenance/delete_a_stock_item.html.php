<!--
    Author: Gábor Major
    ID: C00271548
    Date: 2023.03.09
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../../Css/default.css">
        <title>Delete Stock Item</title>
        <style>
            /* sets it as there are four buttons */
            .sub_menu_button 
            {
                width: 20%;
            }
        </style>
        <script>
            // runs the function everytime the file is loaded
            // https://developer.mozilla.org/en-US/docs/Learn
            window.onload = async function checkUpload()
            {
                // checks if redirected from php
                if (document.URL.includes('#confirm'))
                {
                    // waits for 100ms
                    // lets the html load in
                    await new Promise(resolve => setTimeout(resolve, 100));
                    alert('Stock Item has been deleted!');
                }
            }
            // confirms details
            function confirmCheck()
            {
                var quantityInStock = document.getElementById("quantityInStock").value;
                var quantityOnOrder = document.getElementById("quantityOnOrder").value;
                // checks whether quantity in stock and on order are not 0
                if (quantityInStock != '0' || quantityOnOrder != '0')
                {
                    alert('Stock Item cannot be deleted!\nQuantity in stock: ' + quantityInStock + '\nQuantity on order: ' + quantityOnOrder);
                    return false;
                }
                else
                {
                    var response = confirm('Are you sure you want to delete this stock item?\n' +
                                           'Stock ID: ' + document.getElementById("stockID").value + '\n' +
                                           'Part Name: ' + document.getElementById("partName").value);
                    if (response)
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
            }
            // populate details in fields
            function populate()
            {
                var sel = document. getElementById("stockItemListbox");
                var result = sel.options[sel.selectedIndex].value;
                var stockDetails = result.split('-');
                if (stockDetails.length == 7)
                {
                    document.getElementById("description").value = stockDetails[3];
                    document.getElementById("supplierData").value = stockDetails[5] + ' - ' + stockDetails[6];
                    document.getElementById("stockID").value = stockDetails[0];
                    document.getElementById("partName").value = stockDetails[2];
                    document.getElementById("quantityInStock").value = stockDetails[1];
                    document.getElementById("quantityOnOrder").value = stockDetails[4];
                }
                else
                {
                    document.getElementById("description").value = "";
                    document.getElementById("supplierData").value = "";
                    document.getElementById("stockID").value = "";
                    document.getElementById("partName").value = "";
                    document.getElementById("quantityInStock").value = "";
                    document.getElementById("quantityOnOrder").value = "";
                }
            }
        </script>
    </head>
    <body>
        <div class="nav_container">
            <div class="menu_box">
                <!-- this makes it so the logo brings you back to the main menu -->
                <img class="logo" onclick="location.href='../main_menu.php'">
                <div class="menu_title">
                    Delete Stock Item
                </div>
                <div class="menu_button" onclick="location.href='../Bookings/bookings_menu.html'">
                    Bookings Menu
                </div>
                <div class="menu_button" onclick="location.href='../Jobs/jobs_menu.html'">
                    Jobs Menu
                </div>
                <div class="menu_button" onclick="location.href='../Employee/employee_menu.html'">
                    Employee Menu
                </div>
                <div class="menu_button" onclick="location.href='../Stock_Control/stock_control_menu.html'">
                    Stock Control Menu
                </div>
                <div class="menu_button" onclick="location.href='../Supplier_Accounts/supplier_accounts_menu.html'">
                    Supplier Accounts Menu
                </div>
                <div class="menu_button" onclick="location.href='file_maintenance_menu.html'" style="border-color: white;">
                    File Maintenance Menu
                </div>
                <div class="menu_button" onclick="location.href='../Reports/reports_menu.html'">
                    Reports Menu
                </div>
                <div class="menu_button" onclick="location.href='../login_page.html'">
                    Quit
                </div>
            </div>
            <div class="sub_menu_box">
                <div class="sub_menu_button" onclick="location.href='file_maintenance_menu.html'">
                    Back
                </div>
                <div class="sub_menu_button" onclick="location.href='add_a_new_stock_item.html.php'">
                    Add a New Stock Item
                </div>
                <div class="sub_menu_button" onclick="location.href='delete_a_stock_item.html.php'" style="border-color: white;">
                    Delete a Stock Item
                </div>
                <div class="sub_menu_button" onclick="location.href='amend_view_a_stock_item.html.php'">
                    Amend / View a Stock Item
                </div>
            </div>
            <div class="content_box">
                <form class="content_box_form" action="delete_a_stock_item.php" onsubmit="return confirmCheck();" method="post">
                    <div class="content_box_left">
                        <!-- shows all available stock items -->
                        <label for="stockItemListbox">Select Stock Item</label><br>
                        <?php
                            include "../connection.php";
                            $sql = "SELECT * FROM ((Stock
                                    INNER JOIN `Stock/Supplier` ON `Stock/Supplier`.StockID = Stock.StockID)
                                    INNER JOIN Supplier ON `Stock/Supplier`.SupplierID = Supplier.SupplierID)
                                    WHERE Stock.Deleted = 0;";
                        
                            if (!$result = mysqli_query($con, $sql))
                            {
                                die('Error in querying the database' . mysqli_error($con));
                            }

                            echo "<select name='stockItemListbox' id='stockItemListbox' onclick='populate();' required>";
                            echo "<option value=''>Select Stock Item</option>";

                            while ($row = mysqli_fetch_array($result))
                            {
                                $stockID = $row['StockID'];
                                $quantityInStock = $row['QuantityInStock'];
                                $partName = $row['PartName'];
                                $description = $row['Description'];
                                $quantityOnOrder = $row['QuantityOnOrder'];

                                $supplierID = $row['SupplierID'];
                                $supplierName = $row['SupplierName'];

                                $allText = "$stockID-$quantityInStock-$partName-$description-$quantityOnOrder-$supplierID-$supplierName";
                                echo "<option value='$allText'>$stockID - $partName - $description</option>";
                            }
                            echo "</select><br>";
                            mysqli_close($con);
                        ?>
                        <label for="description">Description</label><br>
                        <textarea name="description" id="description" required readonly></textarea>

                        <!-- hiddens used for javascript checking -->
                        <input type='hidden' name='stockID' id='stockID' required readonly>
                        <input type='hidden' name='partName' id='partName' required readonly>
                        <input type='hidden' name='quantityInStock' id='quantityInStock' required readonly>
                        <input type='hidden' name='quantityOnOrder' id='quantityOnOrder' required readonly>
                    </div>
                    <div class="content_box_right">
                        <label for="supplierData">Supplier</label><br>
                        <input type='text' name='supplierData' id='supplierData' required readonly><br>
                        
                        <input class="content_box_button" type="submit" value="Delete"/>
                        <input class="content_box_button" type="reset" value="Clear"/>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>