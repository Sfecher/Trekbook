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
        <link rel ="stylesheet" href="stylesheetMain.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="script.js"></script>
        <title>Trekbook</title>
        <link rel="icon" href="img/tb_trekbook-mark-transparent.png" type="image/x-icon">
    </head>
    <body>
        <div class="mobile-container">

            <!-- Top Navigation Menu -->
            <div class="topnav">
                <a href="home.php" class="active"><img src = "img/tb_trekbook-logo-vertical.png" alt = "Trekbook logo" width="60" height="35"></a>
                <div id="myLinks"> <!--this is the set of links that will be used in the hamburger bar. -->
                    <a href="account.php" class="navLinks">ACCOUNT</a>
                    <a href="#contact" class="navLinks">ADD NEW LOCATION</a>
                    <a href="#about" class="navLinks">FILTER</a>
                </div>
                <a href="javascript:void(0);" class="icon" onclick="hamburgerBar()">
                    <!-- this is refering to a stylesheet that includes images/icons -->
                    <i class="fa fa-bars"></i>
                </a>
                <!--this is a link to the users account. -->
                <a href="account.php" class="active image"><img src = "img/accountImage.png" alt = "Trekbook logo" width="40" height="35"> </a>   
            </div>
            <!-- End smartphone / tablet look -->
        </div>

        <br>
        <!-- creating a form that the user will be able to insert information into. -->
        <form method = "post" action = "home.php" id="filter">
            <label class="label" for="location"><img src="img/tb_location.png" alt="location pin" class="newImg">Location</label> <br>
            <input class="input" type="text" name="location" id="location" placeholder="Location..."><br>
            <label class="label" for="category"><img src="img/tb_category.png" alt="star in a circle" class="newImg">Category</label> <br>
            <input type="image" class="image" alt="food or drink" src="img/button_food_drink_grey.png">
            <input type="image" class="image" alt="food or drink" src="img/button_shopping_grey.png">
            <input type="image" class="image" alt="food or drink" src="img/button_landmark_grey.png">
            <input type="image" class="image" alt="food or drink" src="img/button_recreation_grey.png">
            <input type="image" class="image" alt="food or drink" src="img/button_lodging_grey.png">
            <label class="label" for="tags"><img src="img/tb_list.png" alt="check box image" class="newImg">Tags</label> <br>
            <label class="label" for="note"><img src="img/tb_comment.png" alt="message bubble" class="newImg">Note</label> <br>
            <input class="input" type="text" name="note" id="note" placeholder="Add a note..."><br>
            <input type ="submit" id = "submit" class="btn btn-primary btn-lg active btn-rounded submit" value= "LOG IT" onclick="clickFunction()">
        </form>
    </body>
</html>
