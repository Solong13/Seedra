<?php
require('config/db.php');

if(!empty($_POST)) {
    $sql = "INSERT INTO `users` (`user`,`Email`, `Password`) VALUES ('" . $_POST['user'] . "', '" . $_POST['Email'] . "', '" . $_POST['Password'] . "');";
    if (mysqli_query($conn, $sql)) { // виконує запроси, тобто підключення до бд та запис
        echo "INSERT";
        header("Location: /Seedra");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/styleForGlass.css">
    <link rel="stylesheet" href="assets/css/styleForLogin.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    <title>SEEDRA</title>
</head>
<body>

<?php
require('partials/header.php');
?>
<?php
require('partials/headerFor.php');
?>
    <div id="login">
        <h3 class="text-center text-white pt-6">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-55">

                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Registration</h3>
                            
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="user" id="user" class="form-control" placeholder="Username" equired >
                            </div>

                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="text" name="Email" id="Email" class="form-control" placeholder="user01@IceCode.com" required >
                            </div>

                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="Password" id="Password" class="form-control" placeholder="******" required>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" id="btn" class="btn btn-info btn-md " value="Registration">
                            </div>

                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
require('partials/footer.php');