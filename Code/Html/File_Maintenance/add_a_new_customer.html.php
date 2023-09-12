<!--
    Author: Adam Fitzpatrick
    ID: C00273365
    Date: 2023.02.16
-->
<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" href="../../Css/default.css">
        <title>Add Customer</title>
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
        <script>
            <?php
                    $counties = array(
                    'Antrim', 'Armagh', 'Carlow', 'Cavan', 'Clare', 'Cork',
                    'Derry', 'Donegal', 'Down', 'Dublin', 'Fermanagh', 'Galway',
                    'Kerry', 'Kildare', 'Kilkenny', 'Laois', 'Leitrim', 'Limerick',
                    'Longford', 'Louth', 'Mayo', 'Meath', 'Monaghan', 'Offaly',
                    'Roscommon', 'Sligo', 'Tipperary', 'Tyrone', 'Waterford',
                    'Westmeath', 'Wexford', 'Wicklow'
                    );
                ?>

                //Function to confirm if the user wants to add a customer
                function confirmCheck()
                {
                    var response;
                    response = confirm("Are you sure you want to add this customer?")
                    if (response)
                    {
                        return true;
                    }

                    else
                    {
                        return false;
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
                    Add Customer
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
                <div class="sub_menu_button" onclick="location.href='add_a_new_customer.html.php'" style="border-color: white;">
                    Add a New Customer
                </div>
                <div class="sub_menu_button" onclick="location.href='delete_a_customer.html.php'">
                    Delete a Customer
                </div>
                <div class="sub_menu_button" onclick="location.href='amend_view_a_customer.html.php'">
                    Amend / View a Customer
                </div>
            </div>
            <div class="content_box">
                <form class="context_box_form" action="add_a_new_customer.php" method="post" onsubmit=" return confirmCheck()">
                    <!-- Creates form for new customer -->
                    <div class="content_box_left">
                        <label>Customer ID</label>
                        <br>
                        <?php
                                include "../connection.php";

                                // Get the maximum CustomerID value from the Customer table
                                $sql = "SELECT MAX(CustomerID) AS prevID FROM Customer";
                                $result = mysqli_query($con, $sql);
                                $row = mysqli_fetch_assoc($result);
                                $prevID = $row['prevID'];
        
                                // Calculate the new CustomerID value
                                $CustomerID = $prevID + 1;

                                if (!mysqli_query($con, $sql))
                                {
                                    echo "Error " . mysqli_error($con);
                                }

                                else
                                {   
                                    $CustomerID = $prevID + 1;
                                    echo "<input type='text' name='customer_id' id='customer_id' value='$CustomerID' required disabled><br>";
                                    
                                }
                            ?>
                            <br>

                            <label>First Name</label>
                            <br>
                            <input type="text" id="customer_name" name="customer_name" placeholder="John" autofocus required>
                            <br>

                            <label>Surname</label>
                            <br>
                            <input type="text" id="customer_surname" name="customer_surname" placeholder="Doe" required>
                            <br>

                            <label>Phone number</label>
                            <br>
                            <input type="text" id="customer_phoneno" name="customer_phoneno" placeholder="086-059-6713" pattern="^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$" required>
                            <br>
                    </div>

                    <div class="content_box_right">
                        <label>Email</label>
                        <br>
                        <input type="email" id="customer_email" name="customer_email" placeholder="jodoe@gmail.com" required>
                        <br>

                        <label>Street</label>
                        <br>
                        <input type="text" id="customer_street" name="customer_street" required>
                        <br>

                        <label>Town</label>
                        <br>
                        <input type="text" id="customer_town" name="customer_town" required>
                        <br>

                        <label>County</label>
                        <br>
                        <select id="customer_county" name="customer_county" required>
                            <?php foreach ($counties as $county): ?>
                                <option value="<?php echo $county; ?>"><?php echo $county; ?></option>
                            <?php endforeach; ?>
                            </select>
                        <br>

                        <input class="content_box_button" type="submit" value="Add"></input>
                        <input class="content_box_button" type="reset" value="Clear"></input>

                    </div>
                </form>

            </div>
        </div>
        </div>
    </body>
</html>