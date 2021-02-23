<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/style.css">
    <script defer src="js/validation.js"></script>
</head>
<body>
    <main>
        <section class="section">
            <div class="container">
                <div class="loginform">
                    <h1>Login Form</h1>
                    <form action="action.php" method="post" name="login-form" onsubmit="return loginValidate();">
                        <div class="form-element">
                            <input type="email" name="email" id="email" placeholder=" ">
                            <label for="email">Email<span>*</span></label>
                        </div>
                        <div class="form-element">
                            <input type="password" name="password" id="password" placeholder=" " required>
                            <label for="password">Password<span>*</span></label>
                        </div>
                        <input type="submit" value="Login" name="login" class="form-btn">
                        <input type="submit" value="Registration" class="form-btn reg-btn" onclick="window.open('registration.php');">
                    </form>
                </div>
            </div>
        </section>
    </main>
    
</body>
</html>