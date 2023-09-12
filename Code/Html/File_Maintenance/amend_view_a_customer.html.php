<!--
    Author: Adam Fitzpatrick
    ID: C00273365
    Date: 2023.02.16
-->
<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" href="../../Css/default.css">
        <title>Amend/View Customer</title>
        <style>
            /* sets it as there are four buttons */
                .sub_menu_button 
                {
                    width: 20%;
                }
                
                .content_box label 
                {
                    margin: 20px 0px 20px 0px;
                }
        </style>
    </head>
    <script>
        <?php
        $counties = array(
        'Antrim', 'Armagh', 'Carlow', 'Cavan', 'Clare', 'Cork',
        'Derry', 'Donegal', 'Down', 'Dublin', 'Fermanagh', 'Galway',
        'Kerry', 'Kildare', 'Kilkenny', 'Laois', 'Leitrim', 'Limerick',
        'Longford', 'Louth', 'Mayo', 'Meath', 'Monaghan', 'Offaly',
        'Roscommon', 'Sligo', 'Tipperary', 'Tyrone', 'Waterford',
        'Westmeath', 'Wexford', 'Wicklow'
        ); // Array of all counties of Ireland
        ?>

        function populate() // Populates text boxes with customer information
            {
                var sel = document.getElementById("customer_listbox");
                var result;
                result = sel.options[sel.selectedIndex].value;
                var customerDetails = result.split(',');

                document.getElementById("customer_id").value = customerDetails[0];
                document.getElementById("customer_name").value = customerDetails[1];
                document.getElementById("customer_surname").value = customerDetails[2];
                document.getElementById("customer_street").value = customerDetails[3];
                document.getElementById("customer_town").value = customerDetails[4];
                document.getElementById("customer_county").value = customerDetails[5];
                document.getElementById("customer_email").value = customerDetails[6];
                document.getElementById("customer_phoneno").value = customerDetails[7];
            }
            
        function toggleLock() // Locks/unlocks entry of text into text boxes
            {
                if (document.getElementById("amendViewbutton").value == "Amend")
                {
                    document.getElementById("customer_name").disabled = false;
                    document.getElementById("customer_surname").disabled = false;
                    document.getElementById("customer_street").disabled = false;
                    document.getElementById("customer_town").disabled = false;
                    document.getElementById("customer_county").disabled = false;
                    document.getElementById("customer_email").disabled = false;
                    document.getElementById("customer_phoneno").disabled = false;
                    document.getElementById("amendViewbutton").value = "View";
                }

                else
                {
                    document.getElementById("customer_name").disabled = true;
                    document.getElementById("customer_surname").disabled = true;
                    document.getElementById("customer_street").disabled = true;
                    document.getElementById("customer_town").disabled = true;
                    document.getElementById("customer_county").disabled = true;
                    document.getElementById("customer_email").disabled = true;
                    document.getElementById("customer_phoneno").disabled = true;
                    document.getElementById("amendViewbutton").value = "Amend";
                }
    }
        function confirmCheck() // Asks user if they are sure they would like to make changes
            {
                var response;
                response = confirm('Are you sure you want to save these changes?');
                if (response)
                    {
                        document.getElementById("customer_id").disabled = false;
                        document.getElementById("customer_name").disabled = false;
                        document.getElementById("customer_surname").disabled = false;
                        document.getElementById("customer_street").disabled = false;
                        document.getElementById("customer_town").disabled = false;
                        document.getElementById("customer_county").disabled = false;
                        document.getElementById("customer_email").disabled = false;
                        document.getElementById("customer_phoneno").disabled = false;
                        return true;
                    }

                else
                    {
                        populate();
                        toggleLock();
                        return false;
                    }
            }
    </script>

    <body>
        <div class="nav_container">
            <div class="menu_box">
                <!-- this makes it so the logo brings you back to the main menu -->
                <img class="logo" onclick="location.href='../main_menu.php'">
                <div class="menu_title">
                    Amend/View Customer
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
                <div class="sub_menu_button" onclick="location.href='add_a_new_customer.html.php'">
                    Add a New Customer
                </div>
                <div class="sub_menu_button" onclick="location.href='delete_a_customer.html.php'">
                    Delete a Customer
                </div>
                <div class="sub_menu_button" onclick="location.href='amend_view_a_customer.html.php'" style="border-color: white;">
                    Amend / View a Customer
                </div>
            </div>
            <div class="content_box">
                <form class="context_box_form" action="amend_view_a_customer.php" method="POST" onsubmit="return confirmCheck()">
                    <div class="content_box_left">
                        <label>Select</label>
                        <br>
                        <?php
                                include "../connection.php";
        
                                $sql = "SELECT * FROM Customer WHERE Deleted = 0";

                                if (!$result = mysqli_query($con, $sql))
                                {
                                    die('Error in querying the database' . mysqli_error($con));
                                }
                                
                                // Create listbox
                                echo "<select id='customer_listbox' name='customer_listbox' onclick='populate();'>";

                                while ($row = mysqli_fetch_array($result))
                                {
                                    $CustomerID = $row['CustomerID'];
                                    $FirstName = $row['FirstName'];
                                    $Surname = $row['Surname'];
                                    $Street = $row['Street'];
                                    $Town = $row['Town'];
                                    $County = $row['County'];
                                    $Email = $row['Email'];
                                    $PhoneNo = $row['PhoneNo'];

                                    $allText = "$CustomerID,$FirstName,$Surname,$Street,$Town,$County,$Email,$PhoneNo";
                                    echo "<option value='$allText'>$CustomerID - $FirstName $Surname</option>";
                                }
                                echo "</select>";
                                mysqli_close($con);
                            ?>

                            <input type="button" class="content_box_button" value="Amend" id="amendViewbutton" onclick="toggleLock()">
                            <br>
                            <label>Customer ID</label>
                            <br>
                            <input type="text" id="customer_id" name="customer_id" disabled>
                            <br>

                            <label>First Name</label>
                            <br>
                            <input type="text" id="customer_name" name="customer_name" disabled>
                            <br>

                            <label>Surname</label>
                            <br>
                            <input type="text" id="customer_surname" name="customer_surname" disabled>
                            <br>

                            <label>Phone number</label>
                            <br>
                            <input type="text" id="customer_phoneno" name="customer_phoneno" pattern="^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$" disabled>
                            <br>
                    </div>

                    <div class="content_box_right">
                        <label>Email</label>
                        <br>
                        <input type="email" id="customer_email" name="customer_email" disabled>
                        <br>

                        <label>Street</label>
                        <br>
                        <input type="text" id="customer_street" name="customer_street" disabled>
                        <br>

                        <label>Town</label>
                        <br>
                        <input type="text" id="customer_town" name="customer_town" disabled>
                        <br>

                        <label>County</label>
                        <br>
                        <select id="customer_county" name="customer_county" disabled>
                            <?php 
                                foreach ($counties as $county): 
                            ?>

                            <option value="<?php echo $county; ?>">
                            
                            <?php 
                            echo $county; 
                            ?>
                            
                            </option>
                            
                            <?php 
                                endforeach; 
                            ?>
                            </select>
                        <br>
                        <input class="content_box_button" type="submit" value="Update"></input>
                        <input class="content_box_button" type="reset" value="Clear"></input>

                    </div>
                </form>
            </div>
        </div>
    </body>
</html>