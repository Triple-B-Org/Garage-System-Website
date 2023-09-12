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
                width: 80px; 
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
        <?php
        session_start();
        // check if the user is out of attempts
        if($_SESSION['attempts'] >= 3){
            // go to out of attempts page
            header("Location: out_of_attempts.html");
            exit();
        }
        ?>
        <div class="nav_container">
            <div class ="login_box">
                <table>
                    <form action="login.php" method="post">
                        <tr>
                            <!-- display the error message -->
                            <div style="color: red; font-size: 30px; font-style: bold; text-align: center; -webkit-text-stroke: 1px black;">
                                Username or password is incorrect!
                            </div>
                        </tr>
                        <tr>
                            <td rowspan="2">
                                <img class="logo">
                            </td>
                            <td>
                                <!-- allow the user to input username and password -->
                                <div class="input_div">
                                    <label for="username">Username:</label>
                                    <input type="text" id="username" name="username" autofocus required>
                                    <br>
                                    <label for="password">Password:</label>
                                    <input type="password" id="password" name="password" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="login_button" id="loginButton" name="loginButton" type="Submit" value="Login"></input>
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </body>
</html>