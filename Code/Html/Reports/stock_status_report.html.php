<!--
    Author: Gábor Major
    ID: C00271548
    Date: 2023.03.09
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../../Css/default.css">
        <title>Stock Status Report</title>
        <style>
            /* sets it as there are four buttons */
            .sub_menu_button 
            {
                width: 20%;
            }
            /* changes the width to be bigger for text in it */
            input.content_box_button
            {
                width: 30%;
                margin: 20px calc(15% + 5px) 0px 0px;
            }
        </style>
        <script>
            function stockDescriptionOrder()
            {
                document.reportForm.choice.value="StockDescription";
                document.reportForm.submit();
            }
            function supplierNameOrder()
            {
                document.reportForm.choice.value="SupplierName";
                document.reportForm.submit();
            }
        </script>
    </head>
    <body>
        <div class="nav_container">
            <div class="menu_box">
                <!-- this makes it so the logo brings you back to the main menu -->
                <img class="logo" onclick="location.href='../main_menu.php'">
                <div class="menu_title">
                    Stock Status Report
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
                <div class="menu_button" onclick="location.href='../File_Maintenance/file_maintenance_menu.html'">
                    File Maintenance Menu
                </div>
                <div class="menu_button" onclick="location.href='reports_menu.html'" style="border-color: white;">
                    Reports Menu
                </div>
                <div class="menu_button" onclick="location.href='../login_page.html'">
                    Quit
                </div>
            </div>
            <div class="sub_menu_box">
                <div class="sub_menu_button" onclick="location.href='../main_menu.php'">
                    Back
                </div>
                <div class="sub_menu_button" onclick="location.href='stock_status_report.html.php'" style="border-color: white;">
                    Stock Status Report
                </div>
                <div class="sub_menu_button" onclick="location.href='jobs_report.html'">
                    Jobs Report
                </div>
                <div class="sub_menu_button" onclick="location.href='unpaid_invoices_report.html'">
                    Unpaid Invoices Report
                </div>
            </div>
            <div class="content_box">
                <!-- hidden input for php -->
                <form action="stock_status_report.html.php" method="post" name="reportForm">
                    <input type="hidden" name="choice">
                </form>
                <!-- holds the text and title -->
                <div style="height: 20%;">
                    <div class="content_box_left">
                        <label style="margin-left: 100px;">Alphabetical Ordering Of</label>
                    </div>
                    <div class="content_box_right">
                        <input class="content_box_button" id="stockDescriptionButton" value="Stock Description" type="button" onclick="stockDescriptionOrder();"/>
                        <input class="content_box_button" id="supplierNameButton" value="Supplier Name" type="button" onclick="supplierNameOrder();"/>
                    </div>
                </div>
                <!-- actual report table container -->
                <div class="content_box_report">
                    <?php
                        include "../connection.php";
                        $choice = "StockDescription";
                        if (ISSET($_POST['choice']))
                        {
                            $choice = $_POST['choice'];
                        }
                        if ($choice == "StockDescription")
                        {
                    ?>
                    <script>
                        document.getElementById("stockDescriptionButton").disabled = true;
                        document.getElementById("supplierNameButton").disabled = false;
                    </script>
                    <?php
                            $sql = "SELECT * FROM ((Stock
                                    INNER JOIN `Stock/Supplier` ON `Stock/Supplier`.StockID = Stock.StockID)
                                    INNER JOIN Supplier ON `Stock/Supplier`.SupplierID = Supplier.SupplierID)
                                    WHERE Stock.Deleted = 0
                                    ORDER BY Description;";
                            produceReport($con, $sql);
                        }
                        else
                        {
                    ?>
                    <script>
                        document.getElementById("stockDescriptionButton").disabled = false;
                        document.getElementById("supplierNameButton").disabled = true;
                    </script>
                    <?php
                            $sql = "SELECT * FROM ((Stock
                                    INNER JOIN `Stock/Supplier` ON `Stock/Supplier`.StockID = Stock.StockID)
                                    INNER JOIN Supplier ON `Stock/Supplier`.SupplierID = Supplier.SupplierID)
                                    WHERE Stock.Deleted = 0
                                    ORDER BY SupplierName;";
                            produceReport($con, $sql);
                        }
                        function produceReport($con, $sql)
                        {
                            $result = mysqli_query($con, $sql);
                            echo "<table>
                                    <tr>
                                        <th>Part Name</th>
                                        <th>Stock Description</th>
                                        <th>Stock Number</th>
                                        <th>Quantity In Stock</th>
                                        <th>Supplier Name</th>
                                    </tr>";
                            while ($row = mysqli_fetch_array($result))
                            {
                                echo "<tr>
                                        <td>".$row['PartName']."</td>
                                        <td>".$row['Description']."</td>
                                        <td>".$row['StockID']."</td>
                                        <td>".$row['QuantityInStock']."</td>
                                        <td>".$row['SupplierName']."</td>
                                        </tr>";
                            }
                            echo "</table>";
                        }
                        mysqli_close($con);
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>