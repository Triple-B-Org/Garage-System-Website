<!--
    Author: Kelan Morgan
    ID:     C00262090
    Date:   2023.03.13
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../../Css/default.css">
        <title>Add Employee</title>
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
        </style>
        <script>
            function confirmCheck()
            {
                var response = confirm('Are you sure you want to add a new employee?\nEmployee ID: ' + document.getElementById("employeeID").value);
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
                    Add Employee
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
                <div class="sub_menu_button" onclick="location.href='add_new_employee.html.php'" style="border-color: white;">
                    Add Employee
                </div>
                <div class="sub_menu_button" onclick="location.href='delete_employee.html.php'">
                    Delete Employee
                </div>
                <div class="sub_menu_button" onclick="location.href='amend_view_employee.html.php'">
                    Amend/View Employee
                </div>
            </div>
            <!-- box for contents of the page -->
            <div class="content_box">
                <form action="add_new_employee.php" method="post" onsubmit="return confirmCheck()">
                    <!-- left side of content box -->
                    <div class="content_box_left">
                        <!-- input for employee ID (disabled) -->
                        <label for="employeeID">Employee ID</label><br>
                        <?php
                            include "../connection.php";
                            $sql = "SELECT MAX(employeeID) FROM Employee;";
                        
                            if (!$result = mysqli_query($con, $sql))
                            {
                                die('Error ' . mysqli_error($con));
                            }
                        
                            if (mysqli_affected_rows($con) == 0)
                            {
                                echo "<input type='number' name='employeeID' id='employeeID' value='1' required readonly><br>";
                            }
                            else
                            {
                                $previousID = mysqli_fetch_array($result)[0];
                                
                                $newID = $previousID + 1;
                                echo "<input type='text' name='employeeID' id='employeeID' value='$newID' required readonly><br>";
                            }

                            mysqli_close($con);
                        ?>

                        <!-- input for first name (required) -->
                        <label for="firstName">First Name</label><br>
                        <input type="text" name="firstName" id="firstName" required maxlength="32"><br>

                        <!-- input for surname (required) -->
                        <label for="surname">Surname</label><br>
                        <input type="text" name="surname" id="surname" required maxlength="32"><br>

                        <!-- input for street (required) -->
                        <label for="street">Street</label><br>
                        <input type="text" name="street" id="street" required maxlength="32"><br>

                        <!-- input for town (required) -->
                        <label for="town">Town</label><br>
                        <input type="text" name="town" id="town" required maxlength="32"><br>
        
                        <!-- input for county (required) -->
                        <label for="county">County</label><br>
                        <select name="county">
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
                    </div>
                    <!-- right side of content box -->
                    <div class="content_box_right">
                        <!-- input for pps number (required) -->
                        <label for="ppsNumber">PPS Number</label><br>
                        <input type="text" name="ppsNumber" id="ppsNumber" required pattern="^\d{7}[A-Za-z]{1,2}$" title="Your PPS number should consist of 7 digits followed by 1 or 2 letters."><br>

                        <!-- input for phone number (required) -->
                        <label for="phoneNumber">Phone Number</label><br>
                        <input type="text" name="phoneNumber" id="phoneNumber" required pattern="^\(?\d{3}\)?[- ]?\d{7}$" title="Please enter a valid phone number."><br>

                        <!-- input for email (required) -->
                        <label for="email">Email</label><br>
                        <input type="email" name="email" id="email" required><br>

                        <!-- job title (required) -->
                        <label for="jobTitle">Job Title</label><br>
                        <input type="text" name="jobTitle" id="jobTitle" required maxlength="32"><br>

                        <!-- login name (required) -->
                        <label for="loginName">Login Name</label><br>
                        <input type="text" name="loginName" id="loginName" required maxlength="32"><br>

                        <!-- password (required) -->
                        <label for="password">Password</label><br>
                        <input type="password" name="password" id="password" required maxlength="32">

                        <!-- buttons for submit and clear -->
                        <input class="content_box_button" type="submit" value="Add"/>
                        <input class="content_box_button" type="reset" value="Clear"/>

                       
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>