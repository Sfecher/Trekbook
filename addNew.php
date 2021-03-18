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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        <form enctype="multipart/form-data" method = "post" action="home.php" id="filter">
            <div id="form">
                <label class="label" for="location"><img src="img/raws/tb_location.png" alt="location pin" class="newImg">Location Address</label> <br>
                <div class="inputs">
                    <input class="input" type="text" name="location" id="location" placeholder="Address..."><br><br>
                </div>

                <!-- US7:2 -->
                <label class="label" for="editName"><img src="img/raws/tb_edit.png" alt="image of a pencile" class="newImg">Location Name</label> <br>
                <div class="inputs">
                    <input class="input" type="text" name="editName" id="editName" placeholder="Name..."><br><br>
                </div>

                <!-- US6:1 -->
                <div>
                    <label class="label" for="catigories"><img src="img/raws/tb_category.png" alt="star image" class="newImg">Catigories</label><br>
                    <input class="imgCheckbox" type='checkbox' name='foodAndDrink' value='valuable' id="foodAndDrink"/>
                    <label for="foodAndDrink"></label>
                    <input class="shopping" type='checkbox' name='shopping' value='valuable' id="shopping"/>
                    <label for="shopping"></label>
                    <input class="landmark" type='checkbox' name='landmark' value='valuable' id="landmark"/>
                    <label for="landmark"></label>
                    <input class="recreation" type='checkbox' name='recreation' value='valuable' id="recreation"/>
                    <label for="recreation"></label>
                    <input class="lodging" type='checkbox' name='lodging' value='valuable' id="lodging"/>
                    <label for="lodging"></label><br>

                    <label class="catlabel" id="foodDrink" for="foodAndDrink">FOOD & DRINK</label>
                    <label class="catlabel" id="shopping" for="shopping">SHOPPING</label>
                    <label class="catlabel" id="landmark" for="landmark">LANDMARK</label>
                    <label class="catlabel" id="recreation" for="recreation">RECREATION</label>
                    <label class="catlabel" id="lodging" for="lodging">LODGING</label>

                </div>

                <!-- US6:2 -->
                <label class="label" for="tags"><img src="img/raws/tb_list.png" alt="check box image" class="newImg">Tags</label> <br>
                <div id="tagsHome">
                    <input type="checkbox" name="hammock" id="hammock" />
                    <label class="tag" for="hammock">HAMMOCK</label>
                    <input type="checkbox" name="adventure" id="adventure" />
                    <label class="tag" for="adventure">ADVENTURE</label>
                    <input type="checkbox" name="airbnb" id="airbnb" />
                    <label class="tag" for="airbnb">AIRBNB</label>
                    <input type="checkbox" name="bicycles" id="bicycles" />
                    <label class="tag" for="bicycles">BICYCLES</label>
                    <input type="checkbox" name="brewery" id="brewery" />
                    <label class="tag" for="brewery">BREWERY</label>
                    <input type="checkbox" name="campsite" id="campsite" />
                    <label class="tag" for="campsite">CAMPSITE</label><br>
                    <input type="checkbox" name="coffee" id="coffee" />
                    <label class="tag" for="coffee">COFFEE</label>
                    <input type="checkbox" name="gear" id="gear" />
                    <label class="tag" for="gear">GEAR</label>
                    <input type="checkbox" name="trailhead" id="trailhead" />
                    <label class="tag" for="trailhead">TRAILHEAD</label>
                    <input type="checkbox" name="hostel" id="hostel" />
                    <label class="tag" for="hostel">HOSTEL</label>
                    <input type="checkbox" name="food" id="food" />
                    <label class="tag" for="food">FOOD</label>
                    <input type="checkbox" name="winery" id="winery" />
                    <label class="tag" for="winery">WINERY</label>
                </div>
                <!-- US7:1 -->
                <label class="label" for="image"><img src="img/raws/tb_photo.png" alt="image of photo" class="newImg">Image</label> <br>
                <div class="inputs">
                    <input id="actual-btn" type="file" onchange="loadFile(event)" name="file1" hidden/>
                    <label id="test" for="actual-btn" > <img src="img/raws/tb_add_photo.png" alt="message bubble" id="photoImg"></label>
                    <!-- the image tag is dispalying the image and the p tag is for if the image is the wrong size -->
                    <img id="output" onload="imgSize();"/><p id="errorMsg" style='color:red; font-size:13px; font-family:Museo Sans; text-align: left;'></p><br>
                </div>
    
                <label class="label" for="note"><img src="img/raws/tb_comment.png" alt="message bubble" class="newImg" >Note</label> <br>
                <div class="inputs">
                    <input class="input" type="text" name="note" id="note" placeholder="Add a note..."><br>
                </div>
            </div>
            <input type ="submit" id = "submit" class="btn btn-primary btn-lg active btn-rounded submit" value= "LOG IT" onclick="clickFunction ()">
        </form>
        <script>
            // for US7:1
            var loadFile = function(event) {
                //this is displaying the file
                var image = document.getElementById('output');
                image.src = URL.createObjectURL(event.target.files[0]);
            };

            //This function gets the image size 
            function imgSize(){
                var image = document.getElementById('output');
                //getting the images size
                var currWidth = $(image).width();
                var currHeight = $(image).height();
                if(currWidth>=1500 && currWidth<=2500){ //if the image is the correct size it will dispaly it 
                    document.getElementById("output").style.width = "200px";
                }else{ //if the image is not between the measurments it will not dispaly the image and will display a error message
                    document.getElementById("output").style.display = "none";
                    document.getElementById("errorMsg").innerHTML = "Sorry Image too big or small";
                }
            };

        </script>
    </body>
</html>
