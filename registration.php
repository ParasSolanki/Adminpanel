<?php 
    include_once "includes/conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/style.css">
    <script defer src="js/validation.js"></script>
</head>
<body>
    <main>

        <section class="section">
            <div class="container">
                <div class="regform">
                    <h1>Registration Form</h1>
                    <form action="action.php" method="post" name="reg-form" onsubmit="return regValidate();" >
                        <div class="form-element">
                            <input type="text" name="firstname" id="firstname"  placeholder=" " required>
                            <label for="firstname">FirstName<span>*</span></label>
                        </div>
                        <div class="form-element">
                            <input type="text" name="lastname" id="lastname"  placeholder=" " required>
                            <label for="lastname">LastName<span>*</span></label>
                        </div>
                        <div class="form-element">
                            <input type="email" name="email" id="email"  placeholder=" "  required>
                            <label for="email">Email<span>*</span></label>
                        </div>
                        <div class="form-element">
                            <input type="password" name="password" id="password" placeholder=" "  required>
                            <label for="password">Password<span>*</span></label>
                        </div>
                        <div class="form-element">
                            <a href="login.php">Already Have An Account?</a>
                        </div>
                        <input type="submit" value="Submit" name="register" class="form-btn">
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>
</html>