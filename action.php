<?php 
    include_once "includes/conn.php";

    // registration form section...
    if(isset($_POST["register"])){
        if(isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["password"]) ){

            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            
            $sql = "INSERT INTO information (firstname, lastname, email, password) 
                    VALUES ('$firstname', '$lastname', '$email', '$password')";
            
            if($conn->query($sql) === TRUE){
                echo "Account Created Successfully..";
                header("Refresh: 3; url=login.php"); // Redirect to login page..
            } 
            else{
                echo "Error creating your Account Please Try again..";
                header("url=registration.php"); // Redirect to registration page..
            }
        }
        else{
            echo "All fields are Compulsory.";
        }
    }


    // login form section...
    if(isset($_POST["login"])){
        if(isset($_POST["email"]) && isset($_POST["password"])){

            $email = $_POST["email"];
            $password = $_POST["password"];
            $found = false;


            $sql = "SELECT * FROM information WHERE email='$email'";
           
            $sql_data = $conn->query($sql);
            

            while($sql_results = $sql_data->fetch_assoc()){
                if($sql_results["email"] === $email && $password === $sql_results["password"] ){
                    $found = true;
                    break;
                }
            }

            if($found){
                echo "Redirected..";
                session_start();
                $_SESSION["email"] = $email;
                $_SESSION["firstname"] = $sql_results["firstname"];
                header("Refresh: 3; url=profile.php");
            }
            else{
                echo "Account does not exists Register yourself first..";
                header("Refresh: 3; url=registration.php");
            }
        }
    }

    // edit form section...
    if(isset($_POST["edit"])){
        if(isset($_POST["id"]) && isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["password"]) ){
            
            $id = $_POST["id"];
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $status = $_POST["status"];
            
            $sql = "UPDATE information SET firstname = '$firstname', 
                        lastname = '$lastname', email = '$email',
                        password = '$password', status = '$status'
                        WHERE id = $id";          
            if($conn->query($sql) === TRUE){
                echo "Account edited Successfully..";
                header("Refresh: 3; url=users.php"); // Redirect to login page..
            } 
            else{
                echo "Error editing the Account Please Try again..";
                header("url=users.php"); // Redirect to registration page..
            }
        }
        else{
            echo "All fields are Compulsory.";
        }
    }

    // else redirect to login page...
    header("url=login.php");
?>