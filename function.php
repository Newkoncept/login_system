<?php

    require_once("db.php");    

    $action = "";
    $action = $_POST['action'];
    


    if($action == "login"){
        login();
    }

    function login(){
        global $conn;
        
        // Getting the inputs
        $uid = check_input($_POST['uid']);
        $pwd = check_input($_POST['pwd']);
        $pwd = md5($pwd);
        
        // Checking the username in the database
        $sql = "SELECT * FROM users WHERE username=? ;";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 's', $uid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $result_check = mysqli_fetch_assoc($result);

        // Error Handling
        if (!$result_check){
            echo "Email not recognised";
        } else {
            // Checking the password
            if($result_check['password'] !== $pwd){
                echo "Incorrect Password";
            } else {
                $_SESSION['username'] = $result_check['username'];
                $_SESSION['id'] = $result_check['id'];
                echo "Login Successful";
            }
        }
    }

    function check_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }


?>