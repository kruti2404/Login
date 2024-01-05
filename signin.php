<?php

                
        $conn = new mysqli("localhost", "root", "", "logindb");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get the name from the AJAX request
        $username = $_POST['username'];
        $pwd = $_POST['pass'];
        $sql = "SELECT * FROM `logininfo` WHERE Username LIKE '%$username%'";
        $result = $conn->query($sql);

        
        if ($result->num_rows < 0) {

            print("please enter valid Username !");

        } 
        else {
            $sql2 = "SELECT * FROM `logininfo` WHERE `Password` LIKE '%$pwd%'";
            $result = $conn->query($sql2);
            if ($result->num_rows > 0) {
                           
                print("User Found and your session started !");
            } else {
                print("Please enter valid password !");
            }

        }
        $conn->close();

?>