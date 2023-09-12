<!--
    Author: Qadeer Hussain
    ID: C00270632
    Date: 2023.03.18
-->
<?php
    include "../connection.php";

    //Posting values
    $ModelOfCar=$_POST['modelOfCar'];
    $RegNumber=$_POST['regNumber'];
    $CurrentMileage=$_POST['currentMileage'];
    $Details=$_POST['details'];
    $JobType=$_POST['jobType'];

    //Checks the JobID value and increases it by one
    $sql = "SELECT MAX(JobID) as maxID FROM Jobs";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    $maxID = $row['maxID'] + 1;
    $JobID=$maxID;

    //Inserts data into Jobs table
    $sql = "INSERT INTO Jobs (JobID, ModelOfCar, RegNumber, CurrentMileage, Details, JobType)
    VALUES ('$JobID', 
            '$ModelOfCar', 
            '$RegNumber', 
            '$CurrentMileage', 
            '$Details',
            '$JobType')";
 
if (!mysqli_query($con,$sql))
{
    echo "Error ".mysqli_error($con);
}
else 
{
    if(mysqli_affected_rows($con)!=0)
    {
        echo 
            "<script>
                alert ('A new record has been added to the Jobs table');
            </script>";
    }
}
mysqli_close($con);
?>
</form>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../../Css/default.css">
        <title>Print Job Cards</title>
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
                    Print Job Cards
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
                <div class="sub_menu_button" onclick="location.href='initiation_of_job.html.php'">
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
                    <form action="initiation_of_job.html.php" method="post" onsubmit="return confirmCheck()">
                        <!-- Left box with content -->
                        <div class="content_box_left">
                            <!-- Jobs and generate the information after it was entered from previous screen-->
                            <label for="JobID">JobID</label>
                            <br>
                            <input type="text" id="JobID" name="JobID" value="<?php echo $JobID; ?>" disabled> 
                            <br>
                            <!-- Model Of Car and generate the information after it was entered from previous screen-->
                            <label for="modelOfCar">Model Of Car</label>
                            <br>
                            <input type="text" id="modelOfCar" name="modelOfCar" value="<?php echo $ModelOfCar; ?>"  disabled> 
                            <br>
                            <!-- Reg Number and generate the information after it was entered from previous screen-->
                            <label for="regNumber">Registration Number</label>
                            <br>
                            <input type="text" id="regNumber" name="regNumber" value="<?php echo $RegNumber; ?>" disabled> 
                            <br>
                            <!-- Current Mileage and generate the information after it was entered from previous screen-->
                            <label for="currentMileage">Current Mileage</label>
                            <br>
                            <input type="text" id="currentMileage" name="currentMileage" value="<?php echo $CurrentMileage; ?>" disabled>
                        </div>
                         <!-- Right box with content -->
                        <div class="content_box_right">
                            <!-- Details and generate the information after it was entered from previous screen-->
                            <label for="details">Detail</label>
                            <br>
                            <textarea name="details" id="details" rows="4" cols="30" disabled><?php echo $Details; ?></textarea>
                            <br>
                            <!-- Job Type and generate the information after it was entered from previous screen-->
                            <label for="jobType">Job type</label>
                            <br>
                            <input type="text" id="jobType" name="jobType" value="<?php echo $JobType; ?>" disabled>
                            <br>
                            <!-- Parts Used -->
                            <label for="partsUsed">Parts Used</label>
                            <br>
                            <input type="text" id="partsUsed" name="partsUsed">
                            <br>
                            <!-- Quantity -->
                            <label for="quantity">Quantity</label>
                            <br>
                            <input type="text" id="quantity" name="quantity">

                            <input class ="content_box_button" type="submit" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>