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
                    <form action="change_password.php" method="post">
                        <tr>
                        <?php
                                session_start();
                                // check if the session variable is set, if it is display an error when the passwords dont match
                                if (ISSET($_SESSION['match'])){
                                    if (!$_SESSION['match']){
                                        echo '<div style="color: red; font-size: 30px; font-style: bold; text-align: center; -webkit-text-stroke: 1px black;">
                                            Passwords must match
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
                                <!-- allow the user to input their new password  -->
                                <div class="input_div">
                                    <label for="new_password">New Password</label>
                                    <input type="password" id="new_password" name="new_password" required>
                                    <br>
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" name="confirm_password" id="confirm_password" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <!-- button to submit the form -->
                                <input class="login_button" id="loginButton" name="loginButton" type="Submit" value="Change password"></input>
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </body>
</html>