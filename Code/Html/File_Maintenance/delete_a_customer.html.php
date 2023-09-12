<!--
    Author: Qadeer Hussain
    ID: C00270632
    Date: 2023.03.16
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../../Css/default.css">
        <title>Delete Customer</title>
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
            // Confirmation 
            function confirmCheck()
            {   
                var sel=document.getElementById("select_customer");
                var result;
                result=sel.options[sel.selectedIndex].value;
                var details=result.split(',');
                var response;
                response = confirm('Are you sure you want to delete this customer ' + details[0] + " - " + details[1] + " " + details[2]);
                if(response){
                    return true;
                }
                else{
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
                    Delete Customer
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
                <div class="sub_menu_button" onclick="location.href='delete_a_customer.html.php'" style="border-color: white;">
                    Delete a Customer
                </div>
                <div class="sub_menu_button" onclick="location.href='amend_view_a_customer.html.php'">
                    Amend / View a Customer
                </div>
            </div>
            <div class="content_box">
                <div form="content_box_form">
                    <form action="delete_a_customer.php" method="post" onsubmit="return confirmCheck()">
                        <!-- Left box with content -->
                        <div class="content_box_left">
                            <!-- Select Customer  -->
                            <label for="Customer">Select Customer</label>
                                <?php include "select_customer.php" ?>
                                <script>
                                    // Populate the Customer information into there text boxes
                                    function populate()
                                    {
                                        var sel=document.getElementById("select_customer");
                                        var result;
                                        result=sel.options[sel.selectedIndex].value;
                                        var details=result.split(',');
                                        document.getElementById("street").value=details[3];
                                        document.getElementById("town").value=details[4];
                                        document.getElementById("county").value=details[5];
                                        document.getElementById("phoneNo").value=details[6];
                                        document.getElementById("email").value=details[7];
                                    }
                                </script>
                            <br>
                            <!-- Phone Number -->
                            <label for="phoneNo">Phone Number</label>
                            <br>
                            <input type="number" id="phoneNo" name="phoneNo" placeholder="089-234-5678" readonly> 
                            <br>
                            <!-- Email -->
                            <label for="email">Email</label>
                            <br>
                            <input type="email" id="email" name="email" placeholder="example@gmail.com" readonly> 
                        </div>
                        <!-- Right box with content -->
                        <div class="content_box_right">
                            <!-- Street -->
                            <label for="street">Street</label>
                            <br>
                            <input type="text" id="street" name="street" readonly>
                            <br>
                            <!-- Town -->
                            <label for="town">Town</label>
                            <br>
                            <input type="text" id="town" name="town" readonly>
                            <br>
                            <!-- County -->
                            <label for="county">County:</label>
                            <br>
                            <select id="county" name="county" disabled>
                            <option value="">Select County</option>
                            <option value="Antrim">Antrim</option>
                            <option value="Armagh">Armagh</option>
                            <option value="Carlow">Carlow</option>
                            <option value="Cavan">Cavan</option>
                            <option value="Clare">Clare</option>
                            <option value="Cork">Cork</option>
                            <option value="Derry">Derry</option>
                            <option value="Donegal">Donegal</option>
                            <option value="Down">Down</option>
                            <option value="Dublin">Dublin</option>
                            <option value="Fermanagh">Fermanagh</option>
                            <option value="Galway">Galway</option>
                            <option value="Kerry">Kerry</option>
                            <option value="Kildare">Kildare</option>
                            <option value="Kilkenny">Kilkenny</option>
                            <option value="Laois">Laois</option>
                            <option value="Leitrim">Leitrim</option>
                            <option value="Limerick">Limerick</option>
                            <option value="Longford">Longford</option>
                            <option value="Louth">Louth</option>
                            <option value="Mayo">Mayo</option>
                            <option value="Meath">Meath</option>
                            <option value="Monaghan">Monaghan</option>
                            <option value="Offaly">Offaly</option>
                            <option value="Roscommon">Roscommon</option>
                            <option value="Sligo">Sligo</option>
                            <option value="Tipperary">Tipperary</option>
                            <option value="Tyrone">Tyrone</option>
                            <option value="Waterford">Waterford</option>
                            <option value="Westmeath">Westmeath</option>
                            <option value="Wexford">Wexford</option>
                            <option value="Wicklow">Wicklow</option>
                            </select>
                            <br>
                            <!-- Delete Button -->
                            <input class ="content_box_button" type="submit" value="Delete">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>