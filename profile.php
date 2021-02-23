<?php
    include_once "includes/conn.php";
    session_start();

    if(isset($_SESSION["email"]) && $_SESSION["firstname"]){

        $firstname = $_SESSION["firstname"];
        $email = $_SESSION["email"];

        if($firstname === "admin"){
            $isadmin = true;
        }
        else{
            $isadmin = false;
        }
    }
    else{
        header("Location:login.php");
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <?php  if($isadmin) { 
                $sql = "SELECT COUNT(id) FROM information";
                $get_data = $conn->query($sql);
                $data = $get_data->fetch_assoc(); 
                $total_users = $data["COUNT(id)"] - 1; // -1 because we are not considering admin as user...
            ?>
            <section class="main flex jc-between width-100">
                <div class="sidebar">
                    <div class="sidebar-container">
                        <h1>Hello <?php echo $firstname; ?></h1>
                        <ul>
                            <li><a href="profile.php">Dashboard</a></li>
                            <li><a href="users.php">UsersListing</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>  
                    </div>  
                </div>   
                <div class="dashboard">
                    <div class="section">
                        <div class="container">
                            <h1 class="font-medium">No of Registered Users: <?php echo $total_users; ?> </h1>
                        </div>
                        <div class="container">
                            <form action=""></form>
                        </div>
                    </div>
                </div>
            </section>
            
        <?php } else{ ?>
            <section class="section">
                <div class="container">
                    <div class="row jc-end width-100">
                        <a href="logout.php" class="logout">Logout</a>
                    </div>
                </div>
            </section>
            <section class="section">
                <div class="container text-center">
                    <div class="welcome-text">
                        <blockquote>
                            <h1 class="font-big"><q>Welcome <?php echo $firstname; ?></q> </h1>
                        </blockquote>
                    </div>
                </div>
            </section>
        <?php } ?>
        
    </main>
</body>
</html>