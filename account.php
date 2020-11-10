<!-- 
"Copyright © 2020 World Wide Web Consortium, (MIT, ERCIM, Keio, Beihang). 
All Rights Reserved. http://www.w3.org/Consortium/Legal/2002/copyright-documents-20021231"
THIS DOCUMENT IS PROVIDED "AS IS," AND COPYRIGHT HOLDERS MAKE NO REPRESENTATIONS OR WARRANTIES, 
EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR  
PURPOSE, NON-INFRINGEMENT, OR TITLE; THAT THE CONTENTS OF THE DOCUMENT ARE SUITABLE FOR ANY PURPOSE; 
NOR THAT THE IMPLEMENTATION OF SUCH CONTENTS WILL NOT INFRINGE ANY THIRD PARTY PATENTS, COPYRIGHTS, 
TRADEMARKS OR OTHER RIGHTS.
-->
<?php session_start();
    if(!isset($_SESSION["user"])){
        header("Location: login.php");
    }
    include 'functions.php';
    $mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
    $sql = "SELECT * FROM profile";
    $res = $mysqli->query($sql);
    $prof = $res->fetch_assoc();
?>
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
            <form method = "post" action = "account.php">
                <label class="label" for="name">NAME</label>
                <input class="input" type="text" name="name" id="name" placeholder="Name..." value="<?php echo $prof["name"]; ?>">
                <label class="label" for="email">EMAIL</label>
                <input class="input" type="text" name="email" id="email" placeholder="Email..." value="<?php echo $prof["email"]; ?>">
                <label class="label" for="npass">NEW PASSWORD</label>
                <input class="input" type="password" name="npass" id="npass" placeholder="New Password...">
                <label class="label" for="vpass">VERIFY PASSWORD</label>
                <input class="input" type="password" name="vpass" id="vpass" placeholder=" Retype Password...">
                <br>
                <?php
                    updateUsername($_POST["name"], $_SESSION["user"]);
                    updateEmail($_POST["email"], $_SESSION["user"]);
                    updatePassword($_POST["npass"], $_POST["vpass"], $_SESSION["user"]);
                ?>
                <br>
                <input type="submit" id="login" class="btn btn-primary btn-lg active btn-rounded" value="SAVE CHANGES">
                <br>
            </form>
        </div>
    </div>
    </body>
</html>
