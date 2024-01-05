<?php

    
    if (isset($_POST)) {
        $conn = new mysqli("localhost", "root", "", "logindb");

    

        $name = $_POST['name'];
        $username = $_POST['username'];
        $phonenumber = $_POST['Phonenumber'];
        $pwd = $_POST['pass'];
        $pwdcon = $_POST['passcon'];

        

        $sql = "SELECT * FROM `logininfo` WHERE Username LIKE '%$username%'";
        $result = $conn->query($sql);

        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Please enter unique username";
            }
        } 
        else {

            $sql2 = "SELECT * FROM `logininfo` WHERE `Phone number` LIKE '%$phonenumber%'";
            $result = $conn->query($sql2);
            if ($result->num_rows > 0) {
                print("Please enter unique Phonenumber");
            } else {
                
            $sql1 = "INSERT INTO `logininfo`( `Name`, `Username`, `Password`, `Phone number`) VALUES ('$name','$username','$phonenumber','$pwd')";
            $result = $conn->query($sql1);
            if (!$result) {
                print("Error states thet ". $conn->error);
            }
            else
            {
                print("Information added ");
            }
            }
            


        }

    }


?>