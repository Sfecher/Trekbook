<!-- 
"Copyright © 2020 World Wide Web Consortium, (MIT, ERCIM, Keio, Beihang). 
All Rights Reserved. http://www.w3.org/Consortium/Legal/2002/copyright-documents-20021231"
THIS DOCUMENT IS PROVIDED "AS IS," AND COPYRIGHT HOLDERS MAKE NO REPRESENTATIONS OR WARRANTIES, 
EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR  
PURPOSE, NON-INFRINGEMENT, OR TITLE; THAT THE CONTENTS OF THE DOCUMENT ARE SUITABLE FOR ANY PURPOSE; 
NOR THAT THE IMPLEMENTATION OF SUCH CONTENTS WILL NOT INFRINGE ANY THIRD PARTY PATENTS, COPYRIGHTS, 
TRADEMARKS OR OTHER RIGHTS.
-->
<?php 
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location: login.php");
    }

    include 'db-config.inc.php';

    $mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    $sql = 'select * from Location where username="'.$_SESSION["user"].'"'; 
    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel ="stylesheet" href="stylesheetMain.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="script.js"></script>
        <title>Trekbook</title>
        <link rel="icon" href="img/tb_trekbook-mark-transparent.png" type="image/x-icon">
    </head>
    <body>
        <?php 
            //US8
            include ("nav.php");
            echo '<div class="initWrapper">';
            //this is saying that if the result of the above sql query is greater than or equal to 1 row then we will do some work 
            if($result->num_rows >= 1){
                while($row= mysqli_fetch_assoc($result)){
                    //here we are placing the inforamtion that we got from the sql into html tags to be displayed
                    echo '<div class="wrapper">';
                    echo '<img id="locImage" src="'.$row["image"].'"style="width: 100%; height: 70%; border-radius: 30px 30px 0px 0px;">';
                    echo '<p id="name"> '.$row["location_name"].'</p>';
                    echo '<p id="address">'.$row["address"].'</p>';
                    $id = $row["id"];
                    echo '</div>';
                }
            }else{
                echo '<p>Sorry there are no locations to display</p>';
            }
            echo'</div>';
        ?>
    </body>
</html>
