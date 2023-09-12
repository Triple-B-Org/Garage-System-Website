<!--
    Author: Group
    Date: 2023.02.16
-->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../Css/default.css">
        <title>Main Menu</title>
        <style>
            .content_box
            {
                border: 0px;
            }
        </style>
    </head>
    <body>
        <div class="nav_container">
            <div class="menu_box">
                <!-- this makes it so the logo brings you back to the main menu -->
                <img class="logo" onclick="location.href='main_menu.php'">
                <div class="menu_title">
                    Main Menu
                </div>
                <div class="menu_button" onclick="location.href='Bookings/bookings_menu.html'">
                    Bookings Menu
                </div>
                <div class="menu_button" onclick="location.href='Jobs/jobs_menu.html'">
                    Jobs Menu
                </div>
                <div class="menu_button" onclick="location.href='Employee/employee_menu.html'">
                    Employee Menu
                </div>
                <div class="menu_button" onclick="location.href='Stock_Control/stock_control_menu.html'">
                    Stock Control Menu
                </div>
                <div class="menu_button" onclick="location.href='Supplier_Accounts/supplier_accounts_menu.html'">
                    Supplier Accounts Menu
                </div>
                <div class="menu_button" onclick="location.href='File_Maintenance/file_maintenance_menu.html'">
                    File Maintenance Menu
                </div>
                <div class="menu_button" onclick="location.href='Reports/reports_menu.html'">
                    Reports Menu
                </div>
                <div class="menu_button" onclick="location.href='login_page.html'">
                    Quit
                </div>
            </div>
            <div class="content_box" style="font-size: 60px; position: absolute; left: 320px; top: 0px;">
                <?php if (ISSET($_SESSION['username'])) echo "Welcome, " . $_SESSION['username'] ?>
                <br>
                <input class="content_box_button" type="button" value="Change Password" onclick="location.href= 'old_password.html.php'">
            </div>
        </div>
    </body>
</html>