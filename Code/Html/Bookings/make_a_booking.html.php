<!--
    Author: Adam Fitzpatrick
    ID: C00273365
    Date: 2023.03.15
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../../Css/default.css">
        <title>Make a Booking</title>

    </head>

    <body>
        <div class="nav_container">
            <div class="menu_box">
                <!-- this makes it so the logo brings you back to the main menu -->
                <img class="logo" onclick="location.href='../main_menu.php'">
                <div class="menu_title">
                    Make a Booking
                </div>
                <div class="menu_button" onclick="location.href='bookings_menu.html'" style="border-color: white;">
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
                <div class="sub_menu_button" onclick="location.href='make_a_booking.html'" style="border-color: white;">
                    Make a Booking
                </div>
                <div class="sub_menu_button" onclick="location.href='cancel_a_booking.html'">
                    Cancel a Booking
                </div>
            </div>
            <div class="content_box">
                <form class="context_box_form" action="make_a_booking.php" method="post">
                    <!-- Creates form for new Booking -->
                    <div class="content_box_left">
                        <label>Date</label>
                        <br>
                        <input type="date" id="booking_date" name="booking_date" value="<?php echo date('Y-m-d'); ?>" required>
                        <br>
                        <div class="content_box_report">
                            <?php
                                // include the connection file
                                include "../connection.php";

                                // check if the booking date is set in the post request
                                if (isset($_POST['booking_date'])) 
                                {
                                    // get the booking date from the post request
                                    $bookingDate = $_POST['booking_date'];

                                    // SQL query to retrieve bookings and customer information
                                    $sql = "SELECT Bookings.DateAndTime, Customer.FirstName 
                                            FROM Bookings 
                                            JOIN Customer ON Customer.CustomerID = Bookings.CustomerID 
                                            WHERE Customer.Deleted = 0";

                                    // execute the SQL query and check for errors
                                    $result = mysqli_query($con, $sql);
                                    if (!$result) 
                                    {
                                        die('Error in querying the database' . mysqli_error($con));
                                    }

                                    // Create an array of booked times
                                    $bookedTimes = array();
                                    while ($row = mysqli_fetch_assoc($result)) 
                                    {
                                        // extract the time portion of the date and add it to the array of booked times
                                        $bookedTimes[] = substr($row['DateAndTime'], 11, 5);
                                    }
                                }

                                // Generate the table rows for each time slot
                                echo "<table style='padding: 5px; width: 62%; margin:0px 50px 50px 0px'>
                                        <tr><th>Time</th><th>Customer</th></tr>";

                                // Array of possible timeslots
                                $timeslots = array(
                                    '9:00', '9:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30',
                                    '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00'
                                );

                                // Loop through each timeslot
                                foreach ($timeslots as $timeslot) 
                                {
                                    // Check if the current timeslot has been booked
                                    if (isset($bookedTimes) && in_array($timeslot, $bookedTimes)) 
                                    {
                                        // If it has been booked, retrieve the booking information from the database
                                        $sql = "SELECT Customer.FirstName 
                                                FROM Bookings 
                                                JOIN Customer ON Customer.CustomerID = Bookings.CustomerID 
                                                WHERE Customer.Deleted = 0 AND Bookings.DateAndTime LIKE '%$timeslot%'";

                                        $result = mysqli_query($con, $sql);
                                        if (!$result) 
                                        {
                                            die('Error in querying the database' . mysqli_error($con));
                                        }

                                        // Set customerName to the name of the customer who booked the timeslot
                                        $row = mysqli_fetch_assoc($result);
                                        $customerName = $row['FirstName'];
                                    } 
                                    else 
                                    {
                                        // Set customerName to 'Available' if the timeslot has not been booked
                                        $customerName = 'Available';
                                    }

                                    // Output the timeslot and customerName in a table row
                                    echo "<tr><td>$timeslot</td><td>$customerName</td></tr>";
                                }

                                echo "</table>";
                            ?>
                        </div>
                    </div>
    
                    <div class="content_box_right">
                        <label>Customer</label>
                        <br>
                        <?php
                            $sql = "SELECT * FROM Customer WHERE Deleted = 0";
                            if (!$result = mysqli_query($con, $sql)) 
                            {
                                die('Error in querying the database' . mysqli_error($con));
                            }

                            echo "<select id='booking_customer' name='booking_customer'>";
                            
                            while ($row = mysqli_fetch_array($result)) 
                            {
                                $CustomerID = $row['CustomerID'];
                                $FirstName = $row['FirstName'];
                                $Surname = $row['Surname'];
                                echo "<option value='$CustomerID'>$CustomerID - $FirstName $Surname</option>";
                            }

                            echo "</select>";
                            mysqli_close($con);
                        ?>

                        <!-- Add a hidden input field to store the selected customer ID -->
                        <input type="hidden" id="customer_id" name="customer_id">
                        <script>
                            // Get the booking customer select element
                            const bookingCustomerSelect = document.getElementById('booking_customer');
                            // Get the customer ID input field
                            const customerIDInput = document.getElementById('customer_id');
                            // Add an event listener to the booking customer select element
                            bookingCustomerSelect.addEventListener('change', (event) => 
                            {
                                // Get the selected option value
                                const selectedOptionValue = event.target.value;
                                // Set the selected customer ID to the input field value
                                customerIDInput.value = selectedOptionValue;
                            });
                        </script>
                        <br>

                        <label>Select Time </label>
                        <br>
                        <select id = "time_select" name="time_select">
                            <option>9:00</option>
                            <option>9:30</option>
                            <option>10:00</option>
                            <option>10:30</option>
                            <option>11:00</option>
                            <option>11:30</option>
                            <option>12:00</option>
                            <option>12:30</option>
                            <option>13:00</option>
                            <option>13:30</option>
                            <option>14:00</option>
                            <option>14:30</option>
                            <option>15:00</option>
                            <option>15:30</option>
                            <option>16:00</option>
                            <option>16:30</option>
                            <option>17:00</option>
                        </select>

                        <input class="content_box_button" type="submit" value="Confirm"></input>
                    </div>
                </form>
                </p>
            </div>
        </div>
    </body>
</html>