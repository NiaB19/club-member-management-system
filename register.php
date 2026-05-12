<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <form action="register.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="fullname" placeholder="Full Name:" required >
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email:" required>
        </div>
        <div class="form-group">
            <input type="password"  class="form-control" name="password" placeholder="Password:" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="repeat_password" placeholder="Repeat Password:" required>
        </div>
        <div class="form-btn">
            <input type="submit" class="btn btn-primary" value="register" name="Register:" required>
        </div>

    </form>

</div>
</body>
</html>