<?php
    include "../connection.php";

    // Posting Values
    $booking_date = $_POST["booking_date"];
    $time_select = $_POST["time_select"];
    $customer_id = $_POST["customer_id"];

    // Get the maximum Booking ID value from the Bookings table
    echo "$time_select";
    $sql = "SELECT MAX(BookingID) AS prevBookID FROM Bookings";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $prevBookID = $row['prevBookID'];

    // Calculate the new BookingID value
    $booking_id = $prevBookID + 1;

    // Combine the date and time into a single datetime string
    $date_and_time = $booking_date . " " . date('H:i:s', strtotime($time_select));

    // Insert the booking information into the bookings table
    $sql = "INSERT INTO Bookings (BookingID, DateAndTime, CustomerID) VALUES ('$booking_id', '$date_and_time', '$customer_id')";

    if (!mysqli_query($con, $sql)) 
    {
        echo "Error " . mysqli_error($con);
    } 

    else 
    {
        // Script to create alert with confirmation of booking creation
        echo "<script>
        alert('Booking $booking_id has been created.');
        window.location = 'make_a_booking.html.php';
        </script>";
    }
?>