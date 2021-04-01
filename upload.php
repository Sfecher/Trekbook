<?php
    session_start();
    include 'db-config.inc.php';

    $mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
            
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    if(!isset($_SESSION["user"])){
        header("Location: login.php");
    }else{
        $username = $_SESSION["user"];
        //this is being echoed but is not showed to the user
        foreach($_FILES as $key => $value){
            if($value["error"] != UPLOAD_ERR_OK){
                echo "Error: " . $key . " has error" . $value["error"] . "<br>";
            }else{
                echo $key . " uploaded successfully " . "<br>";
            }
        }

        //this is moving the file from where the default is to a specified location
        $fileToMove = $_FILES["file1"]["tmp_name"];
        $destination = "./images/" . $_FILES["file1"]["name"];
        if(move_uploaded_file($fileToMove, $destination)){
            echo "The file was uploaded and moved successfully!";
            // echo "<img src='$destination'/>";
            $_SESSION["destination"] = $destination;

        }else{
            echo "There was a problem moving the file! <br>";
        } 

        //this next section is dealing with the different things that were added to the form
        //more specifically the address, location name, image, and note
        if(isset($_POST['location'])){
            $_SESSION['location'] = $_POST['location'];
            $address = $_POST['location'];
        }

        if(isset($_POST['editName'])){
            $_SESSION['editName'] = $_POST['editName'];
            $name = $_POST['editName'];
        }
        
        if(isset($_POST['note'])){
            $_SESSION['note'] = $_POST['note'];
            $note = $_POST['note'];
        }

        if(isset($_SESSION["destination"])){
            $image = $_SESSION["destination"];
        }

        //this is placing the above values into a insert sql statment that will be executed in the database
        $sql = "INSERT INTO `location`(`location_name`, `address`, `image`, `note`, `username`) VALUES ('$name', '$address', '$image', '$note', '$username')";
        echo $sql;
        $stmt = $mysqli->prepare($sql);
        $stmt->execute();

        //this is getting the information of the last location that was inserted into the database
        $sqlLast="SELECT * FROM location ORDER BY id DESC LIMIT 1;";
        $stmtLast = $mysqli->prepare($sqlLast);
        $stmtLast->execute();
        $resultLast = $stmtLast->get_result();
        //now we are going to take the result of the above query and do some work
        while($row = mysqli_fetch_array($resultLast)){
            $id = $row['id'];
            echo'<p>id: "'.$row['id'].'" </p>';
            //all of these are checking if the categories or tags are posted from the form and if they are then they will
            //be inserted into their proper table using the locations id
            if(isset($_POST['foodAndDrink'])){
                $_SESSION['foodAndDrink'] = $_POST['foodAndDrink'];
                $food = $_POST['foodAndDrink'];
                $sql="INSERT INTO `location_cat`(`location_id`, `categorie`) VALUES ($id,'$food')";
                echo $sql;
                $stmt = $mysqli->prepare($sql);
                $stmt->execute();
           }
           if(isset($_POST['shopping'])){
                $_SESSION['shopping'] = $_POST['shopping'];
                $shopping = $_POST['shopping'];
                $sql="INSERT INTO `location_cat`(`location_id`, `categorie`) VALUES ($id,'$shopping')";
                echo $sql;
                $stmt = $mysqli->prepare($sql);
                $stmt->execute();
            }
            if(isset($_POST['landmark'])){
                $_SESSION['landmark'] = $_POST['landmark'];
                $landmark = $_POST['landmark'];
                $sql="INSERT INTO `location_cat`(`location_id`, `categorie`) VALUES ($id,'$landmark')";
                echo $sql;
                $stmt = $mysqli->prepare($sql);
                $stmt->execute();
            }
            if(isset($_POST['recreation'])){
                $_SESSION['recreation'] = $_POST['recreation'];
                $recreation = $_POST['recreation'];
                $sql="INSERT INTO `location_cat`(`location_id`, `categorie`) VALUES ($id,'$recreation')";
                echo $sql;
                $stmt = $mysqli->prepare($sql);
                $stmt->execute();
            }
            if(isset($_POST['hammock'])){
                $_SESSION['hammock'] = $_POST['hammock'];
                $hammock = $_POST['hammock'];
                $sql="INSERT INTO `location_tag`(`location_id`, `tag`) VALUES ($id, '$hammock')";
                echo $sql;
                $stmt = $mysqli->prepare($sql);
                $stmt->execute();
            }
            if(isset($_POST['adventure'])){
                $_SESSION['adventure'] = $_POST['adventure'];
                $adventure = $_POST['adventure'];
                $sql="INSERT INTO `location_tag`(`location_id`, `tag`) VALUES ($id, '$adventure')";
                echo $sql;
                $stmt = $mysqli->prepare($sql);
                $stmt->execute();
            }
            if(isset($_POST['airbnb'])){
                $_SESSION['airbnb'] = $_POST['airbnb'];
                $airbnb = $_POST['airbnb'];
                $sql="INSERT INTO `location_tag`(`location_id`, `tag`) VALUES ($id, '$airbnb')";
                echo $sql;
                $stmt = $mysqli->prepare($sql);
                $stmt->execute();
            }
            if(isset($_POST['bicycles'])){
                $_SESSION['bicycles'] = $_POST['bicycles'];
                $bicycles = $_POST['bicycles'];
                $sql="INSERT INTO `location_tag`(`location_id`, `tag`) VALUES ($id, '$bicycles')";
                echo $sql;
                $stmt = $mysqli->prepare($sql);
                $stmt->execute();
            }
            if(isset($_POST['brewery'])){
                $_SESSION['brewery'] = $_POST['brewery'];
                $brewery = $_POST['brewery'];
                $sql="INSERT INTO `location_tag`(`location_id`, `tag`) VALUES ($id, '$brewery')";
                echo $sql;
                $stmt = $mysqli->prepare($sql);
                $stmt->execute();
            }
            if(isset($_POST['campsite'])){
                $_SESSION['campsite'] = $_POST['campsite'];
                $campsite = $_POST['campsite'];
                $sql="INSERT INTO `location_tag`(`location_id`, `tag`) VALUES ($id, '$campsite')";
                echo $sql;
                $stmt = $mysqli->prepare($sql);
                $stmt->execute();
            }
            if(isset($_POST['coffee'])){
                $_SESSION['coffee'] = $_POST['coffee'];
                $coffee = $_POST['coffee'];
                $sql="INSERT INTO `location_tag`(`location_id`, `tag`) VALUES ($id, '$coffee')";
                echo $sql;
                $stmt = $mysqli->prepare($sql);
                $stmt->execute();
            }
            if(isset($_POST['gear'])){
                $_SESSION['gear'] = $_POST['gear'];
                $gear = $_POST['gear'];
                $sql="INSERT INTO `location_tag`(`location_id`, `tag`) VALUES ($id, '$gear')";
                echo $sql;
                $stmt = $mysqli->prepare($sql);
                $stmt->execute();
            }
            if(isset($_POST['trailhead'])){
                $_SESSION['trailhead'] = $_POST['trailhead'];
                $trailhead = $_POST['trailhead'];
                $sql="INSERT INTO `location_tag`(`location_id`, `tag`) VALUES ($id, '$trailhead')";
                echo $sql;
                $stmt = $mysqli->prepare($sql);
                $stmt->execute();
            }
            if(isset($_POST['hostel'])){
                $_SESSION['hostel'] = $_POST['hostel'];
                $hostel = $_POST['hostel'];
                $sql="INSERT INTO `location_tag`(`location_id`, `tag`) VALUES ($id, '$hostel')";
                echo $sql;
                $stmt = $mysqli->prepare($sql);
                $stmt->execute();
            }
            if(isset($_POST['food'])){
                $_SESSION['food'] = $_POST['food'];
                $food = $_POST['food'];
                $sql="INSERT INTO `location_tag`(`location_id`, `tag`) VALUES ($id, '$food')";
                echo $sql;
                $stmt = $mysqli->prepare($sql);
                $stmt->execute();
            }
            if(isset($_POST['winery'])){
                $_SESSION['winery'] = $_POST['winery'];
                $winery = $_POST['winery'];
                $sql="INSERT INTO `location_tag`(`location_id`, `tag`) VALUES ($id, '$winery')";
                echo $sql;
                $stmt = $mysqli->prepare($sql);
                $stmt->execute();
            }

        }
        //this is saying that once everything is finished we are going to redirect to the home page (which will display the new location)
        header("Location: home.php");
    }
?>