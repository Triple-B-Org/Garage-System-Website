<!--
   Author: Adam Fitzpatrick
   ID: C00273365
   Date: 2023.03.14
   -->
   <!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="stylesheet" href="../../Css/default.css">
      <title>Receive Deliveries</title>
      <script>
      function populate()
      {   
         var sel = document.getElementById("order_listbox");
         var result;
         result = sel.options[sel.selectedIndex].value;
         var orderDetails = result.split(',');

         document.getElementById("supplier_name").value = orderDetails[1];

         document.getElementById("order_id").value = orderDetails[9];
         document.getElementById("order_date").value = orderDetails[10];
         document.getElementById("order_quantity").value = orderDetails[];
         
      }
   </script>
   </head>
   <body>
      <div class="nav_container">
         <div class="menu_box">
            <!-- this makes it so the logo brings you back to the main menu -->
            <img class="logo" onclick="location.href='../main_menu.php'">
            <div class="menu_title">
               Receive Deliveries
            </div>
            <div class="menu_button" onclick="location.href='../Bookings/bookings_menu.html'">
               Bookings Menu
            </div>
            <div class="menu_button" onclick="location.href='../Jobs/jobs_menu.html'">
               Jobs Menu
            </div>
            <div class="menu_button" onclick="location.href='../Employee/employee_menu.html'">
               Employee Menu
            </div>
            <div class="menu_button" onclick="location.href='stock_control_menu.html'" style="border-color: white;">
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
            <div class="sub_menu_button" onclick="location.href='reorder_stock.html'">
               Reorder Stock
            </div>
            <div class="sub_menu_button" onclick="location.href='receive_deliveries.html'" style="border-color: white;">
               Receive Deliveries
            </div>
         </div>
         <div class="content_box">
            <form class="context_box_form" action="add_a_new_customer.php" method="post" onsubmit=" return confirmCheck()">
               <!-- Creates form for deliveries -->
               <div class="content_box_left">
                  <label> Order ID </label>
                  <br>
                  <?php
                     include "../connection.php";

                     $sql = "SELECT * 
                  FROM Supplier 
                  JOIN `Order` 
                  ON Supplier.SupplierID = `Order`.SupplierID
                  WHERE `Order`.OrderCompleted = 0 
                  ORDER BY `Order`.OrderID";

                     if (!$result = mysqli_query($con, $sql))
                     {
                        die('Error in querying the database' . mysqli_error($con));
                     }

                     echo "<select id = 'order_listbox' name='order_listbox' onclick='populate()'>";

                     while ($row = mysqli_fetch_array($result))
                     {
                        $orderID = $row['OrderID'];
                        $quantityOrdered = $row['QuantityOrdered'];

                        $orderDate = date_create($row['OrderDate']);
                        $orderDate = date_format($orderDate, "Y-m-d");

                        $supplierName = $row['SupplierName'];
                        $supplierAddress = $row['Street'].", ".$row['Town'].", ".$row['County'];

                        $allSupp = "$orderID,$orderDate,$quantityOrdered,$supplierName,$supplierAddress";

                        echo "<option id= 'order_id' value='$allSupp' script='populate()'>$orderID</option>";
                     }

                     echo "</select>";
                  ?>
                  <br>
                  
                  <label> Order Date </label>
                  <br>
                  <input type='date' id = 'order_date' disabled>
                  <br>

                  <label> Supplier </label>
                  <br>
                  <input type='text' id='supplier_name' disabled>
                  <br>

                  <label> Supplier Address </label>
                  <br>
                  <input type='text' id='supplier_address' disabled>

               </div>

               <div class="content_box_right">
                  <label> Order Details </label>
                  <br>
                  <table>
                     <tr>
                        <td> Item </td>
                        <td> Description </td>
                        <td> Quantity </td>
                     </tr>

                  <?php
                     while ($row = mysqli_fetch_array($result))
                     {
                        echo "<tr><td id = 'item_name'>$itemName</td><td id = 'item_description'>$itemDescription</td><td id = 'quantity_ordered'>$quantityOrdered</td></tr>";
                     }
                  ?>

                  </table>
               </div>
            </form>
         </div>
      </div>
   </body>
</html>