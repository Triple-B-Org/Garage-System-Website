<!--
    Author: Qadeer Hussain
    ID: C00270632
    Date: 2023.03.18
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../../Css/default.css">
        <title>Initiation of Job</title>
        <style>
            /* Top margin for the table */
            .content_box_report
            {
                margin: 20px 0px 0px 0px;
            }
            /* Move the content box left up closer to the table leaving a small gap of 5 pixels */
            .content_box_left
            {
                margin-top: 5px;
            }
              /* Move the content box right up closer to the table leaving a small gap of 5 pixels */
            .content_box_right
            {
                margin-top: 5px;
            }
        </style>
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
                    Initiation of Job
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
                <div class="sub_menu_button" onclick="location.href='initiation_of_job.html.php'" style="border-color: white;">
                    Initiation of Job
                </div>
                <div class="sub_menu_button" onclick="location.href='completion_of_job.html.php'">
                    Completion of Job
                </div>
            </div>
            <div class="content_box">
                <div form="content_box_form">
                    <form action="print_job_cards.html.php" method="post" onsubmit="return confirmCheck()">
                        <!-- Report box with content -->
                        <div class="content_box_report">
                            <?php
                                include "../connection.php";

                                // Selectr the Customer ID from Customer table and Inner join it with Bookings table Customer ID and and get the customer for todays date
                                $sql = "SELECT * FROM Customer INNER JOIN Bookings ON Bookings.CustomerID = Customer.CustomerID AND DATE(Bookings.DateAndTime)=CURDATE();";

                                $result = mysqli_query($con, $sql);

                                if (!$result) {
                                    echo "Error: " . mysqli_error($con);
                                } else {
                                    // Table generation
                                    echo "<table>"; 
                                    echo "<tr><th>Customer Name</th><th>Customer Address</th></tr>";
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $FirstName = $row['FirstName'];
                                        $Surname = $row['Surname'];
                                        $Street = $row['Street'];
                                        $Town = $row['Town'];
                                        echo "<tr><td>" . $FirstName . " " . $Surname . "</td><td>" . $Street . ", " . $Town . "</td></tr>";
                                    }
                                    echo "</table>";
                                }
                            ?>
                        </div>
                        <!-- Left box with content -->
                        <div class="content_box_left">
                            <!-- Drop down for the customer -->
                            <label for="Customer">Select Customer</label>
                            <?php include "select_customer_bookings.php" ?>
                            <br>
                            <!-- Job ID increment it by 1 everytime a new entry is entered -->
                            <label for="JobID">JobID</label>
                            <br>
                            <?php
                                include "../connection.php";
                                
                                //Checks the SupplierID value and increases it by one
                                $sql = "SELECT MAX(JobID) as maxID FROM Jobs";
                                $result = mysqli_query($con,$sql);
                                $row = mysqli_fetch_assoc($result);
                                $maxID = $row['maxID'] + 1;

                                $JobID=$maxID;
                                echo "<br>";
                                echo "<input type='text' name='JobID' id='JobID' value='$JobID' required disabled>";

                                mysqli_close($con)
                            ?>
                            <br>
                            <!-- Model of Car -->
                            <label for="modelOfCar">Model Of Car</label>
                            <br>
                            <input type="text" id="modelOfCar" name="modelOfCar" required> 
                            <br>
                            <!-- Reg number -->
                            <label for="regNumber">Registration Number</label>
                            <br>
                            <input type="text" id="regNumber" name="regNumber" required> 
                        </div>
                         <!-- Right box with content -->
                        <div class="content_box_right">
                            <!-- Current Mileage -->
                            <label for="currentMileage">Current Mileage</label>
                            <br>
                            <input type="number" id="currentMileage" name="currentMileage" required>
                            <br>
                            <!-- Details -->
                            <label for="details">Detail</label>
                            <br>
                            <textarea name="details" id="details" rows="3" cols="25" required></textarea>
                            <br>
                            <!-- Job Type -->
                            <label for="jobType">Job type</label>
                            <br>
                            <input type="text" id="jobType" name="jobType" required>

                            <!-- Print Job cards add the infirmation to table and goes to the Print jobcards page -->
                            <input class ="content_box_button" type="submit" value="Print Job Card" >
                            <!-- Clear text box fields -->
                            <input class ="content_box_button" type="reset" value="Clear">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>