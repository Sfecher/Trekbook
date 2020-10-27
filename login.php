<!-- 
"Copyright © 2020 World Wide Web Consortium, (MIT, ERCIM, Keio, Beihang). 
All Rights Reserved. http://www.w3.org/Consortium/Legal/2002/copyright-documents-20021231"
THIS DOCUMENT IS PROVIDED "AS IS," AND COPYRIGHT HOLDERS MAKE NO REPRESENTATIONS OR WARRANTIES, 
EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR  
PURPOSE, NON-INFRINGEMENT, OR TITLE; THAT THE CONTENTS OF THE DOCUMENT ARE SUITABLE FOR ANY PURPOSE; 
NOR THAT THE IMPLEMENTATION OF SUCH CONTENTS WILL NOT INFRINGE ANY THIRD PARTY PATENTS, COPYRIGHTS, 
TRADEMARKS OR OTHER RIGHTS.
-->
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <link rel ="stylesheet" href="stylesheet.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <title>Trekbook</title>
        <link rel="icon" href="img/tb_trekbook-mark-transparent.png" type="image/x-icon">
    </head>
    <body>
        <div class = "main">
        <div class = "wrapper">
            <br>
            <img src = "img/tb_trekbook-logo-vertical.png" alt = "Trekbook logo">
            <br>
            <p>A Personalized Travel Log</p>
            <br>
            <form method = "post" action = "login.php">
                <label class="label" for="user">USERNAME</label>
                <input class="input" type="text" name="user" id="user" placeholder="Username...">
                <br>
                <br>
                <label class="label" for="pass">PASSWORD</label>
                <input class="input" type="password" name="pass" id="pass" placeholder="Password...">
                <?php
                    //Opening up a connection to the databse
                    $mysqli = new mysqli($host = "localhost", $user = "root", $password = "root", $db = "trekbook");
                    if ($mysqli->connect_errno) {
                        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                    }
                    //setting up variables for the username and password inputs
                    $usern = $_POST["user"];
                    $pass = $_POST["pass"];
                    //The if statment checks if username and password is set.
                    if(isset($usern) && isset($pass)){
                        //This is setting up a sql statment then setting the username and password as strings.
                        $sql = "SELECT * FROM users WHERE username LIKE ? AND password LIKE ?";
                        $stmt = $mysqli->prepare($sql);
                        $stmt->bind_param("ss", $usern, $pass);
                        //It is now executing the statment with the user name and password and getting the result.
                        $stmt->execute();
                        $result = $stmt->get_result();
                        //It is checking if the result's rows are greater than or equal to 1 and if it is not it will display a message
                        if($result->num_rows >= 1){
                            header("Location: http://localhost:8888/trekbook/home.php");
                            exit();
                        }else{
                            print "<p style='color:red; font-size:13px; font-family:Museo Sans;'>USERNAME OR PASSWORD IS INCORRECT</p>";
                        }
                    }
                ?>
                <a id = "link" href = "forgotPass.html">FORGOT PASSWORD</a>
                <br>
                <input type ="submit" id = "login" class="btn btn-primary btn-lg active btn-rounded" value= "LOGIN">
                <br>
                <a id = "link" href = "forgotPass.html">CREATE NEW USER</a>
            </form>
        </div>
    </div>
    </body>
</html>
