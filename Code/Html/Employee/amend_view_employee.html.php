<!--
    Author: Kelan Morgan
    ID:     C00262090
    Date:   2023.03.13
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../../Css/default.css">
        <title>Amend/View Employee</title>
        <style>
            /* sets it as there are four buttons */
            .sub_menu_button 
            {
                width: 20%;
            }
            .content_box_right
            {
                margin: 10px 50px 10px 50px;
            }
            .content_box_left
            {
                margin: 10px 50px 10px 50px;
            }
            .content_box label
            {
                margin: 10px 0px 10px 0px;
            }
        </style>
    </head>
    <body>
        <div class="nav_container">
            <div class="menu_box">
                <!-- this makes it so the logo brings you back to the main menu -->
                <img class="logo" onclick="location.href='../main_menu.php'">
                <div class="menu_title">
                    Amend/View Employee
                </div>
                <div class="menu_button" onclick="location.href='../Bookings/bookings_menu.html'">
                    Bookings Menu
                </div>
                <div class="menu_button" onclick="location.href='../Jobs/jobs_menu.html'">
                    Jobs Menu
                </div>
                <div class="menu_button" onclick="location.href='employee_menu.html'" style="border-color: white;">
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
                <div class="menu_button" onclick="location.href='../Reports/reports_menu.html'">
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
                <div class="sub_menu_button" onclick="location.href='add_new_employee.html.php'">
                    Add Employee
                </div>
                <div class="sub_menu_button" onclick="location.href='delete_employee.html.php'">
                    Delete Employee
                </div>
                <div class="sub_menu_button" onclick="location.href='amend_view_employee.html.php'" style="border-color: white;">
                    Amend/View Employee
                </div>
            </div>
            <div class="content_box">
                <form action="amend_view_employee.php" method="post" onsubmit="return confirmCheck()">
                    <!-- left side of content box -->
                    <div class="content_box_left">
                        <!-- dropdown for employee ID and name -->
                        <label for="employeeIDAndName">Select Employee</label>
                        <?php include "select_employee.php" ?>

                        <input type="button" id="amendViewbutton" value="Amend" onclick = "toggleLock()" class="content_box_button"><br>
                        <script>
                            // populates the form
                            function populate(){
                                var select = document.getElementById("selectEmployee");
                                var result = select.options[select.selectedIndex].value;
                                var details = result.split(", ");

                                document.getElementById("employeeID").value = details[0];
                                document.getElementById("firstName").value = details[1];
                                document.getElementById("surname").value = details[2];
                                document.getElementById("street").value = details[3];
                                document.getElementById("town").value = details[4];
                                document.getElementById("county").value = details[5];
                                document.getElementById("ppsNumber").value = details[6];
                                document.getElementById("phoneNumber").value = details[7];
                                document.getElementById("email").value = details[8];
                                document.getElementById("jobTitle").value = details[9];
                                document.getElementById("loginName").value = details[10];
                            }
                            function toggleLock(){
                                if(document.getElementById("amendViewbutton").value == "Amend"){
                                    document.getElementById("amendViewbutton").value = "View";
                                    document.getElementById("firstName").disabled = false;
                                    document.getElementById("surname").disabled = false;
                                    document.getElementById("street").disabled = false;
                                    document.getElementById("town").disabled = false;
                                    document.getElementById("county").disabled = false;
                                    document.getElementById("ppsNumber").disabled = false;
                                    document.getElementById("phoneNumber").disabled = false;
                                    document.getElementById("email").disabled = false;
                                    document.getElementById("jobTitle").disabled = false;
                                    document.getElementById("loginName").disabled = false;
                                }
                                else{
                                    document.getElementById("amendViewbutton").value = "Amend";
                                    document.getElementById("firstName").disabled = true;
                                    document.getElementById("surname").disabled = true;
                                    document.getElementById("street").disabled = true;
                                    document.getElementById("town").disabled = true;
                                    document.getElementById("county").disabled = true;
                                    document.getElementById("ppsNumber").disabled = true;
                                    document.getElementById("phoneNumber").disabled = true;
                                    document.getElementById("email").disabled = true;
                                    document.getElementById("jobTitle").disabled = true;
                                    document.getElementById("loginName").disabled = true;
                                }
                            }
                            function confirmCheck(){
                                var response;
                                response = confirm('Are you sure you want to save these changes?');
                                if (response){
                                    document.getElementById("firstName").disabled = false;
                                    document.getElementById("surname").disabled = false;
                                    document.getElementById("street").disabled = false;
                                    document.getElementById("town").disabled = false;
                                    document.getElementById("county").disabled = false;
                                    document.getElementById("ppsNumber").disabled = false;
                                    document.getElementById("phoneNumber").disabled = false;
                                    document.getElementById("email").disabled = false;
                                    document.getElementById("jobTitle").disabled = false;
                                    document.getElementById("loginName").disabled = false;
                                    return true;
                                }
                                else{
                                    populate();
                                    toggleLock();
                                    return false;
                                }
                            }
                        </script>
                        <br>

                        <!-- input for employee ID (disabled) -->
                        <label for="employeeID">Employee ID</label><br>
                        <input type='number' name='employeeID' id='employeeID' required readonly><br>;

                        <!-- input for first name (required) -->
                        <label for="firstName">First Name</label><br>
                        <input type="text" name="firstName" id="firstName" required disabled maxlength="32"><br>

                        <!-- input for surname (required) -->
                        <label for="surname">Surname</label><br>
                        <input type="text" name="surname" id="surname" required disabled maxlength="32"><br>

                        <!-- input for street (required) -->
                        <label for="street">Street</label><br>
                        <input type="text" name="street" id="street" required disabled maxlength="32"><br>

                        <!-- input for town (required) -->
                        <label for="town">Town</label><br>
                        <input type="text" name="town" id="town" required disabled maxlength="32"><br>
        
                        
                    </div>
                    <!-- right side of content box -->
                    <div class="content_box_right">

                        <!-- input for county (required) -->
                        <label for="county">County</label><br>
                        <select name="county" id="county" disabled>
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
                        </select><br>

                        <!-- input for pps number (required) -->
                        <label for="ppsNumber">PPS Number</label><br>
                        <input type="text" name="ppsNumber" id="ppsNumber" required disabled pattern="^\d{7}[A-Za-z]{1,2}$" title="Your PPS number should consist of 7 digits followed by 1 or 2 letters."><br>

                        <!-- input for phone number (required) -->
                        <label for="phoneNumber">Phone Number</label><br>
                        <input type="text" name="phoneNumber" id="phoneNumber" required disabled pattern="^\(?\d{3}\)?[- ]?\d{7}$" title="Please enter a valid phone number."><br>

                        <!-- input for email (required) -->
                        <label for="email">Email</label><br>
                        <input type="email" name="email" id="email" required disabled disabled><br>

                        <!-- job title (required) -->
                        <label for="jobTitle">Job Title</label><br>
                        <input type="text" name="jobTitle" id="jobTitle" required disabled maxlength="32"><br>

                        <!-- login name (required) -->
                        <label for="loginName">Login Name</label><br>
                        <input type="text" name="loginName" id="loginName" required disabled maxlength="32"><br>

                        <!-- buttons for submit and clear -->
                        <input class="content_box_button" type="submit" value="Save"/>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>