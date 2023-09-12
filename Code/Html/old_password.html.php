<!--
    Author: Kelan Morgan
    ID:     C00262090
    Date:   2023.03.13
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../Css/default.css">
        <title>Login</title>
        <style>
            .login_box 
            {
                background-image:  url("../Css/images/gradient_turned.png");
                background-size: 100% 200%;
                background-position: 0px -100px;
                margin: auto;
                width: 400px;
                border: 5px black solid;
                border-radius: 20px;
                padding: 10px;
                font-weight: bold;
                font-size: 20px;
            }
            .logo
            {
                cursor: auto;
            }
            .input_div
            {
                margin-left: 10px;
            }
            .input_div > input
            {
                margin-bottom: 10px;
            }
            .login_button
            {
                font-size: 20px; 
                width: 200px; 
                margin: auto;
                margin-top: 10px;
                margin-left: 10px;
                border: 3px black solid;
                border-radius: 20px;
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <div class="nav_container">
            <div class ="login_box">
                <table>
                    <form action="old_password_check.php" method="post">
                        <tr>
                            <?php
                                session_start();
                                // if the users password is wrong display the error message
                                if (isset($_SESSION['old_wrong'])){
                                    if($_SESSION['old_wrong'])
                                    {
                                        echo '<div style="color: red; font-size: 30px; font-style: bold; text-align: center; -webkit-text-stroke: 1px black;">
                                            Incorect Password
                                            </div>';
                                    }
                                }
                            ?>
                        </tr>
                        <tr>
                            <td rowspan="2">
                                <img class="logo">
                            </td>
                            <td>
                                <div class="input_div">
                                    <label for="old_password">Old Password</label>
                                    <input type="password" id="old_password" name="old_password" autofocus required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="login_button" id="confirm_password" name="confirm_password" type="Submit" value="Confirm"></input>
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </body>
</html>