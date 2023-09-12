<!--
    Author: Gábor Major
    ID: C00271548
    Date: 2023.03.09
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../../Css/default.css">
        <title>Amend/View Stock Item</title>
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
                document.getElementById("toggleButton").disabled = true;
                document.getElementById("supplierListbox").disabled = true;

                // checks if redirected from php
                if (document.URL.includes('#confirm'))
                {
                    // waits for 100ms
                    // lets the html load in
                    await new Promise(resolve => setTimeout(resolve, 100));
                    alert('Details have been amended!');
                }
            }
            // confirms details
            function confirmCheck()
            {
                // checks if the inputs are correct
                if (!confirmInputNumbers() || !confirmTextInputs())
                {
                    return false;
                }
                var response = confirm('Are you sure you want to change this stock item?\n' +
                                       'Stock ID: ' + document.getElementById("stockID").value + '\n' +
                                       'Part Name: ' + document.getElementById("partName").value);
                if (response)
                {
                    document.getElementById("supplierListbox").disabled = false;
                    return true;
                }
                else
                {
                    return false;
                }
            }
            // checks if the input numbers have an "e" in it
            function confirmInputNumbers()
            {
                if (document.getElementById("reorderLevel").value.includes("e"))
                {
                    alert('Reorder Level cannot contain: e');
                    return false;
                }
                if (document.getElementById("reorderQuantity").value.includes("e"))
                {
                    alert('Reorder Quantity cannot contain: e');
                    return false;
                }
                if (document.getElementById("costPrice").value.includes("e"))
                {
                    alert('Cost Price cannot contain: e');
                    return false;
                }
                if (document.getElementById("retailPrice").value.includes("e"))
                {
                    alert('Retail Price cannot contain: e');
                    return false;
                }
                return true;
            }
            // checks if the input texts have a "-" in it
            function confirmTextInputs()
            {
                if (document.getElementById("partName").value.includes("-"))
                {
                    alert('Part Name cannot contain: -');
                    return false;
                }
                if (document.getElementById("description").value.includes("-"))
                {
                    alert('Description cannot contain: -');
                    return false;
                }
                return true;
            }
            // populate details in fields
            function populate()
            {
                var sel = document. getElementById("stockItemListbox");
                var result = sel.options[sel.selectedIndex].value;
                var stockDetails = result.split('-');
                console.log(stockDetails.length);
                if (stockDetails.length == 9)
                {
                    document.getElementById("toggleButton").disabled = false;
                    document.getElementById("stockID").value = stockDetails[0];
                    document.getElementById("partName").value = stockDetails[1];
                    document.getElementById("supplierListbox").value = stockDetails[7] + ' - ' + stockDetails[8];
                    document.getElementById("description").value = stockDetails[2];
                    document.getElementById("reorderLevel").value = stockDetails[3];
                    document.getElementById("reorderQuantity").value = stockDetails[4];
                    document.getElementById("costPrice").value = stockDetails[5];
                    document.getElementById("retailPrice").value = stockDetails[6];
                }
                else
                {
                    document.getElementById("toggleButton").disabled = true;
                    document.getElementById("stockID").value = "";
                    document.getElementById("partName").value = "";
                    document.getElementById("supplierListbox").value = "";
                    document.getElementById("description").value = "";
                    document.getElementById("reorderLevel").value = "";
                    document.getElementById("reorderQuantity").value = "";
                    document.getElementById("costPrice").value = "";
                    document.getElementById("retailPrice").value = "";

                    document.getElementById("toggleButton").value = "View";
                    toggleLock();
                }
            }
            // toggles the availability of input fields
            function toggleLock()
            {
                if (document.getElementById("toggleButton").value == "Amend")
                {
                    document.getElementById("partName").readOnly = false;
                    document.getElementById("supplierListbox").disabled = false;
                    document.getElementById("description").readOnly = false;
                    document.getElementById("reorderLevel").readOnly = false;
                    document.getElementById("reorderQuantity").readOnly = false;
                    document.getElementById("costPrice").readOnly = false;
                    document.getElementById("retailPrice").readOnly = false;
                    document.getElementById("toggleButton").value = "View";
                }
                else
                {
                    document.getElementById("partName").readOnly = true;
                    document.getElementById("supplierListbox").disabled = true;
                    document.getElementById("description").readOnly = true;
                    document.getElementById("reorderLevel").readOnly = true;
                    document.getElementById("reorderQuantity").readOnly = true;
                    document.getElementById("costPrice").readOnly = true;
                    document.getElementById("retailPrice").readOnly = true;
                    document.getElementById("toggleButton").value = "Amend";
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
                    Amend/View Stock Item
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
                <div class="sub_menu_button" onclick="location.href='delete_a_stock_item.html.php'">
                    Delete a Stock Item
                </div>
                <div class="sub_menu_button" onclick="location.href='amend_view_a_stock_item.html.php'" style="border-color: white;">
                    Amend / View a Stock Item
                </div>
            </div>
            <div class="content_box">
                <form class="content_box_form" action="amend_view_a_stock_item.php" onsubmit="return confirmCheck();" method="post">
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
                                $partName = $row['PartName'];
                                $description = $row['Description'];
                                $reorderLevel = $row['ReorderLevel'];
                                $reorderQuantity = $row['ReorderQuantity'];
                                $costPrice = $row['CostPrice'];
                                $retailPrice = $row['RetailPrice'];

                                $supplierID = $row['SupplierID'];
                                $supplierName = $row['SupplierName'];

                                $allText = "$stockID-$partName-$description-$reorderLevel-$reorderQuantity-$costPrice-$retailPrice-$supplierID-$supplierName";
                                echo "<option value='$allText'>$stockID - $partName - $description</option>";
                            }
                            echo "</select><br>";
                            mysqli_close($con);
                        ?>
                        <input type="button" class="content_box_button" name="toggleButton" id="toggleButton" value="Amend" onclick="toggleLock();" style="margin-top: 20px;"/><br>

                        <!-- gets a selectable list of suppliers -->
                        <label for="supplierListbox">Supplier</label><br>
                        <?php
                            include "../connection.php";
        
                            $sql = "SELECT SupplierID, SupplierName FROM Supplier WHERE Deleted = 0";

                            if (!$result = mysqli_query($con, $sql))
                            {
                                die('Error in querying the database' . mysqli_error($con));
                            }

                            echo "<select name='supplierListbox' id='supplierListbox' required disabled>";
                            echo "<option value=''>Select Supplier</option>";

                            while ($row = mysqli_fetch_array($result))
                            {
                                $supplierID = $row['SupplierID'];
                                $supplierName = $row['SupplierName'];

                                $allText = "$supplierID - $supplierName";
                                echo "<option value='$allText'>$allText</option>";
                            }
                            echo "</select><br>";
                            mysqli_close($con);
                        ?>

                        <label for="partName">Part Name</label><br>
                        <input type="text" name="partName" id="partName" maxlength="39" required readonly><br>

                        <label for="description">Description</label><br>
                        <textarea name="description" id="description" maxlength="340" required readonly></textarea>

                        <!-- hidden for popup -->
                        <input type='hidden' name='stockID' id='stockID' required readonly>
                    </div>
                    <div class="content_box_right">
                        <label for="reorderLevel">Reorder Level</label><br>                         <!-- Matches one to eleven digits -->
                        <input type="number" name="reorderLevel" id="reorderLevel" min="0" maxlength="11" pattern="\d" required readonly><br>

                        <label for="reorderQuantity">Reorder Quantity</label><br>
                        <input type="number" name="reorderQuantity" id="reorderQuantity" min="1" maxlength="11" pattern="\d" required readonly><br>

                        <label for="costPrice">Cost Price</label><br>                              <!-- Matches one or more digit, dot, and two digits -->
                        <input type="number" name="costPrice" id="costPrice" min="0" step="0.01" maxlength="11" pattern="\d+\.\d{2}" required readonly><br>

                        <label for="retailPrice">Retail Price</label><br>
                        <input type="number" name="retailPrice" id="retailPrice" min="0" step="0.01" maxlength="11" pattern="\d+\.\d{2}" required readonly><br>

                        <input class="content_box_button" type="submit" value="Amend"/>
                        <input class="content_box_button" type="reset" value="Clear"/>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>