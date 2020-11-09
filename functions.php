<?php
    include 'db-config.inc.php';
    function connect(){
        //Opening up a connection to the databse
        $mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        return $mysqli;
    }

    //This function updates the username
    function updateUsername($name, $usern){
        $mysqli = connect();
        //setting up a update function then exicuting it. 
        //refreshes the page so that the user change see their change
        if(isset($name)){
            $sql = "UPDATE profile SET name = ? WHERE  username like ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("ss", $name, $usern);
            $stmt->execute();
            $result = $stmt->get_result();   
            refresh();         
        }
    }

    //this function updates the email
    function updateEmail($email, $usern){
        $mysqli = connect();
        //setting up a update function then exicuting it. 
        //refreshes the page so that the user change see their change
        if(isset($email)){
            $sql = "UPDATE profile SET email = ? WHERE  username like ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("ss", $email, $usern);
            $stmt->execute();
            $result = $stmt->get_result();
            refresh();
        }
    }

    //This function updates the password (it also checks if the passwords are the same)
    function updatePassword($newPass, $verifyPass, $usern){
        $mysqli = connect();
        //setting up a update function then exicuting it. 
        //since the user does not see the change in the text box the result will be checked.
        if($newPass === $verifyPass){
            if(isset($newPass) === isset($verifyPass)){
                $sql = "UPDATE users SET password = ? WHERE  username like ?";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("ss", $newPass, $usern);
                $stmt->execute();
                $result = $stmt->get_result();
                checkResult($result);
            }
        }else{
            print "<p style='color:red; font-size:13px; font-family:Museo Sans;'>TWO DIFFERENT PASSWORDS TYPED IN</p>";
        }
        
    }
    
    //checks if the result is in the database then it will send the message to the showMessage function
    function checkResult($result){
        if($result->num_rows >= 1){
            $message = true;
            showMessage($message);
        }else{ 
            $message = false;
            showMessage($message);

        }
    }

    //is used to print a message to the user if their changes were made to the database
    function showMessage($message){
        if($message === true){
            print "<p style='color:red; font-size:13px; font-family:Museo Sans;'>UNABLE TO COMMIT CHANGES</p>";

        }else{
            print "<p style='color:red; font-size:13px; font-family:Museo Sans;'>YOUR CHANGES HAVE BEEN MADE</p>";
        }
    }

    //is used to refresh the page whenever it is called
    function refresh(){
        header("Refresh:0");
    }

?>
