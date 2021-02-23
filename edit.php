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
        if($_GET["action"] === "edit"){
            $id = $_GET["id"];

            $sql = "SELECT * FROM information WHERE id=$id";
            $data = $conn->query($sql);
            while($result = $data->fetch_assoc()) {
                $id = $result["id"];
                $firstname = $result["firstname"];
                $lastname = $result["lastname"];
                $email = $result["email"];
                $password = $result["password"];
             }

        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
    <link rel="stylesheet" href="css/style.css">
    <script defer src="js/validation.js"></script>
</head>
<body>
    <main>
        <section class="section">
            <div class="container">
                <div class="regform">
                    <h1>Edit Data</h1>
                    <form action="action.php" method="post" name="edit-form" onsubmit="return editValidate();">
                        <input type="hidden" name="id"
                         <?php if(isset($id)){ ?> 
                                        value =<?php echo $id; ?> 
                                <?php } ?>
                        >
                        <div class="form-element">
                            <input type="text" name="firstname" id="firstname"  placeholder=" " required
                                <?php if(isset($firstname)){ ?> 
                                        value =<?php echo $firstname; ?> 
                                <?php } ?>
                            >
                            <label for="firstname">FirstName</label>
                        </div>
                        <div class="form-element">
                            <input type="text" name="lastname" id="lastname"  placeholder=" " required
                            <?php if(isset($lastname)){ ?> 
                                        value =<?php echo $lastname; ?> 
                                <?php } ?>
                            >
                            <label for="lastname">LastName</label>
                        </div>
                        <div class="form-element">
                            <input type="email" name="email" id="email"  placeholder=" " required
                            <?php if(isset($email)){ ?> 
                                        value =<?php echo $email; ?> 
                                <?php } ?>
                            >
                            <label for="email">Email</lab☻el>
                        </div>
                        <div class="form-element">
                            <input type="password" name="password" id="password" placeholder=" " required
                            <?php if(isset($password)){ ?> 
                                        value =<?php echo $password; ?> 
                                <?php } ?>
                            >
                            <label for="password☻">Password</label>
                        </div>
                        <div class="form-element">
                            <select class="select" name="status" required>
                                <option value="Select Status" selected disabled>Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                        <input type="submit" value="Edit" name="edit" class="form-btn">
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>
</html>