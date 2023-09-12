<!--
    Author: Qadeer Hussain
    ID: C00270632
    Date: 2023.03.18
-->
<?php
    include "../connection.php";//database connections

    // Select the Job ID, Model of Car and the Reg Number
    $sql = "SELECT JobID, ModelOfCar, RegNumber FROM Jobs;";

    if (!$result=mysqli_query($con,$sql))
    {
        die('Error in querying the database' . mysqli_error($con));
    }

    echo "<br><select name='select_job' id ='select_job'>";

    while ($row=mysqli_fetch_array($result))
    {
        // Customer Details
        $JobID=$row['JobID'];
        $ModelOfCar=$row['ModelOfCar'];
        $RegNumber=$row['RegNumber'];
        $allText = "$JobID,$ModelOfCar,$RegNumber";
        echo "<option value='$allText'>$JobID,$ModelOfCar,$RegNumber</option>";
    }
    echo "</select>";
    mysqli_close($con);

?>