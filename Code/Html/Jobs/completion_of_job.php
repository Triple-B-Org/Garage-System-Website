<!--
    Author: Qadeer Hussain
    ID: C00270632
    Date: 2023.03.18
-->
<?php

    include "../connection.php";

    //Posting values
    $TimeTaken=$_POST['TimeTaken'];
    $WorkDone=$_POST['workDone'];

    //Inserts data into Jobs table
    $sql = "INSERT INTO Jobs (TimeTaken, WorkDone)
    VALUES ('$TimeTaken', 
            '$WorkDone')";
 
if (!mysqli_query($con,$sql))
{
    echo "Error ".mysqli_error($con);
}
else 
{
    mysqli_close($con);
    header('Location: completion_of_job.html.php');
}
mysqli_close($con);
?>