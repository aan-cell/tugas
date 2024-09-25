<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="loginp.php" method="post">
            <div class="input-grup">
             <label for="username">Username :</label>
             <input type="text" id="username" name="username" require>
            </div>

            <div class="input-grup">
             <label for="password">Password :</label>
             <input type="password" id="password" name="password" require>
            </div>
          <button type="submit" class="button1">Login</button>
        </form>
    </div>
</body>
</html>

