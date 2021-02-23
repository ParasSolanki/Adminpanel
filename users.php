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
    if(isset($_GET["action"]) && $_GET["id"]){
        if($_GET["action"] === "delete"){
            $id = $_GET["id"];

            $sql = "DELETE FROM information WHERE id=$id";
            $conn->query($sql);
        }
    }

    if(isset($_GET["orderby"])){
        if($_GET["orderby"] === "name"){
            $sql = "SELECT * FROM information ORDER BY firstname ASC";
        }else if($_GET["orderby"] === "email"){
            $sql = "SELECT * FROM information ORDER BY email ASC";
        }else if($_GET["orderby"] === "id"){
            $sql = "SELECT * FROM information ORDER BY id ASC";
        }
    }else if(isset($_GET["status"])){
        if($_GET["status"] === "active"){
            $sql = "SELECT * FROM information WHERE status='Active'";
        }
        else if($_GET["status"] === "inactive"){
            $sql = "SELECT * FROM information WHERE status='Inactive'";
        }
    }
    else{
        $sql = "SELECT * FROM information";
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
            <div class="users-table section">
                <h1 class="font-medium">User's information</h1>
                <h4>Note: By Default all status fields are Active..</h4>
                <div class="flex" style="padding-top:10px;">
                    <div class="sort-category">
                        <p>Sort By &darr;</p>
                        <div class="dropdown">
                            <a href="?orderby=id">Sort by Id</a>
                            <a href="?orderby=name">Sort by Name</a>
                            <a href="?orderby=email">Sort by Email</a>
                        </div>
                    </div>
                    <div class="sort-category">
                            <p>Status &darr;</p>
                            <div class="dropdown">
                                <a href="?status=active">Active</a>
                                <a href="?status=inactive">Inactive</a>
                            </div>
                    </div>
                </div>
                <div class="table section">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <?php 
                                    $data = $conn->query($sql);
                                    if(mysqli_num_rows($data) <= 0){
                                        echo "<h2>No data Found..</h2>";
                                    }
                                    while($result = $data->fetch_assoc()) {
                                        
                                        if($result["firstname"] === "admin" || $result["lastname"] === "admin"){
                                            continue;
                                        }
                                        ?>
                                    <tr>
                                        <td><?php echo $result["id"]; ?></td>
                                        <td><?php echo $result["firstname"]." ".$result["lastname"]; ?></td>
                                        <td><?php echo $result["email"]; ?></td>
                                        <td><?php echo $result["status"]; ?></td>
                                        <td>
                                            <a href="edit.php?action=edit&id=<?php echo $result['id'];?>" class="btn edit-btn">
                                                Edit
                                            </a>
                                            <a href="?action=delete&id=<?php echo $result['id']; ?>" class="btn delete-btn">Delete</a>
                                        </td>
                                    </tr>
                            <?php }   ?>
                            
                        </tbody>
                    </table>
                </div>
                
            </div>
        </section>
    </main>
</body>
</html>