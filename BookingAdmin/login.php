<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="http://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet" type="text/css" />
    <title>Login Page</title>

    <style>
        #logo {
            text-decoration: none;
        }
    </style>
</head>
 
<body style="background-color: #eacdbc">

    <nav id="navbar" class="navbar order-last order-lg-0">
        <a id="logo" style="font-family: 'Tangerine', serif; font-size: 40px; color: purple; display: inline;" class="nav-link scrollto active" href="../index.php">BookMyTrip</a>
    </nav>

    <form action="BookingAdmin/validate.php" method="post">
        <div class="login-box">
            <h1>Login</h1>
 
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Username"
                         name="username" value="">
            </div>
 
            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password"
                         name="password" value="">
            </div>
 
            <input class="button" type="submit"
                     name="login" value="Sign In">
        </div>
    </form>
</body>
 
</html>