<!--
    Author: Kelan Morgan
    ID:     C00262090
    Date:   2023.03.13
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../../Css/default.css">
        <title>Delete Employee</title>
        <style>
            /* sets it as there are four buttons */
            .sub_menu_button 
            {
                width: 20%;
            }
        </style>
        <script>
            function confirmCheck()
            {
                var select = document.getElementById("selectEmployee");
                var result = select.options[select.selectedIndex].value;
                var details = result.split(", ");
                var response = confirm('Are you sure you want to delete this employee?\nEmployee: ' + details[0] + " - " + details[1] + " " + details[2]);
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
                    Delete Employee
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
                <div class="sub_menu_button" onclick="location.href='delete_employee.html.php'" style="border-color: white;">
                    Delete Employee
                </div>
                <div class="sub_menu_button" onclick="location.href='amend_view_employee.html.php'">
                    Amend/View Employee
                </div>
            </div>
            <div class="content_box">
            <form action="delete_employee.php" method="post" onsubmit="return confirmCheck()">
                    <!-- left side of content box -->
                    <div class="content_box_left">
                        <!-- dropdown for employee ID and name -->
                        <label for="employeeIDAndName">Select Employee</label>
                        <?php include "select_employee.php" ?>

                        <script>
                            // populates the form
                            function populate(){
                                var select = document.getElementById("selectEmployee");
                                var result = select.options[select.selectedIndex].value;
                                var details = result.split(", ");

                                document.getElementById("street").value = details[3];
                                document.getElementById("town").value = details[4];
                                document.getElementById("county").value = details[5];
                                document.getElementById("ppsNumber").value = details[6];
                                document.getElementById("phoneNumber").value = details[7];
                                document.getElementById("email").value = details[8];
                                document.getElementById("jobTitle").value = details[9];
                                document.getElementById("loginName").value = details[10];
                            }
                        </script>
                        <br>

                        <!-- display street -->
                        <label for="street">Street</label><br>
                        <input type="text" name="street" id="street" readonly><br>

                        <!-- display town -->
                        <label for="town">Town</label><br>
                        <input type="text" name="town" id="town" readonly><br>
        
                        <!-- display county -->
                        <label for="county">County</label><br>
                        <input type="text" name="county" id="county" readonly><br>

                        <!-- display ppsn -->
                        <label for="ppsNumber">PPS Number</label><br>
                        <input type="text" name="ppsNumber" id="ppsNumber" readonly><br>
                    </div>
                    <!-- right side of content box -->
                    <div class="content_box_right">
                        <!-- display phone number -->
                        <label for="phoneNumber">Phone Number</label><br>
                        <input type="text" name="phoneNumber" id="phoneNumber" readonly><br>

                        <!-- display email -->
                        <label for="email">Email</label><br>
                        <input type="email" name="email" id="email" readonly><br>

                        <!-- display job title -->
                        <label for="jobTitle">Job Title</label><br>
                        <input type="text" name="jobTitle" id="jobTitle" readonly><br>

                        <!-- display login name -->
                        <label for="loginName">Login Name</label><br>
                        <input type="text" name="loginName" id="loginName" readonly><br>

                        <!-- buttons for DELETE -->
                        <input class="content_box_button" type="submit" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>