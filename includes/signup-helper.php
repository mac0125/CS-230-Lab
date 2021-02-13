<?php

if(isset($_POST['signup-submit'])){
    require 'dbhandler.php';

    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $conpass = $_POST['con-password'];

    if ($pass !== $conpass) {
        header("Location: ../signup.php?error=diffPasswords");
        exit();
    }else{
        $sql = "SELECT uname FROM users WHERE uname=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../signup.php?error=SQLInjection");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $check = mysqli_stmt_num_rows($stmt);

            if($check > 0){
                header("Location: ../signup.php?error=UsernameTaken");
                exit();                
            }else{
                $sql = "INSERT INTO users (fname, lname, uname, email, password) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../signup.php?error=SQLInjection");
                    exit();
                }else{
                    $hashed = password_hash($pass, PASSWORD_BCRYPT);
                    mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $username, $email, $hashed);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);

                    $sqlImg = "INSERT INTO profiles (fname, uname) VALUES ('$firstname', '$username')";
                    mysqli_query($conn, $sqlImg);

                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}else{
    header("Location: ../signup.php");
    exit();
}