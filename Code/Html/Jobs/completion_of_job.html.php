<!--
    Author: Qadeer Hussain
    ID: C00270632
    Date: 2023.03.18
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../../Css/default.css">
        <title>Completion of Job</title>
        <script>
            // Confirmation 
            function confirmCheck()
            {   
                response = confirm('Are you sure you want to add this record ');
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
                    Completion of Job
                </div>
                <div class="menu_button" onclick="location.href='../Bookings/bookings_menu.html'">
                    Bookings Menu
                </div>
                <div class="menu_button" onclick="location.href='jobs_menu.html'" style="border-color: white;">
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
                <div class="menu_button" onclick="location.href='../Reports/rereports_menu.html'">
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
                <div class="sub_menu_button" onclick="location.href='initiation_of_job.html.php'">
                    Initiation of Job
                </div>
                <div class="sub_menu_button" onclick="location.href='completion_of_job.html.php'" style="border-color: white;">
                    Completion of Job
                </div>
            </div>
            <div class="content_box">
                <div form="content_box_form">
                    <form action="completion_of_job.php" method="post" onsubmit="return confirmCheck()">
                         <!-- Left box with content -->
                         <div class="content_box_left">
                            <!-- Dropdown for Customer/Job -->
                            <label for="Customer">Select Job</label>
                            <?php include "select_job.php" ?>
                            <br>
                            <!-- Time Taken -->
                            <label for="timeTaken">Time Taken</label>
                            <br>
                            <input type="time" id="timeTaken" name="timeTaken"> 
                            <br>
                            <!-- Work Done -->
                            <label for="workDone">Work done</label>
                            <br>
                            <textarea name="workDone" id="workDone" rows="4" cols="30"></textarea>
                        </div>
                         <!-- Right box with content -->
                        <div class="content_box_right">
                            <!-- StockID -->
                            <label for="stockID">Stock ID</label>
                            <br>
                            <input type="text" id="stockID" name="stockID">
                            <br>
                            <!-- Quantity -->
                            <label for="quantity">Quantity</label>
                            <br>
                            <input type="text" id="quantity" name="quantity">

                            <!-- Add button -->
                            <input class ="content_box_button" type="submit" value="Add">
                            <!-- Clear text box fields -->
                            <input class ="content_box_button" type="reset" value="Clear">
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </body>
</html>